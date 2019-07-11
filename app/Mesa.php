<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function codeqrs(){
        return $this->hasMany('App\Codeqr');
    }

    public function booking(){
        return $this->belongsTo('App\Booking');
    }
}
            