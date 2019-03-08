<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    public function clients(){
        return $this->belongsTo('App\Client');
    }
}
