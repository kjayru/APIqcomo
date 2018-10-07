<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessagePush extends Model
{
    public function messagepushdetail()
    {
        return $this->hasMany('App\MessagePushDetail');
    }
}
