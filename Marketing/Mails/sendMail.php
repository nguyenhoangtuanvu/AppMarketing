<?php
    include "../connect_db.php";
    $query_groups = mysqli_query($con, "SELECT * FROM `groups`");
?>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    function sendmail(){
        include "../connect_db.php";
        $query_mail = mysqli_query($con, "SELECT * FROM `mail` WHERE `id`=".$_GET["id"]);
        $show_M = mysqli_fetch_assoc($query_mail);
        
        // var_dump($mail_to);exit;
        // foreach($select_contact_in_groups as $contact) {
        //     // $result = mysqli_query($con, "SELECT * FROM `contact` WHERE `id`=". $contact);
        //     // $mail = mysqli_fetch_assoc($result);
        //     echo $contact;
        //     // $to .= ""
        // }
        // $template_file = "mail_html.php";
        // if(file_exists($template_file)) {
        //     $body = file_get_contents($template_file);
        // }
        // var_dump($body);exit;
        $body = '   
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
        
        <head>
            <!--[if gte mso 9]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="x-apple-disable-message-reformatting">
            <!--[if !mso]><!-->
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!--<![endif]-->
            <title></title>
        
            <style type="text/css">
            @media only screen and (min-width: 620px) {
                .u-row {
                width: 600px !important;
                }
                .u-row .u-col {
                vertical-align: top;
                }
                .u-row .u-col-100 {
                width: 600px !important;
                }
            }
            
            @media (max-width: 620px) {
                .u-row-container {
                max-width: 100% !important;
                padding-left: 0px !important;
                padding-right: 0px !important;
                }
                .u-row .u-col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
                }
                .u-row {
                width: calc(100% - 40px) !important;
                }
                .u-col {
                width: 100% !important;
                }
                .u-col>div {
                margin: 0 auto;
                }
            }
            
            body {
                margin: 0;
                padding: 0;
            }
            
            table,
            tr,
            td {
                vertical-align: top;
                border-collapse: collapse;
            }
            
            p {
                margin: 0;
            }
            
            .ie-container table,
            .mso-container table {
                table-layout: fixed;
            }
            
            * {
                line-height: inherit;
            }
            
            a[x-apple-data-detectors="true"] {
                color: inherit !important;
                text-decoration: none !important;
            }
            
            table,
            td {
                color: #000000;
            }
            
            a {
                color: #0000ee;
                text-decoration: underline;
            }
            .tr-backg:hover {
                background-color: #f9f9f9;
            }
            .tr-backg-blu:hover {
                background-color: #1f5daa;
            }
            .tr-backg-white:hover {
                background-color: #e5eaf5;
            }
            </style>
        
        
        
            <!--[if !mso]><!-->
            <link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet" type="text/css">
            <!--<![endif]-->
        
        </head>
        
        <body class="clean-body u_body" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #f9f9f9;color: #000000">
            <table style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto 40px;background-color: #f9f9f9;width:100%" cellpadding="0" cellspacing="0">
            <tbody>
                <tr class="tr-backg" style="vertical-align: top">
                <td style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">
                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
        
        
        
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #1f5daa;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">
                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
        
                                <table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg-blu">
                                    <td style="height: 70px;overflow-wrap:break-word;word-break:break-word;padding:20px 10px 10px;font-family:"Cabin",sans-serif;" align="left">
        
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                        <tr class="tr-backg-blu">
                                            <td style="padding-right: 0px;padding-left: 0px;" align="center">
                                            <div style="padding:20px 10px 10px;">
                                                <img align="center" border="0" src="https://cdn.templates.unlayer.com/assets/1597218650916-xxxxc.png" alt="Image" title="Image" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: inline-block !important;border: none;height: auto;float: none;width: 26%;max-width: 150.8px;"
                                                    width="150.8" />
                                            </div>
        
                                            </td>
                                        </tr>
                                        </table>
        
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
        
                                <table style="font-family:"Cabin",sans-serif; margin-bottom: 15px;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg-blu">
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:"Cabin",sans-serif;" align="left">
        
                                        <div style="height: 60px; color: #e5eaf5; line-height: 140%; text-align: center; word-wrap: break-word;">
                                        <p  name="title"  style="font-size: 28px; line-height: 140%;">'.$show_M["title"] .' </p>
                                        </div>
        
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
        
        
        
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">
                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                <table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg">
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px;font-family:"Cabin",sans-serif;">
        
                                        <div style="line-height: 160%; text-align: center; word-wrap: break-word;margin:33px 55px 30px;">
                                        <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 18px; line-height: 28.8px;">' .$show_M["content"].' </span></p>
                                        </div>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
        
                                <table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg">
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:"Cabin",sans-serif;" align="left">
        
                                        <div align="center">
                                        <a href="' .$show_M["btn_link"] .'" target="_blank" style="box-sizing: border-box;display: inline-block; text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #FFFFFF; background-color: #ff6600; border-radius: 4px;-webkit-border-radius: 4px; -moz-border-radius: 4px; width:auto; max-width:100%; overflow-wrap: break-word; word-break: break-word; word-wrap:break-word; mso-border-alt: none;">
                                            <span  style="display:block;padding:14px 44px 13px;line-height:120%;"><span style="font-size: 16px; line-height: 19.2px;"><strong><span contenteditable="true" style="line-height: 19.2px; font-size: 16px; "> '.$show_M["btn_name"].' </span></strong>
                                            </span>
                                            </span>
                                        </a>
                                        <!--[if mso]></center></v:roundrect></td></tr></table><![endif]-->
                                        </div>
        
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
        
                                <table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg">
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:33px 55px 30px;font-family:"Cabin",sans-serif;" align="left">
        
                                        <div style="line-height: 160%; text-align: center; word-wrap: break-word;margin:23px 55px 15px;">
                                        <p contentEditable="true" style="line-height: 160%; font-size: 14px;"><span style="font-size: 18px; line-height: 28.8px;"> '. $show_M["text_body"] .' </span></p>
                                        </div>
        
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
        
        
        
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #e5eaf5;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">
                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                <table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg-white">
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:41px 55px 18px;font-family:"Cabin",sans-serif;" align="left">
        
                                        <div style="color: #003399; line-height: 160%; text-align: center; word-wrap: break-word;padding:41px 55px 18px;">
                                        <!-- <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 20px; line-height: 32px;"><strong>Get in touch</strong></span></p> -->
                                        <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 16px; line-height: 25.6px; color: #000000;"> '. $show_M["phoneNumber"] .'</span></p>
                                        <p style="font-size: 14px; line-height: 160%;"><span style="font-size: 16px; line-height: 25.6px; color: #000000;"> '. $show_M["mail"] .'</span></p>
                                        </div>
        
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
        
                                <table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg-white">
                                    <td style=" overflow-wrap:break-word;word-break:break-word;padding:10px 10px 33px;font-family:"Cabin",sans-serif;" align="left">
        
                                        <div align="center" style="margin:10px 10px 23px;">
                                        <div style="display: table; max-width:244px;">
                                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 17px">
                                            <tbody>
                                                <tr class="tr-backg-white" style="vertical-align: top">
                                                <td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                    <a href="https://facebook.com/" title="Facebook" target="_blank">
                                                    <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/facebook.png" alt="Facebook" title="Facebook" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                    </a>
                                                </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 17px">
                                            <tbody>
                                                <tr class="tr-backg-white" style="vertical-align: top">
                                                <td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                    <a href="https://linkedin.com/" title="LinkedIn" target="_blank">
                                                    <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/linkedin.png" alt="LinkedIn" title="LinkedIn" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                    </a>
                                                </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 17px">
                                            <tbody>
                                                <tr class="tr-backg-white" style="vertical-align: top">
                                                <td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                    <a href="https://instagram.com/" title="Instagram" target="_blank">
                                                    <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/instagram.png" alt="Instagram" title="Instagram" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                    </a>
                                                </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 17px">
                                            <tbody>
                                                <tr class="tr-backg-white" style="vertical-align: top">
                                                <td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                    <a href="https://youtube.com/" title="YouTube" target="_blank">
                                                    <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/youtube.png" alt="YouTube" title="YouTube" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                    </a>
                                                </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                            <table align="left" border="0" cellspacing="0" cellpadding="0" width="32" height="32" style="border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;margin-right: 0px">
                                            <tbody>
                                                <tr class="tr-backg-white" style="vertical-align: top">
                                                <td align="left" valign="middle" style="word-break: break-word;border-collapse: collapse !important;vertical-align: top">
                                                    <a href="https://email.com/" title="Email" target="_blank">
                                                    <img src="https://cdn.tools.unlayer.com/social/icons/circle-black/email.png" alt="Email" title="Email" width="32" style="outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important">
                                                    </a>
                                                </td>
                                                </tr>
                                            </tbody>
                                            </table>
                                        </div>
                                        </div>
        
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
        
        
        
                    <div class="u-row-container" style="padding: 0px;background-color: transparent">
                    <div class="u-row" style="Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #1f5daa;">
                        <div style="border-collapse: collapse;display: table;width: 100%;background-color: transparent;">
                        <div class="u-col u-col-100" style="max-width: 320px;min-width: 600px;display: table-cell;vertical-align: top;">
                            <div style="width: 100% !important;">
                            <div style="padding: 0px;border-top: 0px solid transparent;border-left: 0px solid transparent;border-right: 0px solid transparent;border-bottom: 0px solid transparent;">
                                <table style="font-family:"Cabin",sans-serif;" role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                <tbody>
                                    <tr class="tr-backg-blu">
                                    <td style="overflow-wrap:break-word;word-break:break-word;padding:10px;font-family:"Cabin",sans-serif;" align="left">
        
                                        <div style=" color: #fafafa; line-height: 180%; text-align: center; word-wrap: break-word;margin:10px;">
                                        <p contenteditable="true" style="font-size: 14px; line-height: 180%;"><span style="font-size: 16px; line-height: 28.8px;">'. $show_M["text_footer"] .'</span></p>
                                        </div>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </td>
                </tr>
            </tbody>
            </table>
        </body>
        
        </html>
        ';

        $bodi = '<div style="height:200px; width: 40px; background-color: #333; display:flex; align-items: center; justify-content: center;" > box</div>';

        $name = "hoang vu 2";  // Name of your website or yours
        // $to = "avu7212@gmail.com, vunhtbsa180017@fpt.edu.vn";  // mail of reciever
        $subject = "Tutorial or any subject";
        // $body = $mail;
        $from = "avu7212@gmail.com";  // you mail
        $password = "uqycjuyemjguexzy";  // your mail password

        // Ignore from here
        require_once '../assets/plugin/mail/Exception.php';
        require_once '../assets/plugin/mail/SMTP.php';
        require_once '../assets/plugin/mail/PHPMailer.php';

        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 587;  // port
        $mail->SMTPSecure = "tls";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);

        $select_contact_in_groups = mysqli_query($con, "SELECT `contact_id` FROM `contact_in_group` WHERE `group_id`=".$_POST['groups']);
        while($contact_id = mysqli_fetch_array($select_contact_in_groups)) {
            $result = mysqli_query($con, "SELECT `email` FROM `contact` WHERE `id`=". $contact_id['contact_id']);
            $row = mysqli_fetch_assoc($result);
            $email[] = $row['email'] ;
            $mail->addAddress($row['email']); // enter email address whom you want to send
        }
        
        // $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            echo "Email is sent!";
            if(isset($_GET['id'])) {
                $update_status_mail = mysqli_query($con, "UPDATE `mail` SET `status`='Đã gửi',`time_send`='". date("d-m-y h:m")."' WHERE `id`=" .$_GET['id']);
            }
        } else {
            echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }


        // sendmail();  // call this function when you want to

        if (isset($_GET['action'])) {
            sendmail();
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
            <!-- navigation start -->
            <div class="content send-mail-content">
                <form action="?action=send&id=<?= $_GET['id'] ?>" method="post">
                <div class="navigation">
                    <div class="nav-overview">
                        <div class="nav-left">
                            <a href="mail_detail.php?id=<?= $_GET['id'] ?>"><i class="fa-solid fa-angle-left nav-left-icon"></i></a>
                            <h2 class="nav-group-detail__head">Emails</h2>
                        </div>
                        <div class="nav-right">
                            <button type="submit" class="add-landingPage">
                            <i class="fa-solid fa-paper-plane"></i> Gửi
                            </button>
                        </div>
                    </div>
                </div>
                <!-- navigation end -->
                <div class="send-mail-content-wrapper">
                    <h2 class="select-groups-title">Chọn nhóm liên hệ nhận email</h2>
                    <h5 class="select-groups-title-2">được gửi tối đa <span>1000</span> email</h5>
                    <select name="groups" class="send-form__select">
                        <?php while($row = mysqli_fetch_array($query_groups)) { ?>
                        <option value="<?= $row['group_id'] ?>"><?= $row['group_name'] ?></option>
                        <?php } ?>
                    </select>
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

