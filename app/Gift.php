<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    public function giftToUser(){
        return $this->hasMany('App\GiftUser');
    }
}
