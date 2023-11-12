<?php

require("connection.php");


if (isset($_GET['user_email']) && isset($_GET['reset_token'])) {
    date_default_timezone_set('America/Toronto');
    $date = date("Y-m-d");
    $query = "SELECT * from `users` WHERE `user_email`='$_GET[user_email]' AND `reset_token`='$_GET[reset_token]' AND `reset_token_expire`=$date";
    $result = $mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            echo"
            ";
            
        } else {
            echo "
            <script>
                alert('Invalid or Expired Link');
                window.location.href='user_password_update.php';
            </script>
        ";
        }
    } else {
        echo "
                <script>
                    alert('Server Down! try again later');
                    window.location.href='user_password_update.php';
                </script>
            ";
    }
}

if (isset($_POST['update_password'])) {
    $pass = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
    $update = "UPDATE `users` SET `user_password`='$pass', `reset_token`=NULL, `reset_token_expire`=NULL WHERE `user_email`='$_POST[user_email]'";
    if (mysqli_query($conn, $update)) {
        echo "
                <script>
                    alert('Password Updated Successfully');
                    window.location.href='user_login.php';
                </script>
            ";
        // header('location:user_login.php');
    } else {
        echo "
                <script>
                    alert('Server Down! try again later');
                    window.location.href='user_password_update.php';
                </script>
            ";
    }
}

