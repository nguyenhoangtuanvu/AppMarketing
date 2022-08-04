<?php 
    session_start();
    include '../connect_db.php';
    // view
    $query_group = mysqli_query($con, "SELECT * FROM `groups` WHERE `group_id`= " .$_GET['id']);
    $group = mysqli_fetch_assoc($query_group);

    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 
    if(isset($_GET['id']) && $_GET['id'] != '') {
        $query_group_detail = mysqli_query($con, "SELECT * FROM `contact` AS c 
        INNER JOIN `contact_in_group` AS g ON c.id = g.contact_id
        WHERE g.group_id =" .$_GET['id']. " LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    $totalRecords = mysqli_query($con, "SELECT * FROM `contact_in_group` WHERE `group_id`= " .$_GET['id']);
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);


    // add contact
    // if(isset($_GET['action']) && $_GET['action'] == 'add') {
    //     // var_dump('aldsfja');exit;
    //     // var_dump(NULL, $_POST['email'], $_POST['lastname'],$_POST['name'], $_POST['phoneNumber'], $_POST['source'], $_POST['stage'], $_POST['birthday'], $_POST['gender'], $_POST['operationField'], $_POST['address']);exit;
    //     if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['phoneNumber']) && !empty($_POST['source']) && !empty($_POST['operationField'])) {
    //         $resuilt = mysqli_query($con, "INSERT INTO `contact`(`id`, `email`, `lastname`, `name`, `phoneNumber`, `source`, `stage`, `birthday`, `gender`, `Operation_field`, `address`, `date`) 
    //         VALUES (NULL,'". $_POST['email']."','". $_POST['lastname']."','". $_POST['name']."','". $_POST['phoneNumber']."','". $_POST['source']."','". $_POST['stage']."','". $_POST['birthday']."','". $_POST['gender']."','". $_POST['operationField']."','". $_POST['address']."','". $_POST['date']."');");
    //     }else {
    //         $error = 'bạn hãy nhập đủ thông tin';
    //     }
    // }
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
                            <a href="groups.php"><i class="fa-solid fa-angle-left nav-left-icon"></i></a>
                            <h2 class="nav-group-detail__head"><?= $group['group_name'] ?></h2>
                        </div>
                    </div>
                </div>
                <!-- navigation end -->
                <div class="overview">
                    <div class="filter-contact">
                        <div class="filter-left">
                            <div class="filter-search">
                                <div class="search-icon"></div>
                                <input type="text" class="filter-search__input" placeholder="Tìm kiếm theo từ khóa">
                            </div>
                            <div class="filter-1">
                                <select class="filter__select">
                                    <option value="Tháng này">Thời gian: Tháng này</option>
                                    <option value="Tuần này">Thời gian: Tuần này</option>
                                    <option value="Hôm nay">Thời gian: Hôm nay</option>
                                </select>
                            </div>
                            <div class="filter-2">
                                <select class="filter__select">
                                    <option value="Tháng này">Loại hàng hóa: Tất cả</option>
                                    <option value="Tuần này">Loại hàng hóa: Tuần này</option>
                                    <option value="Hôm nay">Loại hàng hóa: Hôm nay</option>
                                </select>
                            </div>
                            <div class="filter-btn">
                                <img src="../assets/img/filter.png" alt="" class="filter-btn__img">
                                <h5 class="filter-btn__label">Lọc</h5>
                            </div>
                        </div>
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
                                while($row = mysqli_fetch_array($query_group_detail)) { 
                                    $count++;
                                ?>
                                <tr>
                                    <th class="table-column1 table-body flex-ali-center">
                                        <input type="checkbox" name="check" class="table-check">
                                        <img src="../assets/img/ava.jpg" alt="" class="table-avatar">
                                        <h5 class="table-bold"><?= $row['lastname']. " ". $row['name'] ?></h5>
                                    </th>
                                    <th class="table-column2 table-body"><?= $row['email'] ?></th>
                                    <th class="table-column3 table-body"><?= $row['phoneNumber'] ?></th>
                                    <th class="table-column4 table-body"><?= $row['date'] ?></th>
                                    <th class="table-column5 table-body"><?= $row['stage'] ?></th>
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
        </div>
    </div>
<script src="/vinasimex/Marketing/assets/JS/script.js"></script>
</body>
</html>