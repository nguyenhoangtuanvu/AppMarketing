<?php 
    session_start();
    include '../connect_db.php';
    // view
    
    $query_contact = mysqli_query($con, "SELECT * FROM `contact` WHERE `id` =" . $_GET['id']);
    $show_C = mysqli_fetch_assoc($query_contact);

    // $query_contact2 = mysqli_query($con, "SELECT * FROM `contact` WHERE `id` =" . $_GET['id']);

    $query_groups = mysqli_query($con, "SELECT * FROM `groups`");
    // insert contact into groups

    if(isset($_GET['action']) && $_GET['action'] == 'addCIG') {
        // var_dump('id='.$_GET['id']."', groups='". $_POST['groups']);exit;
        if(!empty($_POST['groups'])) {
            $result = mysqli_query($con, "INSERT INTO `contact_in_group`(`id`, `contact_id`, `group_id`) 
            VALUES (NULL,'". $_GET['id']."','". $_POST['groups']."')");
            if($result) {
                header("location:contact_detail.php?id=" . $_GET['id']);
            }
        }
    }
    // delete
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $delete_contact = mysqli_query($con, "DELETE FROM `contact` WHERE `id` =" . $_GET['id']);
        if($delete_contact) {
            header("location:contact.php");
        }
    }
    // update
    if(isset($_GET['action']) && $_GET['action'] == 'editContact') {
        if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phoneNumber']) && !empty($_POST['stage'])) {
            $update = mysqli_query($con, "UPDATE `contact` SET `email`='". $_POST['email']."',`lastname`='". $_POST['lastname']."',`name`='". $_POST['name']."',`phoneNumber`='". $_POST['phoneNumber']."',
            `source`='". $_POST['source']."',`stage`='". $_POST['stage']."',`birthday`='". $_POST['birthday']."',`gender`='". $_POST['gender']."',`Operation_field`='". $_POST['operationField']."',`address`='". $_POST['address']."' WHERE `id`=" .$_GET['id']);
            
            if($update) {
                header("location:contact_detail.php?id=" . $_GET['id']);
            }
        }else {
            $error = 'bạn hãy nhập đủ thông tin';
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
                        <div class="nav-left">
                            <a href="contact.php"><i class="fa-solid fa-angle-left nav-left-icon"></i></a>
                            <h2 class="nav-group-detail__head">Chi tiết liên hệ</h2>
                        </div>
                        <div class="nav-right">
                            <div class="nav-add-btn">
                                <div class="add-new__link black-color-blur open--form-addCIG"><i class="fa-solid fa-address-book"></i>
                                    Thêm vào nhóm liên hệ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- navigation end -->
                <div class="contact-detail-content">
                    <div class="contact-detail-left">
                        <div class="contact-detail__head">
                            <div class="contact-detail-head-left">
                                <div class="contact-detail__avatar"><span>HV</span></div>
                                <h4 class="contact-detail__name"><?= $show_C['name'] ?></h4>
                            </div>
                            <div class="contact-detail-head-right">
                                <i class="fa-solid fa-ellipsis function-link-icon open--function-box" id="open--function-box"></i>
                                <ul class="contact-detail-function-list">
                                    <li class="contact-detail-function-items">
                                        <div  class="contact-detail-function-link open-edit-form-btn"><i class="fa-solid fa-pencil"></i> Sửa</div>
                                    </li>
                                    <li class="contact-detail-function-items">
                                        <a href="contact_detail.php?action=delete&id=<?= $_GET['id']?>" class="contact-detail-function-link  bold-red-color"><i class="fa-solid fa-trash-can"></i>Xóa</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="contact-detail-content-wrapper">
                            <div class="contact-detail-row">
                                <div class="contact-detail__title bold-600">Thông tin cá nhân</div>
                                <div class="contact-detail__value"></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Họ và tên đệm:</div>
                                <div class="contact-detail__value"><?= $show_C['lastname'] ?></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Tên:</div>
                                <div class="contact-detail__value"><?= $show_C['name'] ?></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Email:</div>
                                <div class="contact-detail__value"><?= $show_C['email'] ?></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Số điện thoại:</div>
                                <div class="contact-detail__value"><?= $show_C['phoneNumber'] ?></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Giới tính:</div>
                                <div class="contact-detail__value"><?= $show_C['gender'] ?></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Địa chỉ:</div>
                                <div class="contact-detail__value"><?= $show_C['address'] ?></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Lĩnh vực hoạt động:</div>
                                <div class="contact-detail__value"><?= $show_C['Operation_field'] ?></div>
                            </div>
                            <div class="contact-detail-row-stage">
                                <div class="contact-detail__title bold-600">Giai đoạn</div>
                                <div class="contact-detail-input-wrapper">
                                    <div class="contact-detail__avatar backg-vilot-color">
                                        <i class="fa-solid fa-person-running stage-icon"></i>
                                    </div>
                                    <select name="stage" id="<?= $_GET['id'] ?>" class="contact-detail-stage__select">
                                        <option value="<?= $show_C['stage'] ?>" selected hidden><?= $show_C['stage'] ?></option>
                                        <option value="Lead">Lead</option>
                                        <option value="MQL">MQL</option>
                                        <option value="SQL">SQL</option>
                                        <option value="Customer">Customer</option>
                                        <option value="Loyal Customer">Loyal Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title bold-600">Nguồn thu thập</div>
                                <div class="contact-detail__value"></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Nguồn marketing:</div>
                                <div class="contact-detail__value"><?= $show_C['source'] ?></div>
                            </div>
                            <div class="contact-detail-row">
                                <div class="contact-detail__title">Ngày tạo:</div>
                                <div class="contact-detail__value"><?= $show_C['date'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-detail-right">
                        <div class="contact-detail-history__head">Lịch sử hoạt động</div>
                        <div class="filter-contact">
                            <div class="filter-left">
                                <div class="filter-1 customer-border">
                                    <select class="filter__select">
                                        <option value="Tháng này">Thời gian: Tháng này</option>
                                        <option value="Tuần này">Thời gian: Tuần này</option>
                                        <option value="Hôm nay">Thời gian: Hôm nay</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="contact-detail-history-wrapper">
                            <div class="contact-detail-history-time">10/5/2022</div>
                            <div class="contact-detail-history-box">
                                <div class="history-head">Liên hệ</div>
                                <p class="history-description">hoàng vũ được nhân viên Marketing nguyễn hoàng tuấn vũ cập nhật giai đoạn Lead</p>
                            </div>
                            <div class="contact-detail-history-time">10/5/2022</div>
                            <div class="contact-detail-history-box">
                                <div class="history-head">Liên hệ</div>
                                <p class="history-description">hoàng vũ được nhân viên Marketing nguyễn hoàng tuấn vũ cập nhật giai đoạn Lead</p>
                            </div>
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
                <form action="?action=editContact&id=<?= $_GET['id'] ?>" method="POST" class="add-form" enctype="multipart/form-data">
                    <div class="add-contact-wrapper">
                        <h5 class="add-contact__label">Email</h5>
                        <input type="mail" name="email" class="add-contact__input" value="<?= $show_C['email'] ?>" placeholder="Nhập địa chỉ email của liên hệ">
                        <div class="row-input-name">
                            <div class="column-1-2">
                                <h5 class="add-contact__label">Họ và tên đệm</h5>
                                <input type="text" name="lastname" class="add-contact__input" value="<?= $show_C['lastname'] ?>" placeholder="Nhập họ và tên đệm của liên hệ">
                            </div>
                            <div class="column-1-2">
                                <h5 class="add-contact__label">Tên</h5>
                                <input type="text" name="name" class="add-contact__input" value="<?= $show_C['name'] ?>" placeholder="Nhập tên của liên hệ">
                            </div>
                        </div>
                        <h5 class="add-contact__label">Số điện thoại</h5>
                        <input type="text" name="phoneNumber" class="add-contact__input" value="<?= $show_C['phoneNumber'] ?>" placeholder="Nhập số điện thoại">
                        <h5 class="add-contact__label">Nguồn marketing</h5>
                        <select class="add-contact__input" name="source">
                            <option value="<?= $show_C['source'] ?>" selected><?= $show_C['source'] ?></option>
                            <option value="faceBook">faceBook</option>
                            <option value="zalo">zalo</option>
                        </select>
                        <div class="column-1-2">
                            <h5 class="add-contact__label">Giai đoạn</h5>
                            <select class="add-contact__input" name="stage">
                                <option value="<?= $show_C['stage'] ?>" selected><?= $show_C['stage'] ?></option>
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
                                <input type="date" name="birthday" class="add-contact__input" value="<?= $show_C['birthday'] ?>" placeholder="Nhập họ và tên đệm của liên hệ">
                            </div>
                            <div class="column-1-2">
                                <h5 class="add-contact__label">Giới tính</h5>
                                <div class="checkbox-wrapper">
                                    <?php if($show_C['gender'] == 'nam') { ?>
                                    <input type="radio" checked class="add-contact__radio" value="nam" id="male" name="gender">
                                    <label for="male" class="radio-label">Nam</label>
                                    <input type="radio" class="add-contact__radio" value="nữ" id="female" name="gender">
                                    <label for="female" class="radio-label">Nữ</label>
                                    <?php } else { ?>
                                    <input type="radio" class="add-contact__radio" value="nam" id="male" name="gender">
                                    <label for="male" class="radio-label">Nam</label>
                                    <input type="radio" class="add-contact__radio" value="nữ" id="female" name="gender">
                                    <label for="female" checked class="radio-label">Nữ</label>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <h5 class="add-contact__label">Lĩnh vực hoạt động</h5>
                        <select class="add-contact__input" name="operationField">
                            <option value="<?= $show_C['Operation_field'] ?>" selected><?= $show_C['Operation_field'] ?></option>
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
                        <input type="text" name="address" class="add-contact__input" value="<?= $show_C['address'] ?>" placeholder="Nhập địa chỉ của liên hệ">
                    </div>
                    <div class="add-contact-btn-wrapper">
                        <button type="button" class="add-contact-btn__cancel cancel-btn" onclick="window.location.href = 'contact_detail.php?id=<?= $_GET['id']?>';">Hủy</button>
                        <button type="submit" name="form1Submit" class="add-contact-btn__save"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
                    </div>
                </form>
            </div>
            <div class="add-contact-group-model">
                <div class="add-contact-header">
                    <h2 class="add-contact__head">Chọn nhóm liên hệ</h2>
                </div>
                <form action="contact_detail.php?id=<?= $_GET['id'] ?>&action=addCIG" method="post">
                    <div class="add-group-wrapper">
                        <select name="groups" id="select-groups-form" class="add-contact__input select-groups-form2">
                            <!-- <option value="123" selected>Chọn nhóm liên hệ</option> -->
                            <?php while($row = mysqli_fetch_array($query_groups)) { ?>
                                <option value="<?= $row['group_id'] ?>"><?= $row['group_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="add-contact-btn-wrapper">
                            <button type="button" name="cancel" class="add-contact-btn__cancel cancel-form2-btn" onClick =" window.location.href = 'contact_detail.php?id=<?= $_GET['id'] ?>'; ">Hủy</button>
                            <button type="submit" name="form2Submit" class="add-contact-btn__save"><i class="fa-solid fa-plus"></i>Tạo nhóm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="js2.js"></script>
<script>
    $('.contact-detail-stage__select').on('change', function() {
        var contact_id = this.id;
        var stage = this.value;
        console.log(stage)
        console.log(contact_id)
        $.ajax({
            url: 'addCIG.php',
            type: 'POST',
            data: { contact_id:contact_id, stage:stage},
            success:function(response){
                console.log('Save successfully');
            }
        });
    })
</script>
</body>
</html>