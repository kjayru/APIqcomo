<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserClientAdmin extends Model
{
    protected $table = 'user_client_admin';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
