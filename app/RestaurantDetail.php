<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantDetail extends Model
{
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    public function restaurantphotos()
    {
        return $this->hasMany('App\RestaurantPhoto');
    }

    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function customerdetail(){
        return $this->belongsTo('App\CustomerDetail');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function bookingDetails(){
        return $this->hasMany('App\BookingDetail');
    }

    public function restaurantpointdetail(){
        return $this->belongsTo('App\RestaurantPointDetail');
    }
}
