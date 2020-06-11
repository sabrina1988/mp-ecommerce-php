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
        $access_token   =   "TEST-1675821332864922-042320-8a04024e7c09a88cd21d148f6e1f9288-321700299";
    
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken($access_token);

        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->id          = 1234;
        $item->title       = $this->title;
        $item->quantity    = $this->unit;
        $item->unit_price  = $this->price;
        $item->picture_url = $this->img;
        $item->description = "Dispositivo móvil de Tienda e-commerce";
        
        $preference->items = array($item);
        $preference->external_reference = "sabrina.cuevas@webexport.com.ar";
        $preference->save();
         
        //echo "<pre>";
        //print_r($preference);
        //redireccionamos
        header("Location: ".$preference->init_point);

    }
}

    $mercadoPago = new MercadoPago($_POST['unit'],$_POST['price'],$_POST['title'],$_POST['img']);
    $mercadoPago->index();
