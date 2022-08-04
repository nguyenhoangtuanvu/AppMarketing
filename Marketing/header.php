<!-- <?php 
    session_start();
    include 'connect_db.php';
    $company = mysqli_query($con, "SELECT * FROM `company`");    
    if(!isset($_SESSION['currentUser'])) {
        header("location:/vinasimex/marketing/login.php");
    }
?> -->
<div class="header">
    <div class="header-head">
        <div class="menu-icon">
            <i class="fa-solid fa-bars"></i>
            <img src="/VINASIMEX/Marketing/assets/img/Picture7.png" alt="" class="marketing-icon">
            <h2 class="marketing-title">VINASIMEX <span>ai</span>Marketing</h2>
        </div>
    </div>
    <div class="header-end">
        <div class="header-login-user header--function">
            <img src="/VINASIMEX/Marketing/assets/img/avatar.jpg" alt="" class="user-avatar">
            <span class="login-user-name"><?php echo $_SESSION['currentUser']['email'] ?></span>
            <i class="fa-solid fa-angle-down header-end__down-icon"></i>
            <div class="login-function header--function-box">
                <div class="login-function__header">
                    <img src="/VINASIMEX/Marketing/assets/img/avatar.jpg" alt="" class="login-function-img">
                    <div class="login__info">
                        <h2 class="login__users-name"><?php echo $_SESSION['currentUser']['email'] ?></h2>
                        <a href="#" class="login__account-info">Thông tin tài khoản</a>
                    </div>
                </div>
                <div class="account__company-head">
                    <h2 class="account__conpany-list-name">Danh sách công ty</h2>
                    <a href="#" class="account-company-management__link">Quản lý</a>
                </div>
                <!-- <?php while($row = mysqli_fetch_array($company)) { ?> -->
                <ul class="account-company-list">
                    <li class="account-company-items">
                        <div class="company-info">
                            <img src="/VINASIMEX/Marketing/assets/img/avatar.jpg" alt="" class="company__avatar">
                            <h4 class="company__name"><?= $row['name'] ?></h4>
                            <div class="company__checked"></div>
                        </div>
                        <ul class="company-data-list">
                            <li class="company-data-items">
                                <div class="company-data__icon"></div>
                                <div class="company-data__icon--noActi"></div>
                                <span class="company-data__name">Dữ liệu nắm 2020</span>
                                <div class="company-data__icon-check--active"></div>
                            </li>
                            <li class="company-data-items">
                                <div class="company-data__icon"></div>
                                <div class="company-data__icon--noActi"></div>
                                <span class="company-data__name">Dữ liệu nắm 2021</span>
                                <div class="company-data__icon-check--active"></div>
                            </li>
                        </ul>
                        <a href="#" class="company__management-data">Quản lý dữ liệu</a>
                    </li>
                </ul>
                <!-- <?php } ?> -->
                <div class="login-function__footer">
                    <a href="/VINASIMEX/Marketing/logout.php" class="account__logout-link"><button class="account__logout">Đăng xuất</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- <div class="overlay" id="overlay"></div>
    <div class="overlay-not-color" id="overlay-2"></div> -->

    