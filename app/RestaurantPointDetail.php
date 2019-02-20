<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPointDetail extends Model
{
    public function restaurantdetail()
    {
        return $this->belongsTo('App\RestaurantDetail');
    }

    public function restaurantpointbuy(){
        return $this->belongsTo('App\RestaurantPointBuy');
    }

    public function restaurantpointpay(){
        return $this->belongsTo('App\RestaurantPointPay');
    }
}
