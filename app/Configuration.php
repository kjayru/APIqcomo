<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public function clients()
    {
        return $this->hasMany('App\ClientConfiguration');
    }
}
