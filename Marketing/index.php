<?php
  session_start();
  include 'connect_db.php';

  // 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-6.0.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Marketing</title>
</head>
<body>
    <div class="grid">
        <!-- header -->
        <?php include 'header.php' ?>
        <!-- content -->
        <div class="container">
            <!-- sidebar -->
            <?php include 'sidebar.php' ?>
            <!-- navigation start -->
            <div class="content">
                <div class="navigation">
                    <div class="nav-overview">
                        <h2 class="overview-heading">Tổng quan</h2>
                    </div>
                </div>
                <!-- navigation end -->
                <div class="overview">
                    <div class="filter">
                        <div class="filter-left">
                            <h4 class="filter-head">Tổng quan chung</h4>
                        </div>
                        <div class="filter-right">
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
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="row-left">
                                <div class="box-size-1 box">
                                    <div class="box-header">Doanh số phát sinh</div>
                                    <div class="sales">
                                        <h3 class="money__amount">999.999.999</h3>
                                        <h5 class="money__unit">VND</h5>
                                        <div class="money-growth-element">
                                            <i class="fa-solid fa-arrow-up-long"></i>
                                            <!-- <i class="fa-solid fa-arrow-down-long"></i> -->
                                            <h5 class="money-growth-percent">100 %</h5>
                                        </div>
                                    </div>
                                    <div class="new-sales">
                                        <h3 class="new-sales__title">Doanh số phát sinh mới</h3>
                                        <div class="money-growth">
                                            <h5 class="money-growth__amount">999.999.999</h5>
                                            <h5 class="money-growth__unit">VND</h5>
                                        </div>
                                    </div>
                                    <div class="chartBox">
                                        <canvas id="PieChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row-right">
                                <div class="row-height-50">
                                    <div class="box-size-2 box">
                                        <div class="box-header">
                                            <img src="assets/img/ava.jpg" alt="" class="customer-img back-col-blue">
                                            <h4 class="header-title col-blue">Giá trị đơn hàng trung bình</h4>
                                        </div>
                                        <div class="box-2-sales">
                                            <h3 class="money__amount">32</h3>
                                            <div class="money-growth-element">
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                                <!-- <i class="fa-solid fa-arrow-down-long"></i> -->
                                                <h5 class="money-growth-percent">100 %</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-size-2 box">
                                        <div class="box-header">
                                            <img src="assets/img/ava.jpg" alt="" class="customer-img  back-col-blue-blur">
                                            <h4 class="header-title col-blue-blur">Tỉ lệ phát sinh cơ hội</h4>
                                        </div>
                                        <div class="box-2-sales">
                                            <h3 class="money__amount">32</h3>
                                            <div class="money-growth-element">
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                                <!-- <i class="fa-solid fa-arrow-down-long"></i> -->
                                                <h5 class="money-growth-percent">100 %</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-height-50">
                                    <div class="box-size-2 box">
                                        <div class="box-header">
                                            <img src="assets/img/ava.jpg" alt="" class="customer-img back-col-green">
                                            <h4 class="header-title col-green">Khách hàng</h4>
                                        </div>
                                        <div class="box-2-sales">
                                            <h3 class="money__amount">32</h3>
                                            <div class="money-growth-element">
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                                <!-- <i class="fa-solid fa-arrow-down-long"></i> -->
                                                <h5 class="money-growth-percent">100 %</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-size-2 box">
                                        <div class="box-header">
                                            <img src="assets/img/ava.jpg" alt="" class="customer-img back-col-yellow">
                                            <h4 class="header-title col-yellow">Khách hàng trung thành</h4>
                                        </div>
                                        <div class="box-2-sales">
                                            <h3 class="money__amount">32</h3>
                                            <div class="money-growth-element">
                                                <i class="fa-solid fa-arrow-up-long"></i>
                                                <!-- <i class="fa-solid fa-arrow-down-long"></i> -->
                                                <h5 class="money-growth-percent">100 %</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter">
                        <div class="filter-left">
                            <h4 class="filter-head">Tổng quan Bán hàng</h4>
                        </div>
                        <div class="filter-right">
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
                        </div>
                    </div>
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="row-left">
                                <div class="box-size-1 box">
                                    <div class="box-header">Doanh số Theo thời gian</div>
                                    <div class="header-summary">Doanh số theo thời gian</div>
                                    <div class="header-money">
                                        <h4 class="header__money">99.999.999</h4>
                                        <div class="header-money__unit">VND</div>
                                    </div>
                                    <div class="chartBox">
                                        <canvas id="ColumnChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row-right">
                                <div class="box-size-1 box">
                                    <div class="box-header">Hiệu quả doanh số theo hàng hóa</div>
                                    <div class="box-filter">
                                        <div class="box-filter__label">Lọc theo: <span>Tất cả</span></div>
                                    </div>
                                    <div class="chartBox">
                                        <canvas id="PieChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="row-left">
                                <div class="box-size-1 box">
                                    <div class="box-header">Doanh số theo nguồn</div>
                                    <div class="header-summary">Doanh số theo thời gian</div>
                                    <div class="header-money">
                                        <h4 class="header__money">99.999.999</h4>
                                        <div class="header-money__unit">VND</div>
                                    </div>
                                    <div class="chartBox">
                                        <canvas id="HorizontalChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row-right">
                                <div class="box-size-1 box">
                                    <div class="box-header">Hiệu quả doanh số theo hàng hóa</div>
                                    <div class="box-filter">
                                        <div class="box-filter__label">Lọc theo: <span>Tất cả</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // setup 
    const pieChart1 = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config1 = {
      type: 'bar',
      data: pieChart1,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const pieChart = new Chart(
      document.getElementById('PieChart1'),
      config1
    );
    </script>

    <script>
    // setup 
    const columnChart1 = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config2 = {
      type: 'bar',
      data:columnChart1,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const ColumnChart = new Chart(
      document.getElementById('ColumnChart1'),
      config2
    );
    </script>

    <script>
    // setup 
    const HorizontalChart = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config4 = {
      type: 'bar',
      data:HorizontalChart,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const horizontalChart = new Chart(
      document.getElementById('HorizontalChart'),
      config4
    );
    </script>
    <script>
    // setup 
    const PieChart2 = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config3 = {
      type: 'bar',
      data:PieChart2,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const PieCharttwo = new Chart(
      document.getElementById('PieChart2'),
      config3
    );
    </script>

    <script src="./assets/JS/script.js"></script>
</body>
</html>