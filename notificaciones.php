<?php

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

switch($_POST["type"]) {
    case "payment":
        $response = MercadoPago\Payment.find_by_id($_POST["id"]);
        break;
    case "plan":
        $response = MercadoPago\Plan.find_by_id($_POST["id"]);        
        break;
    case "subscription":
        $response = MercadoPago\Subscription.find_by_id($_POST["id"]);        
        break;
    case "invoice":
        $response = MercadoPago\Invoice.find_by_id($_POST["id"]);        
        break;

    echo $response;
}

?>