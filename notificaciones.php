<?php

/* require './vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

if($_POST["id"]){
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
    }
   // http_response_code(200);
    //return;
}//else{
 //   http_response_code(400);
  //  return;
//}
echo json_encode($_POST['type']); */

/* 
error_log("===========  POST  ============== ".print_r($_POST, true));
error_log("===========  REQUEST  ============== ".print_r($_REQUEST, true));
$entityBody = file_get_contents('php://input');
error_log("===========  TODO  ============== ".print_r($entityBody, true));

 $archivo = fopen('info.log','a'); 
 fwrite($archivo,$_REQUEST); 
 fclose($archivo);  */

 var_dump($_POST);

?>

