<?php

session_start();
include("class/adminback.php");
$obj = new adminback();

$admin_id = $_SESSION['admin_id'];
$admin_email = $_SESSION['admin_email'];


if (empty($admin_id)) {
    header("location:index.php");
}

if (isset($_GET['adminLogout'])) {
    if ($_GET['adminLogout'] == "logout") {
        $obj->admin_logout();
    }
}
?>

<?php
include("includes/head.php")
?>

<body>

    <body>
        <div class="fixed-button">

        </div>
        <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="loader-track">
                <div class="loader-bar"></div>
            </div>
        </div>
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
            <div class="pcoded-overlay-box"></div>
            <div class="pcoded-container navbar-wrapper">

                <?php include_once("includes/headernav.php") ?>


                <div class="pcoded-main-container">
                    <div class="pcoded-wrapper">

                        <?php include_once("includes/sidenav.php") ?>

                        <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                     
        
                                <?php 
                                    if($views){
                                        if($views=="dashboard"){
                                            include ('views/dashborad_view.php');
                                        }elseif($views=="add-cata"){
                                            include ("views/add_cata_view.php");
                                        }elseif($views=="manage-cata"){
                                            include ("views/manage_cata_view.php");
                                        }elseif($views=="add-product"){
                                            include ("views/add_product_view.php");
                                        }elseif($views=="manage-product"){
                                            include ("views/manage_product_view.php");
                                        }elseif($views=="add-user"){
                                            include ("views/add_user_view.php");
                                        }elseif($views=="manage-user"){
                                            include ("views/manage_user_view.php");
                                        }elseif($views=="edit_cata"){
                                            include ("views/edit_cata_view.php");
                                        }elseif($views=="edit_product"){
                                            include ("views/edit_product_view.php");
                                        }elseif($views=="manage_order"){
                                            include ("views/manage_order_view.php");
                                        }

                                    }
                                ?>


                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    </div>
                </div>
            </div>



            <?php
            include("includes/script.php")
            ?>