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
                        <h2 class="overview-heading">Landing Page</h2>
                        <div class="add-landingPage">
                            <a href="#" class="add-new__link"><i class="fa-solid fa-plus"></i>Tạo Landing page</a>
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
                                    <option value="Tháng này">Trạng thái: Tất cả</option>
                                    <option value="Tuần này">Trạng thái: Chưa xuất bản</option>
                                    <option value="Hôm nay">Trạng thái: Đã xuất bản</option>
                                </select>
                            </div>
                            <div class="filter-2">
                                <select class="filter__select">
                                    <option value="Tháng này">Người tạo: Tất cả</option>
                                    <option value="Tuần này">Người tạo: Tuần này</option>
                                </select>
                            </div>
                            <div class="filter-btn">
                                <img src="../assets/img/filter.png" alt="" class="filter-btn__img">
                                <h5 class="filter-btn__label">Lọc</h5>
                            </div>
                        </div>
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
                                <tr class="table-items">
                                    <th class="table-column-group-1 table-body flex-ali-center">
                                        <input type="checkbox" name="check" class="table-check">
                                        <div class="table-column__name">
                                            <h5 class="table-bold text-align-start">Landing Page</h5>
                                            <h5 class="landing-publish">Chưa xuất bản | 27/4/2022 09:20</h5>
                                        </div>
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
                                    <th class="table-column-group-4 table-body">Nguyễn hoàng tuấn vũ </th>
                                    <th class="table-column-group-5 table-body">19/4/2022</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="table-result">Hiển thị 2/11 Kết quả</h5>
                </div>
            </div>
        </div>
    </div>
<script src="assets/JS/script.js"></script>
</body>
</html>