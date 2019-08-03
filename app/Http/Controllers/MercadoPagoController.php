<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use MercadoPago;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//MercadoPago\SDK::setAccessToken("APP_USR-7932408421765291-072421-f3796d4fe1a8d2bca8c0b54046cf6a95-455030074");      // On Production
MercadoPago\SDK::setAccessToken("TEST-7932408421765291-072421-3be0e072fc2007beab196402bf265b87-455030074");

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
    $items = [];
    foreach ($request->items as $objeto) { 
      $item = [];
      $item['title'] = $objeto['title'];
      $item['description'] = "";
      $item['picture_url'] = "";
      $item['quantity'] = $objeto['quantity'];
      $item['currency_id'] = $objeto['currency_id'];
      $item['unit_price'] = $objeto['unit_price'];
      $items[] = $item;
    }

    
    //crear preferencia de pago
    $preference = new MercadoPago\Preference();


    $payer = new MercadoPago\Payer();
    $payer->email = $request->payer['email'];

    $preference->items = $items;
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
    return ['preference'=>$preference,'rpta'=>'ok','items'=>$items]; 
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