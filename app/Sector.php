<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{   

    public function bookingSector(){
        return $this->hasMany('App\BookingSector');
    }
}
