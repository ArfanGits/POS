
<?php

require("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($user_email, $reset_token)
{
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'tcase018@gmail.com';                     //SMTP username
        $mail->Password   = 'oyxt unlf otwl vtmu';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('tcase018@gmail.com', 'TEAM-18');
        $mail->addAddress($user_email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                 //Set email format to HTML
        $mail->Subject = 'Password reset link from TEAM-18';
        $mail->Body    = "We got a request from you to reset your password! <br>
            Click the link below: <br>
            <a href='http://localhost/POS/user_password_update.php?user_email=$user_email&reset_token=$reset_token'>
            Reset Your Password
            </a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['send-reset-link'])) {
    $query = "SELECT * FROM `users` WHERE `user_email` ='$_POST[user_email]'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('America/Toronto');
            $date = date("Y-m-d");
            $query = "UPDATE `users` SET `reset_token` ='$reset_token', `reset_token_expire`='$date' WHERE `user_email`='$_POST[user_email]'";
            if (mysqli_query($conn, $query) && sendMail($_POST['user_email'], $reset_token)) {
                echo "
                    <script>
                    alert('Password Reset Link Sent to mail');
                    window.location.href='user_password_update.php';
                    </script>
                    ";
            } else {
                echo "
                    <script>
                    alert('Server down! try again later');
                    </script>
             ";
                header('location:user_password_recover.php');
            }
        }
    } else {
        echo "
                <script>
                alert('Email not found');
                </script>
            ";
        header('location:user_password_recover.php');
    }
}
