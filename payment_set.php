<?php
include("./config.php");

$token = $_POST["stripeToken"];
$token_card_type = $_POST["stripeTokenType"];
$phone           = $_POST["phone"];
$email           = $_POST["stripeEmail"];
$address         = $_POST["address"];
$amount          = $_POST["amount"];
$charge = \Stripe\Charge::create([
    "amount" => str_replace(",", "", $amount) * 100,
    "currency" => 'cad',
    "source" => $token,
]);

// if ($charge) {
//     header("Location:userprofile.php");
// }

if ($charge) {
    header("Location:success.php?amount=$amount");
}
