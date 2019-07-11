<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingSector extends Model
{
    protected $table = 'booking_sector';

    public function booking(){
        return $this->belongsTo('App\Booking');
    }

    public function sector(){
        return $this->belongsTo('App\Sector');
    }
}
