<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPointBuy extends Model
{
    public function restaurantpointdetails(){
        return $this->hasMany('App\RestaurantPointDetail');
    }
}

