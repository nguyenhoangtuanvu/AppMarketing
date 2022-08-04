<?php
    session_start();
    include '../connect_db.php';
    // $template_file = "mail_html.php";
    // if(file_exists($template_file)) {
    //     $body = file_get_contents($template_file);
    // }
    // add mail
    if(isset($_GET['action']) && $_GET['action'] == "add") {
        $save_mail = mysqli_query($con, "INSERT INTO `mail`(`id`, `title`, `content`, `btn_name`, `btn_link`, `text_body`, `phoneNumber`, `mail`, `text_footer`,  `status`, `creator`) 
        VALUES (NULL,'". $_POST['title']."','". $_POST['content']."','". $_POST['btn_name']."','". $_POST['btn_link']."','". $_POST['text_body']."','". $_POST['phoneNumber']."','". $_POST['email']."','". $_POST['text_footer']."','Chưa gửi','". $_SESSION['currentUser']['id']."')");
        if($save_mail) {
            $last_id = mysqli_insert_id($con);
            header('location:mail_detail.php?id='.$last_id);
        }
    }
    if(isset($_GET['id']) && $_GET['id'] != '') {
        $query_email = mysqli_query($con, "SELECT * FROM `mail` WHERE `id` =" . $_GET['id']);
        $show_M = mysqli_fetch_assoc($query_email);
    }
    // update mail
    if(isset($_GET['action']) && $_GET['action'] == 'update') {
        $update_mail = mysqli_query($con, "UPDATE `mail` SET `title`='". $_POST['title']."',`content`='". $_POST['content']."',`btn_name`='". $_POST['btn_name']."',`btn_link`='". $_POST['btn_link']."',
        `text_body`='". $_POST['text_body']."',`phoneNumber`='". $_POST['phoneNumber']."',`email`='". $_POST['email']."',`text_footer`='". $_POST['text_footer']."' WHERE `id`=".$_GET['id']);
        if($update_mail) {
            header('location:mail_detail.php?id='.$_GET['id']);
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
                <form action="<?= isset($_GET['id']) ? 'mail_detail.php?action=update&id='.$_GET['id'] : 'mail_detail.php?action=add'?>" method="post">
                <div class="navigation">
                    <div class="nav-overview">
                        <div class="nav-left">
                            <a href="Email.php"><i class="fa-solid fa-angle-left nav-left-icon"></i></a>
                            <h2 class="nav-group-detail__head">Emails</h2>
                        </div>
                        <div class="nav-right">
                            <button type="submit" class="add-landingPage">
                                <i class="fa-solid fa-plus"></i> Lưu
                            </button>
                            <?php if(isset($_GET['id'])) { ?>
                            <a href="sendMail.php?id=<?= $_GET['id'] ?>" class="add-landingPage">Tiếp tục</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- navigation end -->
                    <div class="mail-layout" style="width: 100%;background-color: #f9f9f9;font-family: 'Cabin',sans-serif;display: flex;align-items: center;justify-content: center; margin-bottom: 20px;">
                        <div style="min-width: 600px; margin-bottom:20px;">
                            <div style="background-color: #1f5daa; height: 155px;">
                                <div style="height: 90px; display: flex; justify-content: center; align-items: center;">
                                    <img src="../assets/img/mail_img.png" alt="" style="width: 150px;">
                                </div>
                                <div style="display: flex; justify-content: center;">
                                    <input type="text" class="mail-title-input" name="title" value="<?= isset($_GET['id']) ? $show_M['title'] : 'Mail-title' ?>" style="background-color: #1f5daa; border: 0; color: #fff; text-align: center; padding:10px; font-size: 28px; line-height: 140%;">
                                </div>
                            </div>
                            <div  style="background-color: #fff; padding: 30px 50px;">
                                <div style="min-height: 180px; display: flex; justify-content: center;">
                                    <textarea spellcheck="false" name="content" placeholder=" Type something here..." required style="border: 0; color: #333; text-align: center; padding:10px; font-size: 15px; width: 80%; height: 40px;"><?= isset($_GET['id']) ? $show_M['content'] : 'Mail-content' ?></textarea>
                                </div>
                                <div  style="display: flex;">
                                    <input type="text" name="btn_name" class="btn" value="<?= isset($_GET['id']) ? $show_M['btn_name'] : 'button name' ?>" style="width:50%; height: 40px; background-color: #ff6600;  display: flex; align-items: center; border-radius: 4px; font-size: 1.3rem; font-weight: 500; color: #fff;">
                                    <input type="text" name="btn_link" placeholder="<?= isset($_GET['id']) ? $show_M['btn_link'] : 'button link' ?>" style="width:50%;">
                                </div>
                                <div style="margin-top: 20px;">
                                    <textarea spellcheck="false" name="text_body" placeholder="Thanks, The Company Team" required style="border: 0; color: #333; text-align: center; padding:10px; font-size: 15px; width: 100%; height: 40px;"><?= isset($_GET['id']) ? $show_M['text_body'] : '' ?></textarea>
                                </div>
                            </div>
                            <div style="background-color: #e5eaf5;">
                                <div style="padding: 41px 55px 18px;">
                                    <input type="text" name="phoneNumber" value="<?= isset($_GET['id']) ? $show_M['phoneNumber'] : '0935794380' ?>" style="width: 100%;height: 40px; border: 0; font-size: 13px; color: #000000; text-align: center; margin:auto;background-color: #e5eaf5;">
                                    <input type="email" name="email" value="<?= isset($_GET['id']) ? $show_M['mail'] : 'avu7212@gmail.com' ?>" style="width: 100%;height: 40px; border: 0; font-size: 13px; color: #000000; text-align: center; margin:auto;background-color: #e5eaf5;">
                                </div>
                                <div style=" display: flex; align-items:center; justify-content: center; padding-bottom: 20px;">
                                    <a href="https://facebook.com/" title="Facebook" target="_blank">
                                        <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/facebook.png" alt="Facebook" title="Facebook" width="32" style="margin:5px; outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                    </a>
                                    <a href="https://linkedin.com/" title="LinkedIn" target="_blank">
                                        <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/linkedin.png" alt="LinkedIn" title="LinkedIn" width="32" style="margin:5px; outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                    </a>
                                    <a href="https://instagram.com/" title="Instagram" target="_blank">
                                        <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/instagram.png" alt="Instagram" title="Instagram" width="32" style="margin:5px; outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                    </a>
                                    <a href="https://youtube.com/" title="YouTube" target="_blank">
                                        <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/youtube.png" alt="YouTube" title="YouTube" width="32" style="margin:5px; outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                    </a>
                                    <a href="https://email.com/" title="Email" target="_blank">
                                        <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/email.png" alt="Email" title="Email" width="32" style="margin:5px; outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                    </a>
                                </div>
                                <div style=" height: 40px; background-color: #1f5daa;">
                                    <input type="text" name="text_footer" style="background-color: #1f5daa; width: 100%; height: 100%; color: #fff; text-align: center;" value="<?= isset($_GET['id']) ? $show_M['text_footer'] : 'Copyrights © Company All Rights Reserved' ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<script src="assets/JS/script.js"></script>
<script>
    const textarea = document.querySelectorAll("textarea");
    for(let i = 0; i < textarea.length; i ++) {
        textarea[i].addEventListener("keyup", e => {
            textarea[i].style.height = "63px";
            let scHeight = e.target.scrollHeight;
            textarea[i].style.height = `${scHeight}px`;
        })
    }
</script>
</body>
</html>