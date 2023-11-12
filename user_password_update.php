<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();


//$rec_msg = "Password Reset Link Sent to mail";

?>


<?php
include_once("includes/head.php");
?>

<body class="biolife-body">
    <!-- Preloader -->

    <?php
    include_once("includes/preloader.php");
    ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">

        <?php
        include_once("includes/header_top.php");
        ?>

        <?php
        include_once("includes/header_middle.php");
        ?>

        <?php
        include_once("includes/header_bottom.php");
        ?>

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">


            <div class="container">
                <h2 class="text-center">Update Password</h2>

                <h4 class="text-success"> <?php
                                            if (isset($rec_msg)) {
                                                echo $rec_msg;
                                            }
                                            ?></h4>
                <div class="row">





                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="update_pass.php" name="frm-login" method="POST">

                                <p class="form-row">
                                    <label for="user_password">New Password:</label>
                                    <input type="password" name="user_password" class="txt-input">
                                </p>
                                <input type="hidden" name="user_email" value='$_GET[user_email]'>

                                <p class="wrap-btn">
                                    <input type="submit" value="Update Password" name="update_password" class="btn btn-success">

                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">New Customer?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="user_register.php" class="btn btn-bold">Create an account</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>






        </div>
    </div>

    <!-- FOOTER -->

    <?php
    include_once("includes/footer.php");
    ?>

    <!--Footer For Mobile-->
    <?php
    include_once("includes/mobile_footer.php");
    ?>

    <?php
    include_once("includes/mobile_global.php")
    ?>


    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php
    include_once("includes/script.php")
    ?>
</body>

</html>