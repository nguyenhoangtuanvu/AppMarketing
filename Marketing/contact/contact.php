<?php 
    session_start();
    include '../connect_db.php';
    $config_name = 'contact';
    if(isset($_SESSION['currentUser'])) {
        if(!empty($_GET['action']) && $_GET['action'] == 'search') {
            $_SESSION[$config_name. '_filter'] = $_POST;
            header('location:' .$config_name. '.php');
        }
    }
    // var_dump($_SESSION[$config_name. '_filter']);exit;
    if(!empty($_SESSION[$config_name. '_filter'])) {
        $where = '';
        foreach($_SESSION[$config_name. '_filter'] as $field => $value) {
            switch($field) {
                case 'search' :
                    $where .= (!empty($where)) ? "AND" . " (`email` LIKE '%".$value."%' OR `lastname` LIKE '%".$value."%' OR `name` LIKE '%".$value."%' OR `phoneNumber` LIKE '%".$value."%'
                    OR `stage` LIKE '%".$value."%' OR `birthday` LIKE '%".$value."%' OR `gender` LIKE '%".$value."%' OR `address` LIKE '%".$value."%' OR `Operation_field` LIKE '%".$value."%' OR `date` LIKE '%".$value."%' ) " 
                    : "(`email` LIKE '%".$value."%' OR `lastname` LIKE '%".$value."%' OR `name` LIKE '%".$value."%' OR `phoneNumber` LIKE '%".$value."%'
                    OR `stage` LIKE '%".$value."%' OR `birthday` LIKE '%".$value."%' OR `gender` LIKE '%".$value."%' OR `address` LIKE '%".$value."%' OR `Operation_field` LIKE '%".$value."%' OR `date` LIKE '%".$value."%' ) ";
                break;
                default :
                    $where .= (!empty($where))? " AND "." `".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                break;
            }
        }
        // var_dump($where);exit;
        extract($_SESSION[$config_name. '_filter']);
    }

    // view
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 
    if(!empty($where)) {
        $query_contact = mysqli_query($con, "SELECT * FROM `contact` WHERE (".$where.") LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else {
        $query_contact = mysqli_query($con, "SELECT * FROM `contact` LIMIT " . $item_per_page . " OFFSET " . $offset);
    }

    $totalRecords = mysqli_query($con, "SELECT * FROM `contact`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);

    // view groups in form 2
    $query_groups = mysqli_query($con, "SELECT * FROM `groups`");


    // add contact
    if(isset($_GET['action']) && $_GET['action'] == 'addContact') {
        // var_dump('aldsfja');exit;
        // var_dump(NULL, $_POST['email'], $_POST['lastname'],$_POST['name'], $_POST['phoneNumber'], $_POST['source'], $_POST['stage'], $_POST['birthday'], $_POST['gender'], $_POST['operationField'], $_POST['address']);exit;
        if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phoneNumber']) && !empty($_POST['stage'])) {
            $resuilt = mysqli_query($con, "INSERT INTO `contact`(`id`, `email`, `lastname`, `name`, `phoneNumber`, `source`, `stage`, `birthday`, `gender`, `Operation_field`, `address`, `date`) 
            VALUES (NULL,'". $_POST['email']."','". $_POST['lastname']."','". $_POST['name']."','". $_POST['phoneNumber']."','". $_POST['source']."','". $_POST['stage']."','". $_POST['birthday']."','". $_POST['gender']."','". $_POST['operationField']."','". $_POST['address']."','". $_POST['date']."');");
            if($resuilt) {
                header("location:contact.php");
            }
        }else {
            $error = 'bạn hãy nhập đủ thông tin';
        }
    }
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $delete_contact = mysqli_query($con, "DELETE FROM `contact` WHERE `id` =" . $_GET['id']);
        if($delete_contact) {
            header("location:contact.php");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.0.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Marketing</title>
</head>
<body>
    <div class="grid">
        <!-- header -->
        <?php include '../header.php' ?>
        <!-- content -->
        <div class="container">
            <!-- sidebar -->
            <?php include '../sidebar.php' ?>
            <!-- navigation start -->
            <div class="content">
                <div class="navigation">
                    <div class="nav-overview">
                        <h2 class="overview-heading">Liên hệ</h2>
                    </div>
                </div>
                <!-- navigation end -->
                <div class="overview">
                    <div class="filter-contact">
                        <form action="contact.php?action=search" method="post">
                        <div class="filter-left">
                                <div class="filter-search">
                                    <div class="search-icon"></div>
                                    <input type="text" name="search" value="<?=isset($search) ? $search : "" ?>" class="filter-search__input" placeholder="Tìm kiếm theo từ khóa">
                                </div>
                                <div class="filter-2">
                                    <select name="source" class="filter__select">
                                        <?php if(isset($source)) { ?>
                                            <option value="<?= $source?>" selected hidden>Nguồn marketing: <?= empty($source) ? 'Tất cả' : $source?></option>
                                        <?php } ?>
                                        <option value="">Nguồn marketing: Tất cả</option>
                                        <option value="Facebook">Nguồn marketing: Facebook</option>
                                        <option value="Zalo">Nguồn marketing: Zalo</option>
                                        <option value="Giới thiệu">Nguồn marketing: Giới thiệu</option>
                                    </select>
                                </div>
                                <button type="submit" class="filter-btn">
                                    <img src="../assets/img/filter.png" alt="" class="filter-btn__img">
                                    <h4 class="filter-btn__label">Lọc</h4>
                                </button>
                            </div>
                        </form>
                        <div class="filter-right">
                            <div class="filter-add-new__btn open-input-contact"><i class="fa-solid fa-plus"></i>Tạo mới</div>
                        </div>
                    </div>
                    <div class="content-table-wrapper">
                        <table class="table">
                            <thead>
                                <th class="table-column1 table-thead flex-ali-center">
                                    <input type="checkbox" name="check" class="table-check">
                                    <h5>Họ và tên</h5>
                                </th>
                                <th class="table-column2 table-thead">Email</th>
                                <th class="table-column3 table-thead">Số điện thoại</th>
                                <th class="table-column4 table-thead">Ngày tạo</th>
                                <th class="table-column5 table-thead">Giai đoạn</th>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 0;
                                while($row = mysqli_fetch_array($query_contact)) { 
                                    $count++;
                                ?>
                                <tr>
                                    <th class="table-column1 table-body flex-ali-center">
                                        <a href="contact_detail.php?id=<?= $row['id'] ?>" class="table-items__link">
                                            <input type="checkbox" name="check" class="table-check">
                                            <img src="../assets/img/ava.jpg" alt="" class="table-avatar">
                                            <h5 class="table-bold"><?= $row['lastname']. " ". $row['name'] ?></h5>
                                        </a>
                                    </th>
                                    <th class="table-column2 table-body"><?= $row['email'] ?></th>
                                    <th class="table-column3 table-body"><?= $row['phoneNumber'] ?></th>
                                    <th class="table-column4 table-body"><?= $row['date'] ?></th>
                                    <th class="table-column5 table-body table-function">
                                        <span><?= $row['stage'] ?> </span>
                                        <i class="fa-solid fa-ellipsis link-icon"></i>
                                        <ul class="table-function-box">
                                            <li class="table-function-items">
                                                <div class="table-function__link open--form2-model" id="<?= $row['id'] ?>"><i class="fa-solid fa-address-book"></i>Thêm vào nhóm liên hệ</div>
                                            </li>
                                            <li class="table-function-items">
                                                <a href="contact.php?id=<?= $row['id'] ?>&action=delete" class="table-function__link bold-red-color"><i class="fa-solid fa-trash-can"></i>Xóa</a>
                                            </li>
                                        </ul>
                                    </th>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-footer">
                        <h5 class="table-result">Hiển thị <?= $count ?>/<?= $totalRecords ?> Kết quả</h5>
                        <div class="table-footer-right">
                            <?php include '../pagination.php' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay" id="overlay"></div>
            <div class="overlay-not-color" id="overlay-2"></div>
            <div class="add-contact-model">
                <div class="add-contact-header">
                    <h2 class="add-contact__head">Tạo liên hệ mới</h2>
                </div>
                <form action="?action=addContact" method="POST" class="add-form" enctype="multipart/form-data">
                    <div class="add-contact-wrapper">
                        <input type="hidden" name="date" value="<?= date("Y-m-d") ?>">
                        <h5 class="add-contact__label">Email</h5>
                        <input type="mail" name="email" class="add-contact__input" placeholder="Nhập địa chỉ email của liên hệ">
                        <div class="row-input-name">
                            <div class="column-1-2">
                                <h5 class="add-contact__label">Họ và tên đệm</h5>
                                <input type="text" name="lastname" class="add-contact__input" placeholder="Nhập họ và tên đệm của liên hệ">
                            </div>
                            <div class="column-1-2">
                                <h5 class="add-contact__label">Tên</h5>
                                <input type="text" name="name" class="add-contact__input" placeholder="Nhập tên của liên hệ">
                            </div>
                        </div>
                        <h5 class="add-contact__label">Số điện thoại</h5>
                        <input type="text" name="phoneNumber" class="add-contact__input" placeholder="Nhập số điện thoại">
                        <h5 class="add-contact__label">Nguồn marketing</h5>
                        <select class="add-contact__input" name="source">
                            <option value="faceBook">faceBook</option>
                            <option value="zalo">zalo</option>
                            <option value="Giới thiệu">Giới thiệu</option>
                        </select>
                        <div class="column-1-2">
                            <h5 class="add-contact__label">Giai đoạn</h5>
                            <select class="add-contact__input" name="stage">
                                <option value="Lead">Lead</option>
                                <option value="MQL">MQL</option>
                                <option value="SQL">SQL</option>
                                <option value="Customer">Customer</option>
                                <option value="Loyal Customer">Loyal Customer</option>
                            </select>
                        </div>
                        <div class="row-input-name">
                            <div class="column-1-2">
                                <h5 class="add-contact__label">Ngày sinh</h5>
                                <input type="date" name="birthday" class="add-contact__input" placeholder="Nhập họ và tên đệm của liên hệ">
                            </div>
                            <div class="column-1-2">
                                <h5 class="add-contact__label">Giới tính</h5>
                                <div class="checkbox-wrapper">
                                    <input type="radio" class="add-contact__radio" value="nam" id="male" name="gender">
                                    <label for="male" class="radio-label">Nam</label>
                                    <input type="radio" class="add-contact__radio" value="nữ" id="female" name="gender">
                                    <label for="female" class="radio-label">Nữ</label>
                                </div>
                            </div>
                        </div>
                        <h5 class="add-contact__label">Lĩnh vực hoạt động</h5>
                        <select class="add-contact__input" name="operationField">
                            <option value="Buffet">Buffet</option>
                            <option value="Chế biến gỗ và các sản phẩm từ gỗ">Chế biến gỗ và các sản phẩm từ gỗ</option>
                            <option value="Công an">Công an</option>
                            <option value="Công nhiệp nhẹ">Công nhiệp nhẹ</option>
                            <option value="Công thương">Công thương </option>
                            <option value="Cửa hàng bán lẻ">Cửa hàng bán lẻ</option>
                            <option value="Cửa hàng thời trang">Cửa hàng thời trang </option>
                            <option value="Dịch vụ chăm sóc sắc đẹp">Dịch vụ chăm sóc sắc đẹp</option>
                            <option value="Dịch vụ Cho thuê bảo vệ, vệ sĩ">Dịch vụ Cho thuê bảo vệ, vệ sĩ</option>
                            <option value="Dịch vụ cho thuê kho bãi">Dịch vụ cho thuê kho bãi</option>
                            <option value="Dịch vụ cung ứng lao động việc làm">Dịch vụ cung ứng lao động việc làm</option>
                            <option value="Dịch vụ cung ứng phần mềm">Dịch vụ cung ứng phần mềm</option>
                            <option value="Dịch vụ du lịch">Dịch vụ du lịch</option>
                            <option value="Dịch vụ giáo dục và đào tạo">Dịch vụ giáo dục và đào tạo</option>
                            <option value="Dịch vụ nhà hàng, khách sạn">Dịch vụ nhà hàng, khách sạn</option>
                            <option value="Dịch vụ truyền thông quảng cáo">Dịch vụ truyền thông quảng cáo</option>
                            <option value="Dịch vụ thiết kế xây dựng">Dịch vụ thiết kế xây dựng</option>
                            <option value="Dịch vụ vận tải">Dịch vụ vận tải </option>
                            <option value="Dịch vụ y tế">Dịch vụ y tế</option>
                            <option value="Dịch vụ doanh nghiệp">Dịch vụ doanh nghiệp</option>
                            <option value="Kinh doanh thực phẩm">Kinh doanh thực phẩm</option>
                            <option value="Kinh doanh thiệt bị y tế">Kinh doanh thiệt bị y tế</option>
                            <option value="Kinh doanh văn phỏng phẩm">Kinh doanh văn phỏng phẩm</option>
                            <option value="Kinh doanh vật liệu xây dựng">Kinh doanh vật liệu xây dựng</option>
                            <option value="Kinh doanh xăng dầu">Kinh doanh xăng dầu</option>
                            <option value="Logistics">Logistics</option>
                        </select>
                        <h5 class="add-contact__label">Địa chỉ</h5>
                        <input type="text" name="address" class="add-contact__input" placeholder="Nhập địa chỉ của liên hệ">
                    </div>
                    <div class="add-contact-btn-wrapper">
                        <button type="button" class="add-contact-btn__cancel cancel-btn" onclick="window.location.href = 'contact.php';">Hủy</button>
                        <button type="submit" name="form1Submit" class="add-contact-btn__save"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
                    </div>
                </form>
            </div>
            <div class="add-contact-group-model">
                <div class="add-contact-header">
                    <h2 class="add-contact__head">Chọn nhóm liên hệ</h2>
                </div>
                <div class="add-group-wrapper">
                    <select name="groups" id="select-groups-form" class="add-contact__input select-groups-form2">
                        <!-- <option value="123" selected>Chọn nhóm liên hệ</option> -->
                        <?php while($row = mysqli_fetch_array($query_groups)) { ?>
                        <option value="<?= $row['group_id'] ?>"><?= $row['group_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="add-contact-btn-wrapper">
                    <button type="button" name="cancel" class="add-contact-btn__cancel cancel-form2-btn" onClick =" window.location.href = 'contact.php'; ">Hủy</button>
                    <button type="button" name="form2Submit" class="add-contact-btn__save" onClick =" window.location.href = 'contact.php'; "><i class="fa-solid fa-plus"></i>Tạo nhóm</button>
                </div>
            </div>
        </div>
    </div>
<script src="/vinasimex/Marketing/assets/JS/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>  

// GET id for form 2
    $(document).ready(function(){
        var getGroups = document.getElementById("select-groups-form");
        // var form2 = document.querySelector(".add-contact-group-model");
        // var overlay = document.querySelector(".overlay");

        $(".open--form2-model").click(function(){
            var contact_id = this.id;
            getGroups.onchange = function() {
                var IdGroup = this.value;
                console.log(contact_id)
                console.log(IdGroup)
                
                $.ajax({
                    url: 'addCIG.php',
                    type: 'POST',
                    data: { id:contact_id, groups:IdGroup},
                    success:function(response){
                        console.log('Save successfully');
                    }
                });
            }
        });
    });
    </script>
</body>
</html>