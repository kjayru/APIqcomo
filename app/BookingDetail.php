<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    public function restaurantdetail(){
        return $this->belongsTo('App\RestaurantDetail');
    }

    public function customerdetail(){
        return $this->belongsTo('App\CustomerDetail');
    }

    public function booking(){
        return $this->belongsTo('App\Booking');
    }
}
