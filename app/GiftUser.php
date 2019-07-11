<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftUser extends Model
{
    protected $table = 'gift_user';

    public function gift(){
        return $this->belongsTo('App\Gift');
    }
}
