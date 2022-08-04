<?php
    include '../connect_db.php';
    session_start();
    // query creator email
    $query_creator = mysqli_query($con,"SELECT * FROM `account`");
    $config_name = 'Email';
    if(isset($_SESSION['currentUser'])) {
        if(!empty($_GET['action']) && $_GET['action'] == 'search') {
            $_SESSION[$config_name. '_filter'] = $_POST;
            header('location:' .$config_name. '.php');
        }
    }
    // var_dump($_SESSION['currentUser']);exit;
    if(!empty($_SESSION[$config_name. '_filter'])) {
        $where = '';
        foreach($_SESSION[$config_name. '_filter'] as $field => $value) {
            switch($field) {
                case 'search' :
                    $where .= (!empty($where)) ? "AND" . " (`title` LIKE '%".$value."%' OR `email` LIKE '%".$value."%' OR `status` LIKE '%".$value."%' OR `time_send` LIKE '%".$value."%'
                    OR `creator` LIKE '%".$value."%') " 
                    : "(`title` LIKE '%".$value."%' OR `email` LIKE '%".$value."%' OR `status` LIKE '%".$value."%' OR `time_send` LIKE '%".$value."%'
                    OR `creator` LIKE '%".$value."%') ";
                break;
                case 'status' :
                    $where .=  (!empty($where))? " AND "." `".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                break;
                default :
                    $where .= (!empty($where))? " AND "." `".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                break;
            }
        }
        // var_dump($where);exit;
        extract($_SESSION[$config_name. '_filter']);
    }

    // var_dump($body);exit;
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 10;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 
    if(!empty($where)) {
        // $query_mail = mysqli_query($con, "SELECT * FROM `mail` WHERE (".$where.") LIMIT " . $item_per_page . " OFFSET " . $offset);
        $query_mail = mysqli_query($con, "SELECT M.id AS mail_id, M.title AS title, M.status AS status,  M.time_send AS time_send, M.creator AS creator, acc.id AS account_id, acc.email AS account_Email FROM `mail` M
        INNER JOIN `account` acc ON M.creator = acc.id
        WHERE (".$where.") LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else {
        $query_mail = mysqli_query($con, "SELECT M.id AS mail_id, M.title AS title,M.email AS email, M.status AS status,  M.time_send AS time_send, M.creator AS creator, acc.id AS account_id, acc.email AS account_Email FROM `mail` M
        INNER JOIN `account` acc ON M.creator = acc.id
        LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    $totalRecords = mysqli_query($con, "SELECT * FROM `mail`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);

    // delete mail
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $result = mysqli_query($con, "DELETE FROM `mail` WHERE `id`=".$_GET['id']);
        if($result) {
            header('location:Email.php');
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
                        <h2 class="overview-heading">Emails</h2>
                        <div class="add-landingPage">
                            <a href="mail_detail.php" class="add-new__link"><i class="fa-solid fa-plus"></i>Tạo email</a>
                        </div>
                        
                    </div>
                </div>
                <!-- navigation end -->
                <div class="overview">
                    <div class="filter-contact">
                        <form action="Email.php?action=search" method="post">
                            <div class="filter-left">
                                <div class="filter-search">
                                    <div class="search-icon"></div>
                                    <input name="search" type="text" class="filter-search__input" placeholder="Tìm kiếm theo từ khóa">
                                </div>
                                <div class="filter-1">
                                    <select name="status" class="filter__select">
                                        <?php if(isset($status)) { ?>
                                            <option value="<?= $status?>" selected hidden>Trạng thái: <?= empty($status) ? 'Tất cả' : $status?></option>
                                        <?php } ?>
                                        <option value="">Trạng thái: Tất cả</option>
                                        <option value="Đã gửi">Trạng thái: Đã gửi</option>
                                        <option value="Chưa gửi">Trạng thái: Chưa gửi</option>
                                    </select>
                                </div>
                                <div class="filter-2">
                                    <select name="creator" class="filter__select">
                                        <?php if(isset($creator)) {
                                            $result = mysqli_query($con, "SELECT * FROM `account` WHERE `id`=".$creator);
                                            $show = mysqli_fetch_assoc($result);
                                        ?>
                                            <option value="<?= $creator?>" selected hidden>Người tạo: <?= empty($show['email']) ? 'Tất cả' : $show['email']?></option>
                                        <?php } ?>
                                        <option value="">Người tạo: Tất cả</option>
                                        <?php while($row = mysqli_fetch_array($query_creator)) { ?>
                                        <option value="<?= $row['id'] ?>">Người tạo: <?= $row['email'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="filter-btn">
                                    <img src="../assets/img/filter.png" alt="" class="filter-btn__img">
                                    <h5 class="filter-btn__label">Lọc</h5>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="content-table-wrapper">
                        <table class="table">
                            <thead>
                                <th class="table-column-group-1 table-thead flex-ali-center">
                                    <input type="checkbox" name="check" class="table-check">
                                    <h5>Tên</h5>
                                </th>
                                <th class="table-column-group-3 table-thead">Báo cáo</th>
                                <th class="table-column-group-4 table-thead">Tạo trang</th>
                                <th class="table-column-group-5 table-thead">Sửa lần cuối</th>
                            </thead>
                            <tbody>
                                <?php $count= 0;
                                    while($row = mysqli_fetch_array($query_mail)) { 
                                        $count++
                                ?>
                                <tr class="table-items">
                                    <th class="table-column-group-1 table-body flex-ali-center">
                                        <a href="mail_detail.php?id=<?= $row['mail_id'] ?>" class="table-items__link">
                                            <input type="checkbox" name="check" class="table-check">
                                            <div class="table-column__name">
                                                <h5 class="table-bold text-align-start"><?= $row['title'] ?></h5>
                                                <h5 class="landing-publish"><?= $row['status'] ?> <?= !empty($row['time_send']) ? " | " . $row['time_send'] : "" ?></h5>
                                            </div>
                                        </a>
                                    </th>
                                    <th class="table-column-group-3 table-body">
                                        <div class="table-report-row">
                                            <div class="table-report__label">Lượt xem:</div>
                                            <div class="table-report__percent">0 </div>
                                        </div>
                                        <div class="table-report-row">
                                            <div class="table-report__label">Lượt submit:</div>
                                            <div class="table-report__percent">0 </div>
                                        </div>
                                        <div class="table-report-row">
                                            <div class="table-report__label">Tỉ lệ submid:</div>
                                            <div class="table-report__percent">0 %</div>
                                        </div>
                                    </th>
                                    <th class="table-column-group-4 table-body"><?= $row['account_Email'] ?> </th>
                                    <th class="table-column-group-5 table-body">19/4/2022</th>
                                    <th class="table-column-group-6 table-body table-function">
                                        <i class="fa-solid fa-ellipsis link-icon"></i>
                                        <ul class="table-function-box">
                                            <li class="table-function-items">
                                                <a href="Email.php?id=<?= $row['mail_id'] ?>&action=delete" class="table-function__link bold-red-color"><i class="fa-solid fa-trash-can"></i>Xóa</a>
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
        </div>
    </div>
<script src="./mail.js"></script>
</body>
</html>