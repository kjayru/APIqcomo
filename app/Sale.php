<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function mozo(){
        return $this->belongsTo('App\Mozo');
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function paymentMethod(){
        return $this->belongsTo('App\PaymentMethod');
    }

    public function mesa(){
        return $this->belongsTo('App\Mesa');
    }

    public function usuario(){
        return $this->belongsTo('App\User');
    }

    public function estadoVenta(){
        return $this->belongsTo('App\SaleState','salestate_id');
    }

    public function tipoventa(){
        return $this->belongsTo('App\TypeSale');
    }
}
