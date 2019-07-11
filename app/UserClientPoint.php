<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserClientPoint extends Model
{
    protected $table = 'userclient_points'; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
