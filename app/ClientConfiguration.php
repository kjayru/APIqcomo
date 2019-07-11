<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientConfiguration extends Model
{
    public $timestamps = false;
    
    protected $table = 'client_configuration'; 

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function configuration(){
        return $this->belongsTo('App\Configuration');
    }
}
