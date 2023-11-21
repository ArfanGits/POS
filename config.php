<?php
require "stripe-php-master/init.php";

$stripeDetails = array(
    "secretKey" => "sk_test_51OEZTXDb3ohKgQBMJ8NomMEePpY7PxW9I8bvA28DsBZMmLHzTndkmsN9Mg0fUmhCgTMEXLizSbzRCmkHvxVxtgzn002rgrBb38",
    "publishableKey" => "pk_test_51OEZTXDb3ohKgQBMfS6fPSKFANyz8LmAilIbyoewx6m6rso2Lx3BvIfVSuDwufROHfcIcpMEFRV5RycRApJRF6B800XWFM08T5"
);

\Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
