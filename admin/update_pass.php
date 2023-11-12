<?php

require("connection.php");


if (isset($_GET['admin_email']) && isset($_GET['reset_token'])) {
    date_default_timezone_set('America/Toronto');
    $date = date("Y-m-d");
    $query = "SELECT * from `admin` WHERE `admin_email`='$_GET[admin_email]' AND `reset_token`='$_GET[reset_token]' AND `reset_token_expire`=$date";
    $result = $mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            echo "
            ";
        } else {
            echo "
            <script>
                alert('Invalid or Expired Link');
                window.location.href='admin_password_update.php';
            </script>
        ";
        }
    } else {
        echo "
                <script>
                    alert('Server Down! try again later');
                    window.location.href='admin_password_update.php';
                </script>
            ";
    }
}

if (isset($_POST['update_password'])) {
    $pass = password_hash($_POST['admin_pass'], PASSWORD_BCRYPT);
    $update = "UPDATE `admin` SET `admin_pass`='$pass', `reset_token`=NULL, `reset_token_expire`=NULL WHERE `admin_email`='$_POST[admin_email]'";
    if (mysqli_query($conn, $update)) {
        echo "
                <script>
                    alert('Password Updated Successfully');
                    window.location.href='index.php';
                </script>
            ";
        // header('location:admin_login.php');
    } else {
        echo "
                <script>
                    alert('Server Down! try again later');
                    window.location.href='admin_password_update.php';
                </script>
            ";
    }
}
