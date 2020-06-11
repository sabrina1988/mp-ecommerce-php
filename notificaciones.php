<?php

require __DIR__ .  '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

if($_REQUEST["id"]){
    switch($_REQUEST["topic"]) {
        case "payment":
            $response = MercadoPago\Payment.find_by_id($_REQUEST["id"]);
            break;
        case "plan":
            $response = MercadoPago\Plan.find_by_id($_REQUEST["id"]);        
            break;
        case "subscription":
            $response = MercadoPago\Subscription.find_by_id($_REQUEST["id"]);        
            break;
        case "invoice":
            $response = MercadoPago\Invoice.find_by_id($_REQUEST["id"]);        
            break;        
    }

    $archivo = fopen('info.log','a'); 
    fwrite($archivo,json_encode($_POST,JSON_PRETTY_PRINT)); 
    fwrite($archivo,"\n");
    fwrite($archivo,json_encode($_REQUEST,JSON_PRETTY_PRINT)); 
    fwrite($archivo,"\n");
    //fwrite($archivo,$response); 
    //fwrite($archivo,"\n");
    fclose($archivo);  
    http_response_code(200);
    return;
}else{
   http_response_code(400);
    return;
} 
/*echo json_encode($_POST['type']); */

/* 
error_log("===========  POST  ============== ".print_r($_POST, true));
error_log("===========  REQUEST  ============== ".print_r($_REQUEST, true));
$entityBody = file_get_contents('php://input');
error_log("===========  TODO  ============== ".print_r($entityBody, true));
*/
 
 
 //var_dump($_POST);

?>

