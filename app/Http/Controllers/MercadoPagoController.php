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

    $items = [];
    foreach ($request->items as $objeto) {  
      $item = new MercadoPago\Item();
      $item->title = $objeto['title'];
      $item->quantity = $objeto['quantity'];
      $item->currency_id = $objeto['currency_id'];
      $item->unit_price = $objeto['unit_price'];
      $items[] = $item;
    } 

    $payer = new MercadoPago\Payer();
    $payer->email = $request->payer['email'];

    //crear preferencia de pago
    $preference->items = $items;
    $preference->payer = $payer;
    $preference->save();
 
    $out = []; 
    $out['binary_mode'] = $preference->binary_mode;
    $out['processing_modes'] = $preference->processing_modes;
    $out['payment_methods'] = $preference->payment_methods;
    $out['collector_id'] = $preference->collector_id;
    $out['operation_type'] = $preference->operation_type;
    $out['client_id'] = $preference->client_id;
    $out['marketplace'] = $preference->marketplace;
    $out['marketplace_fee'] = $preference->marketplace_fee;
    $out['notification_url'] = $preference->notification_url;
    $out['external_reference'] = $preference->external_reference;
    $out['additional_info'] = $preference->additional_info;
    $out['expires'] = $preference->expires;
    $out['expiration_date_from'] = $preference->expiration_date_from;
    $out['expiration_date_to'] = $preference->expiration_date_to;
    $out['date_created'] = $preference->date_created;
    $out['id'] = $preference->id;
    $out['init_point'] = $preference->init_point;

    return ['preference'=>$preference,'rpta'=>'ok','request'=>$out]; 
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