<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPointPay extends Model
{
    public function restaurantpointdetail(){
        return $this->hasOne('App\RestaurantPointDetail');
    }

    
}
