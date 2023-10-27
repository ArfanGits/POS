<?php

class  adminback
{
    private $connection;
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "pos";

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->connection) {
            die("Databse connection error!!!");
        }
    }

    function admin_register($data)
    {
        $admin_name = $data['admin_name'];
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);


        $admin_check = "SELECT * FROM `admin` WHERE admin_name='$admin_name' or admin_email='$admin_email'";

        $mysqli_result = mysqli_query($this->connection, $admin_check);

        $row = mysqli_num_rows($mysqli_result);

        if ($row == 1) {
            $msg = "Admin email already exist";
            return $msg;
        } else {
            $query = "INSERT INTO `admin`( `admin_name`,  `admin_email`, `admin_pass`) VALUES ('$admin_name','$admin_email','$admin_pass')";

            if (mysqli_query($this->connection, $query)) {
                $msg = "Your registration is done";
                return $msg;
            }
        }
    }

    function admin_login($data)
    {
        $admin_email = $data["admin_email"];
        $admin_pass = md5($data['admin_pass']);

        $query = "SELECT * FROM `admin` WHERE admin_email = '$admin_email' AND admin_pass = '$admin_pass'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $admin_info = mysqli_fetch_assoc($result);
            if ($admin_info) {
                header("location:dashborad.php");
                session_start();
                $_SESSION['admin_id'] = $admin_info['admin_id'];
                $_SESSION['admin_email'] = $admin_info['admin_email'];
            } else {
                $log_msg = "Email or password wrong";
                return $log_msg;
            }
        }
    }

    function admin_logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_email']);
        header("location:index.php");
        session_destroy();
    }

    function admin_password_recover($recover_email)
    {
        $query = "SELECT * FROM `admin_info` WHERE `admin_email`='$recover_email'";
        if (mysqli_query($this->connection, $query)) {
            $row =  mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function update_admin_password($data)
    {
        $u_admin_id = $data['admin_update_id'];
        $u_admin_pass = md5($data['admin_update_password']);

        $query = "UPDATE `admin_info` SET `admin_pass`='$u_admin_pass' WHERE `admin_id`= $u_admin_id";

        if (mysqli_query($this->connection, $query)) {
            $update_mag = "You password updated successfull";
            return $update_mag;
        } else {
            return "Failed";
        }
    }

    function add_admin_user($data)
    {
        $user_email = $data['user_name'];
        $user_pass = md5($data['user_password']);
        $user_role = $data['user_role'];

        $query = "INSERT INTO `admin_info`( `admin_email`, `admin_pass`, `role`) VALUES ('$user_email','$user_pass',$user_role)";

        if (mysqli_query($this->connection, $query)) {
            $msg = "{$user_email} add as a user successfully";
            return $msg;
        }
    }

    function show_admin_user()
    {
        $query = "SELECT * FROM `admin_info`";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function show_admin_user_by_id($user_id)
    {
        $query = "SELECT * FROM `admin_info` WHERE `admin_id`=$user_id";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function update_admin($data)
    {
        $u_id = $data['user_id'];
        $u_email = $data['u-user-email'];
        $u_role = $data['u_user_role'];
        $query = "UPDATE `admin_info` SET `admin_email`='$u_email',`role`= $u_role WHERE `admin_id`= $u_id ";
        if (mysqli_query($this->connection, $query)) {
            $up_msg = "Udated successfully";
            return $up_msg;
        }
    }

    function delete_admin($admin_id)
    {
        $query = "DELETE FROM `admin_info` WHERE `admin_id`=$admin_id";
        if (mysqli_query($this->connection, $query)) {
            $del_msg = "User Deleted Successfully";
            return $del_msg;
        }
    }


    function user_register($data)
    {
        $username = $data['username'];
        $user_firstname = $data['user_firstname'];
        $user_lastname = $data['user_lastname'];
        $user_email = $data['user_email'];
        $user_password = md5($data['user_password']);
        $user_mobile = $data['user_mobile'];
        $user_address = $data['user_address'];


        $user_check = "SELECT * FROM `users` WHERE user_name='$username' or user_email='$user_email'";

        $mysqli_result = mysqli_query($this->connection, $user_check);

        $row = mysqli_num_rows($mysqli_result);

        if ($row == 1) {
            $msg = "Username or email already exist";
            return $msg;
        } else {
            $query = "INSERT INTO `users`( `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`,`user_address`) VALUES ('$username',' $user_firstname',' $user_lastname','$user_email','$user_password',$user_mobile,'$user_address')";

            if (mysqli_query($this->connection, $query)) {
                $msg = "Your registration done";
                return $msg;
            }
        }
    }


    function user_login($data)
    {
        $user_email = $_POST['user_email'];
        $user_password = md5($_POST['user_password']);

        $query = "SELECT * FROM `users` WHERE `user_email`='$user_email' AND `user_password`='$user_password'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $user_info = mysqli_fetch_array($result);
            if ($user_info) {
                header("location:userprofile.php");
                session_start();
                $_SESSION['user_id'] = $user_info['user_id'];
                $_SESSION['email'] = $user_info['user_email'];
                $_SESSION['mobile'] = $user_info['user_mobile'];
                $_SESSION['address'] = $user_info['user_address'];

                $_SESSION['username'] = $user_info['user_name'];
            } else {
                $logmsg = "Your username or password is incorrect";
                return $logmsg;
            }
        }
    }

    function display_links()
    {
        $query = "SELECT * FROM users";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }
    function user_logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        header("location:user_login.php");
        session_destroy();
    }


    function user_password_recover($recover_email)
    {
        $query = "SELECT * FROM `users` WHERE `user_email`='$recover_email'";
        if (mysqli_query($this->connection, $query)) {
            $row =  mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function update_user_password($data)
    {

        $update_id = $data['update_user_id'];
        $update_password = md5($data['update_user_password']);

        // echo $update_id.$update_password;

        $query = "UPDATE `users` SET `user_password`='$update_password' WHERE `user_id`=$update_id";


        if (mysqli_query($this->connection, $query)) {
            $update_mag = "You password updated successfully";
            return $update_mag;
        } else {
            return "Please enter a correct email";
        }
    }
}
