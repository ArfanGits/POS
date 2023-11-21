<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

// if (isset($_POST['user_login_btn'])) {
//     $logmsg = $obj->user_login($_POST);
// }

$userid = $_SESSION['user_id'];
$username = $_SESSION['username'];

if (empty($userid)) {
    header("location:user_login.php");
}

if (empty($_SESSION['cart'])) {
    header("location:exist_order.php");
}

if (isset($_POST['remove_product'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['pdt_name'] == $_POST['remove_pdt_name']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }
}

if (isset($_GET['logout'])) {
    if ($_GET['logout'] == "logout") {
        $obj->user_logout();
    }
}



if (isset($_GET)) {

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


                    <div class="row">
                        <div class="col-md-2">
                            <h4>Hello <?php
                                        if (isset($username)) {
                                            echo strtoupper($username);
                                        }
                                        ?></h4>
                            <a href="?logout=logout">Logout</a>
                        </div>

                        <div class="col-md-7">
                            <h2 class="text-center text-dark">Payment</h2>

                            <div class="shpcart-subtotal-block">

                                <form autocomplete="off" action="payment_set.php" method="POST">
                                    <p class="form-row">
                                        <label for="user_mobile">Mobile <span class="requite">*</span> </label>
                                        <input type="tel" id="fid-pass" name="user_mobile" class="form-control" required>
                                    </p>
                                    <p class="form-row">
                                        <label for="user_address">Address <span class="requite">*</span> </label>
                                        <textarea name="user_address" id="" cols="10" class="form-control"></textarea>
                                    </p>
                                    <label>Price</label>
                                    <input type="text" name="amount" value="<?php echo $_GET["price"]?> $" disabled required />


                            </div>

                            <input type="hidden" name="amount" value="<?php echo $_GET["price"]?>">
                            <input type="hidden" name="product_name" value="<?php echo $_GET["item_name"] ?>">

                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" 
                            data-key="pk_test_51OEZTXDb3ohKgQBMfS6fPSKFANyz8LmAilIbyoewx6m6rso2Lx3BvIfVSuDwufROHfcIcpMEFRV5RycRApJRF6B800XWFM08T5" 
                            data-amount=<?php echo str_replace(",", "", $_GET["price"]) * 100 ?> 
                            data-name="<?php echo $_GET["product_name"] ?>" 
                            data-image="admin/uploads/<?php echo $value['pdt_img'] ?>" 
                            data-currency="cad" 
                            data-locale="auto">
                            </script>

                            </form>

                        </div>

                    </div>


                </div>
            <?php
        }
            ?>


            </div>






        </div>
        </div>
        <br>


        <script>
            var item_price = document.getElementsByClassName("pdt_price");
            var item_quantity = document.getElementsByClassName("quantity");
            var item_total = document.getElementsByClassName("subtotal");

            function subtotal() {
                for (let i = 0; i < item_price.length; i++) {
                    item_total[i].innerText = item_price[i].value * item_quantity[i].value;



                }
            }

            var totalAll = document.getElementById("totalOfall");

            function totalOfAll() {
                let total = 0;
                for (let i = 0; i < item_total.length; i++) {
                    total += parseInt(item_total[i].innerText);
                }
                totalAll.innerText = total;


            }

            $(document).ready(function() {


                var cupon_code = $("#cupon");

                var discount = $("#discount");
                var total_price = parseInt($("#totalOfall").text());

                $("#afterdiscount").text(total_price);


                $(cupon_code).on("keyup keydown keypress blur", function() {


                    // alert (cupon_code.val());

                    $.ajax({
                        url: "json/coupon.php",
                        method: "POST",
                        data: {
                            action: 'load_discount',
                            cupon: cupon_code.val(),
                            price: total_price
                        },
                        success: function(data) {

                            var html = Math.round(data);
                            discount.text(html);
                        }
                    })


                    $("#afterdiscount").text(total_price - parseInt(discount.text()));



                });

                $("#quantity").change(function() {
                    var cupon_code = $("#cupon");

                    var discount = $("#discount");
                    var total_price = parseInt($("#totalOfall").text());

                    $("#afterdiscount").text(total_price);


                    $(cupon_code).on("keyup keydown keypress blur", function() {


                        // alert (cupon_code.val());

                        $.ajax({
                            url: "json/coupon.php",
                            method: "POST",
                            data: {
                                action: 'load_discount',
                                cupon: cupon_code.val(),
                                price: total_price
                            },
                            success: function(data) {

                                var html = Math.round(data);
                                discount.text(html);
                            }
                        })


                        $("#afterdiscount").text(total_price - parseInt(discount.text()));



                    });
                })





            })
        </script>
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