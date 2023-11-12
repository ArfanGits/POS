<?php
include("class/adminback.php");
$obj = new adminback();


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
                        <form action="reset_pass.php" method="post" class="md-float-material">
                            <div class="text-center">

                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Password Recovery</h3>
                                        <h6 class="text-danger text-left">
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
                                    <input type="email" class="form-control" placeholder="Your Email Address" name="admin_email">
                                    <span class="md-line"></span>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input type="submit" name="send-reset-link" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" value="Recovery Password">
                                    </div>
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