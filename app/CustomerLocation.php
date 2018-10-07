<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerLocation extends Model
{
    public function messagepushdetails()
    {
        return $this->hasMany('App\MessagePushDetail');
    }
}
