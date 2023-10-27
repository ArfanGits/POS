<?php
include("class/adminback.php");
$obj = new adminback();

if (isset($_POST['admin_btn'])) {
    $log_msg = $obj->admin_register($_POST);
}

session_start();
if (isset($_SESSION['admin_id'])) {
    header("location:index.php");
}
?>

<?php
include("includes/head.php")
?>

<body>

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form action="" method="post" class="md-float-material">
                            <div class="text-center">

                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Sign Up</h3>
                                        <h6 class="text-success text-left">
                                            <?php
                                            if (isset($log_msg)) {
                                                echo $log_msg;
                                            }
                                            ?>
                                        </h6>
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Your User Name" name="admin_name">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Your Email Address" name="admin_email">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Password" name="admin_pass">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input type="submit" name="admin_btn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Sign up">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a href="index.php" class="text-center f-w-900 waves-effect"> Already Registered? Signin now</a>
                                </div>
                                <hr />
                                <div class="col-md-12">
                                    <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                </div>
                            </div>
                    </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>




    <?php
    include("includes/script.php")
    ?>