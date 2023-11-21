<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Update</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
            font-family: Georgia;
        }

        form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f0f0f0;
            width: 350px;
            border-radius: 5px;
            padding: 20px 25px 30px 25px;
        }

        form h3 {
            margin-bottom: 15px;
            color: #30475e;
        }

        form input {
            width: 100%;
            margin-bottom: 20px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid #30475e;
            border-radius: 0;
            padding: 5px 0;
            font-weight: 550;
            font-size: 14px;
            outline: none;
        }

        form button {
            font-weight: 550;
            font-style: 15px;
            color: white;
            background-color: #30475e;
            padding: 4px 10px;
            border: none;
            outline: none;
        }

        form button:hover {
            box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>

    <?php

    require("connection.php");

    if (isset($_GET['admin_email']) && isset($_GET['reset_token'])) {
        date_default_timezone_set('America/Toronto');
        $date = date("Y-m-d");
        $query = "SELECT * from `admin` WHERE `admin_email`='$_GET[admin_email]' AND `reset_token`='$_GET[reset_token]' AND `reset_token_expire`='$date'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                echo "
            <form method='POST'>
                <h3>Create New Password</h3>
                <input type='password' placeholder='New Password' name='admin_pass'>
                <button type='submit' name='update_password'>UPDATE</button>
                <input type='hidden' name='admin_email' value='$_GET[admin_email]'>
            </form>
            ";
            } else {
                echo "
            <script>
                alert('Invalid or Expired Link');
                window.location.href='admin_password_recover.php';
            </script>
        ";
            }
        } else {
            echo "
                <script>
                    alert('Server Down! try again later');
                    window.location.href='admin_password_recover.php';
                </script>
            ";
        }
    }

    ?>

    <?php

    if (isset($_POST['update_password'])) {
        $pass = $_POST['admin_pass'];
        $update = "UPDATE `admin` SET `admin_pass`='$pass', `reset_token`=NULL, `reset_token_expire`=NULL WHERE `admin_email`='$_POST[admin_email]'";
        if (mysqli_query($conn, $update)) {
            echo "
                <script>
                    alert('Password Updated Successfully');
                    window.location.href='index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Server Down! try again later');
                    window.location.href='admin_password_update.php';
                </script>
            ";
        }
    }

    ?>


</body>

</html>