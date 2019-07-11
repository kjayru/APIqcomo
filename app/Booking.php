<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    public function bookingDetails(){
        return $this->hasMany('App\BookingDetail');
    }

    public function user(){
        return $this->belongsTo('App\User'); 
    }

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function estado(){
        return $this->belongsTo('App\BookingState', 'bookingstate_id');
    }

    public function mesa(){
        return $this->hasMany('App\Mesa');
    }

    public function bookingSector(){
        return $this->hasMany('App\BookingSector');
    }
}
