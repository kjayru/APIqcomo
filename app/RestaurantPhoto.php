<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPhoto extends Model
{
    public function restaurantdetail(){
        return $this->belongsTo('App\RestaurantDetail');
    }
}
