<?php

// SDK de Mercado Pago
require '../vendor/autoload.php';

class MercadoPago
{
    private $unit;
    private $price;
    private $img;
    private $title;    
    private $access_token;

    public function __construct($unit,$price,$title,$img)
    {
        $this->unit         =  $unit;
        $this->price        =  $price;    
        $this->title        =  $title;
        $this->img          =  $img;
    }

    public function index()
    {                    
        $access_token   =   "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";
    
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken($access_token);

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->id          = 1234;
        $item->title       = $this->title;
        $item->description = "Dispositivo móvil de Tienda e-commerce";
        $item->picture_url = "https://sabrina1988-mp-ecommerce-php.herokuapp.com".$this->img;
        $item->quantity    = $this->unit;
        $item->unit_price  = $this->price;
                        
        $preference->items = array($item);

        //crea los datos del pagador
        $payer = new MercadoPago\Payer();
        $payer->name  = "Lalo Landa";        
        $payer->email = "test_user_63274575@testuser.com";        
        $payer->phone = array(
            "area_code" => "11",
            "number" => "22223333"
        );
        
        $payer->identification = array(
            "type" => "DNI",
            "number" => "471923173"
        );
        
        $payer->address = array(
            "street_name" => "False",
            "street_number" => 123,
            "zip_code" => "1111"
        );
        
        //URL de retorno
        $preference->back_urls = array(
            "success" => "https://sabrina1988-mp-ecommerce-php.herokuapp.com/success.php",
            "failure" => "https://sabrina1988-mp-ecommerce-php.herokuapp.com/failure.php",
            "pending" => "https://sabrina1988-mp-ecommerce-php.herokuapp.com/pending.php"
        );
        
        $preference->auto_return = "approved";

        $preference->notification_url = "https://sabrina1988-mp-ecommerce-php.herokuapp.com/notificaciones.php";
            
        //numero de orden
        $preference->external_reference = "sabrina.cuevas@webexport.com.ar";        

        //Metodos de pago
        $preference->payment_methods = array(
            "excluded_payment_methods" => array(
              array("id" => "amex")
            ),
            "excluded_payment_types" => array(
              array("id" => "atm")
            ),
            "installments" => 6
        );
        
        MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

        $preference->save();
        //echo "<pre>";
        //print_r($preference);
        //redireccionamos
        header("Location: ".$preference->init_point);

    }
}

    $mercadoPago = new MercadoPago($_POST['unit'],$_POST['price'],$_POST['title'],$_POST['img']);
    $mercadoPago->index();
