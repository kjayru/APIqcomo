<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingState extends Model
{
    protected $table = 'booking_state';

    public function reservas()
    {
        return $this->hasMany('App\Booking');
    }

}
