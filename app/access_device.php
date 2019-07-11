<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class access_device extends Model
{
    protected $table = 'access_devices';

    public function tipoDevice(){
        return $this->belongsTo('App\TipoDevice');
    }
}
