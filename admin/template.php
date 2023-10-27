<?php

include("class/adminback.php");
$obj = new adminback();

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


                       
                    </div>
                </div>
            </div>



            <?php
            include("includes/script.php")
            ?>