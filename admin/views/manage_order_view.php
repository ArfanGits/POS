<h2>Manage order</h2>

<?php

$catagories = $obj->display_catagory();
$all_order_info = $obj->all_order_info();

$order_infos = array();
while ($all_order = mysqli_fetch_assoc($all_order_info)) {
    $order_infos[] = $all_order;
}

// if(isset($_POST['update_status_btn'])){

//    $status_msg =  $obj->updat_order_status($_POST);
// }

if (isset($status_msg)) {
    echo  $status_msg;
}


?>
<div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="product-name">Order Id</th>
                <th class="product-price">Products</th>
                <th class="product-quantity">Total Item</th>
                <th class="product-subtotal">Amount</th>
                <th class="product-subtotal">Customer Name</th>
                <th class="product-subtotal">Customer Mobile</th>
                <th class="product-subtotal">Shipping Address</th>
                <th class="product-subtotal">Order Status</th>
                <th class="product-subtotal">Placing Time</th>
            </tr>
        </thead>

        <tbody>

            <?php
            foreach ($order_infos as $order_info) {
            ?>
                <tr>
                    <td class="product-name"><?php echo $order_info['order_id'] ?></td>
                    <td class="product-price"><?php echo $order_info['product_name'] ?></td>
                    <td class="product-quantity"><?php echo $order_info['product_item'] ?></td>
                    <td class="product-subtotal"><?php echo $order_info['amount'] ?> CAD$</td>
                    <td class="product-subtotal"><?php echo $order_info['customer_name'] ?></td>
                    <td class="product-subtotal"><?php echo $order_info['shipping_mobile'] ?></td>
                    <td class="product-subtotal"><?php echo $order_info['shipping_address'] ?></td>
                    <td class="product-subtotal">
                        <?php
                        echo "<p class='btn btn-success btn-sm'> Delivered </p>";
                        ?>
                    </td>

                    <td class="product-subtotal"><?php echo $order_info['order_time'] ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>