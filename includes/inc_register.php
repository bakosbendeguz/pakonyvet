<?php
if (isset($_POST['f_register'])) {
    require_once 'inc_db.php';
    require_once('../phpmailer/PHPMailerAutoload.php');
    require_once('../phpmailer/class.phpmailer.php');
    $fullname = mysqli_real_escape_string($mysqli, $_POST['f_fullname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['f_email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['f_phone']);
    $username = mysqli_real_escape_string($mysqli, $_POST['f_username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['f_password']);
    $passwordconf = mysqli_real_escape_string($mysqli, $_POST['f_passwordconf']);

    if (
        empty($fullname) ||
        empty($email) ||
        empty($phone) ||
        empty($username) ||
        empty($password) ||
        empty($passwordconf)
    ) {
        header("Location: ../register.php?error=EmptyFields");
        exit;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../register.php?error=WrongEmailFormat");
        exit;
    } else if ($password !== $passwordconf) {
        header("Location: ../register.php?error=PasswordMismatch");
        exit;
    } else if ($select = mysqli_query($mysqli, "SELECT * FROM `users` WHERE usersEmail = '" . $_POST['f_email'] . "'")) {
        if (mysqli_num_rows($select)) {
            header("Location: ../register.php?error=EmailAddressAlreadyRegistered");
            exit;
        }
        if ($select = mysqli_query($mysqli, "SELECT * FROM `users` WHERE usersName = '" . $_POST['f_username'] . "'")) {
            if (mysqli_num_rows($select)) {
                header("Location: ../register.php?error=UsernameAlreadyRegistered");
                exit;
            }
            else {
                $password = md5($password);
                $query = "INSERT INTO `users`(`usersFullName`, `usersName`, `usersPassword`, `usersPhone`, `usersEmail`) VALUES ('$fullname', '$username', '$password', '$phone', '$email');";
                if (mysqli_query($mysqli, $query)) {
                    header("Location: ../register.php?info=RegistrationSuccess");
                    echo "Végbement a regisztráció";
                    $emailformat = '<!DOCTYPE html>
        <html>
        
        <head>
            <title></title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <style type="text/css">
                @media screen {
                    @font-face {
                        font-family: "Lato";
                        font-style: normal;
                        font-weight: 400;
                        src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
                    }
        
                    @font-face {
                        font-family: "Lato";
                        font-style: normal;
                        font-weight: 700;
                        src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
                    }
        
                    @font-face {
                        font-family: "Lato";
                        font-style: italic;
                        font-weight: 400;
                        src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
                    }
        
                    @font-face {
                        font-family: "Lato";
                        font-style: italic;
                        font-weight: 700;
                        src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
                    }
                }
        
                /* CLIENT-SPECIFIC STYLES */
                body,
                table,
                td,
                a {
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }
        
                table,
                td {
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                }
        
                img {
                    -ms-interpolation-mode: bicubic;
                }
        
                /* RESET STYLES */
                img {
                    border: 0;
                    height: auto;
                    line-height: 100%;
                    outline: none;
                    text-decoration: none;
                }
        
                table {
                    border-collapse: collapse !important;
                }
        
                body {
                    height: 100% !important;
                    margin: 0 !important;
                    padding: 0 !important;
                    width: 100% !important;
                }
        
                /* iOS BLUE LINKS */
                a[x-apple-data-detectors] {
                    color: inherit !important;
                    text-decoration: none !important;
                    font-size: inherit !important;
                    font-family: inherit !important;
                    font-weight: inherit !important;
                    line-height: inherit !important;
                }
        
                /* MOBILE STYLES */
                @media screen and (max-width:600px) {
                    h1 {
                        font-size: 32px !important;
                        line-height: 32px !important;
                    }
                }
        
                /* ANDROID CENTER FIX */
                div[style*="margin: 16px 0;"] {
                    margin: 0 !important;
                }
            </style>
        </head>
        
        <body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
            <!-- HIDDEN PREHEADER TEXT -->
            <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <!-- LOGO -->
                <tr>
                    <td bgcolor="#FFA73B" align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#FFA73B" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                                    <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Sikeres regisztráció!</h1> <img src="https://scontent-vie1-1.xx.fbcdn.net/v/t1.18169-9/10915347_872320566124369_6695235196189443434_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=_WqdA0MCOQwAX8LTTCn&_nc_ht=scontent-vie1-1.xx&oh=00_AT8QPcfe-6OdCgY1Hbl1SzEy942f5nqPUai-KIZL6bkBwQ&oe=6221B40A" width="125" height="120" style="display: block; border: 0px;" />
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 40px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <p style="margin: 0;">Sikeresen regisztráltál a Felsőpakonyi Állatorvos Rendelő weboldalán. Az alábbi linken keresztül tudsz bejelentkezni.</p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#ffffff" align="left">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td align="center" style="border-radius: 3px;" bgcolor="#FFA73B"><a href="http://localhost/pakonyvet/login.php" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #FFA73B; display: inline-block;">Bejelentkezés</a></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr> <!-- COPY -->
                            <tr>
                                <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <p style="margin: 0;">Köszönjük regisztrációdat!</p>
                                </td>
                            </tr> <!-- COPY -->
                            <tr>
                                <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <p style="margin: 0;">Felsőpakonyi Állatorvosi Rendelő</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                            <tr>
                                <td bgcolor="#FFECD1" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                                    <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Nem te regisztráltál?</h2>
                                    <p style="margin: 0;" style="color: #FFA73B;">Ezesetben nyugodtan hagyd figyelmen kívül ezt az email-t</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        
        </html>';
        
        
        
                    $address = $_POST['f_email'];  // címzett
                    //$subject = $targy;  // üzenet tárgya
        
        
        
        
                    $mail = new PHPMailer(); // create a new object
                    $mail->IsSMTP(); // enable SMTP
                    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                    $mail->SMTPAuth = true; // authentication enabled
                    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
                    $mail->CharSet = "UTF-8";
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 587; // or 465
                    $mail->IsHTML(true);
                    $mail->Username = "";
                    $mail->Password = "";
                    $mail->SetFrom("");
                    $mail->Subject = "Sikeres Regisztráció!"; //Tárgy
                    $mail->Body = $emailformat; // Kiküldeni való email
                    $mail->AddAddress($address); // címzett
                    //$mail->AddAttachment("test.pdf");   //csatolmány elérési útvonala (ha nem kell törlöd)
        
                    if (!$mail->Send()) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        echo "Message has been sent";
                    }
        
                    //header("Location: index.php?registration=success");
        
        
                    /* 
        Links that fix the problem (you must be logged into google account): Mind a hármat nézd meg, a másodikat engedélyezd, a harmadikat folytasd.
        
        https://security.google.com/settings/security/activity?hl=en&pli=1 //Activity access
        
        https://www.google.com/settings/u/1/security/lesssecureapps //Kevésbé biztonságos dolgok
        
        https://accounts.google.com/b/0/DisplayUnlockCaptcha // Captcha reset
        
        
        */
                    exit;
                }
        }   
    }  else {
            header("Location: ../register.php?error=QueryUnsuccesful");
            exit;
        }
    }
}