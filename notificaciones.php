<?php

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);

        $archivo = fopen('json_notificacion.txt','a');        
        fputs($archivo,$payment);
        fclose($archivo);
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        
        $archivo = fopen('json_notificacion.txt','a');
        fputs($archivo,$plan);
        fclose($archivo);
        break;
    case "subscription":
        $subscription = MercadoPago\Subscription.find_by_id($_POST["id"]);
        
        $archivo = fopen('json_notificacion.txt','a');
        fputs($archivo,$subscription);
        fclose($archivo);
        break;
    case "invoice":
        $invoice = MercadoPago\Invoice.find_by_id($_POST["id"]);
        
        $archivo = fopen('json_notificacion.txt','a');
        fputs($archivo,$invoice);
        fclose($archivo);
        break;
}

?>