<?php
    session_start();
    include '../connect_db.php';

    $config_name = 'groups';
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
                    $where .= (!empty($where)) ? "AND" . " (`group_id` LIKE '%".$value."%' OR `group_name` LIKE '%".$value."%' OR `date_create` LIKE '%".$value."%' OR `date_update` LIKE '%".$value."%') " 
                    : "(`group_id` LIKE '%".$value."%' OR `group_name` LIKE '%".$value."%' OR `date_create` LIKE '%".$value."%' OR `date_update` LIKE '%".$value."%') ";
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
    if(isset($where)) {
        $query_groups = mysqli_query($con, "SELECT * FROM `groups` WHERE (".$where.") LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else {
        $query_groups = mysqli_query($con, "SELECT * FROM `groups` LIMIT " . $item_per_page . " OFFSET " . $offset);
    }

    $totalRecords = mysqli_query($con, "SELECT * FROM `groups`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);



    // add groups
    if(isset($_GET['action']) && $_GET['action'] == 'add') {
        // var_dump('aldsfja');exit;
        if(!empty($_POST['name'])) {
            $resuilt = mysqli_query($con, "INSERT INTO `groups`(`group_id`, `group_name`, `date_create`, `date_update`) 
            VALUES (NULL,'". $_POST['name']."','". $_POST['date_create']."','". $_POST['date_update']."');");
            if($resuilt) {
                header("location:groups.php");
            }
        }else {
            $error = 'bạn hãy nhập đủ thông tin';
        }
    }
    // delete
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $delete_groups = mysqli_query($con, "DELETE FROM `groups` WHERE `group_id` =" . $_GET['id']);
        if($delete_groups) {
            header("location:groups.php");
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
                        <h2 class="overview-heading">Nhóm liên hệ</h2>
                    </div>
                </div>
                <!-- navigation end -->
                <div class="overview">
                    <div class="filter-contact">
                        <form action="groups.php?action=search" method="post">
                            <div class="filter-left">
                                <div class="filter-search">
                                    <div class="search-icon"></div>
                                    <input type="text" name="search" class="filter-search__input" value="<?=isset($search) ? $search : "" ?>" placeholder="Tìm kiếm theo từ khóa">
                                </div>
                                <button type="submit" class="filter-btn">
                                    <img src="/VINASIMEX/Marketing/assets/img/filter.png" alt="" class="filter-btn__img">
                                    <h4 class="filter-btn__label">Lọc</h4>
                                </button>
                            </div>
                        </form>
                        <div class="filter-right">
                            <div class="filter-add-new__btn"><i class="fa-solid fa-plus"></i>Tạo mới</div>
                        </div>
                    </div>
                    <div class="content-table-wrapper">
                        <table class="table">
                            <thead>
                                <th class="table-column-group-1 table-thead flex-ali-center">
                                    <input type="checkbox" name="check" class="table-check">
                                    <h5>Tên nhóm</h5>
                                </th>
                                <th class="table-column-group-3 table-thead">Số Liên hệ</th>
                                <th class="table-column-group-4 table-thead">Ngày tạo</th>
                                <th class="table-column-group-5 table-thead">Ngày cập nhật</th>
                            </thead>
                            <tbody>
                                <?php 
                                $count = 0;
                                while($row = mysqli_fetch_array($query_groups)) { 
                                    $count++;
                                ?>
                                <tr>
                                    <th class="table-column-group-1 table-body flex-ali-center">
                                        <a href="group_detail.php?id=<?= $row['group_id'] ?>" class="table-items__link">
                                            <input type="checkbox" name="check" class="table-check">
                                            <img src="/VINASIMEX/Marketing/assets/img/book.jpg" alt="" class="table-avatar">
                                            <h5 class="table-bold"><?= $row['group_name'] ?></h5>
                                        </a>
                                    </th>
                                    <th class="table-column-group-3 table-body"> <?= $row['group_id'] ?></th>
                                    <th class="table-column-group-4 table-body"><?= $row['date_create'] ?></th>
                                    <th class="table-column-group-5 table-body table-function">
                                        <span><?= $row['date_update'] ?></span>
                                        <i class="fa-solid fa-ellipsis link-icon"></i>
                                        <ul class="table-function-box">
                                            <li class="table-function-items">
                                                <a href="groups.php?action=delete&id=<?= $row['group_id'] ?>" class="table-function__link bold-red-color open--form2-model"><i class="fa-solid fa-trash-can"></i>Xóa</a>
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
            <div class="add-group-model box-insert-group">
                <div class="add-contact-header">
                    <h2 class="add-contact__head">Tạo nhóm liên hệ mới</h2>
                </div>
                <form action="?action=add" method="POST" class="add-form" enctype="multipart/form-data">
                    <input type="hidden" name="date_create" value="<?= date("Y-m-d") ?>">
                    <input type="hidden" name="date_update" value="<?= date("Y-m-d") ?>">
                    <div class="add-group-wrapper">
                        <h5 class="add-contact__label">Tên nhóm liên hệ</h5>
                        <input type="text" name="name" class="add-contact__input add-group__input" placeholder="Tiêu đề nhóm liên hệ">
                    </div>
                    <div class="add-contact-btn-wrapper">
                        <button type="cancel" class="add-contact-btn__cancel cancel-btn">Hủy</button>
                        <button type="submit" class="add-contact-btn__save"><i class="fa-solid fa-plus"></i>Tạo nhóm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="/vinasimex/Marketing/assets/JS/script.js"></script>
</body>
</html>