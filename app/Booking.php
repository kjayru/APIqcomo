<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function bookingDetails(){
        return $this->hasMany('App\BookingDetail');
    }
}
