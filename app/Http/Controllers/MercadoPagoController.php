<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use MercadoPago;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//MercadoPago\SDK::setAccessToken("APP_USR-7932408421765291-072421-f3796d4fe1a8d2bca8c0b54046cf6a95-455030074");      // On Production
MercadoPago\SDK::configure(['ACCESS_TOKEN' => 'TEST-7932408421765291-072421-3be0e072fc2007beab196402bf265b87-455030074']);

class MercadoPagoController extends Controller
{
  public function createPayment()
  {
    $payment_data = array(
                      "transaction_amount" => 'Monto a pagar',
                      "description" => 'Descripcion para el pago',
                      "installments" => 'Cantidad de entregas, debe ser entero',
                      "payment_method_id" => 'Metodo elegido de pago',
                      "payer" => array(
                                    "email" => 'Correo del cliente'
                       ),
                       "statement_descriptor" => "Nombre de quien recibe el pago"
                    );
    $payment = MP::post("/v1/payments",$payment_data);
    return dd($payment);
  }

  public function createPaymentPreferences(Request $request)
  { 
    $preference = new MercadoPago\Preference();

    $item = new MercadoPago\Item();
    $item->title = "Mediocre Steel Shirt";
    $item->quantity = 5;
    $item->currency_id = "PEN";
    $item->unit_price = 76.04;
  
    $payer = new MercadoPago\Payer();
    $payer->email = "test_user_19653727@testuser.com";
  
    $preference->items = array($item);
    $preference->payer = $payer;
    $preference->save();

/*
    $preference_data = [
  		"items" => [ $items
  		],
      "payer" => [
        "email" => $request->payer['email']
      ]
  	];
    $preference = MP::post("/checkout/preferences",$preference_data); 
  */
    return ['preference'=>$preference,'rpta'=>'ok']; 
  }

  public function onPaymentSuccess()
  {

  }

  public function onPaymentCancelled()
  {
    
  }

  public function onPaymentRejected()
  {
    
  }

  public function notification_url()
  {
    
  }

}


/*

class MercadoPagoController extends Controller
{
  public function createPreferencePayment()
  {
    $preference_data = [
  		"items" => [
  			[
  				"id" => 'Id del articulo',
          "title" => 'Titulo del articulo',
          "description" => 'Descripcion del articulo',
          "picture_url" => 'Imagen del articulo',
          "quantity" => 'Cantidad de articulos',
          "currency_id" => 'Id de moneda',
          "unit_price" => 'precio por unidad'
  			]
  		],
      "payer" => [
        "email" => 'correo del cliente'
      ]
  	];
    $preference = MP::post("/checkout/preferences",$preference_data);
    return dd($preference);
  }
}

*/