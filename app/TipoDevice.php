<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDevice extends Model
{
    protected $table = 'tipo_device';

    public function accesos_por_genero(){
        return $this->hasMany('App\access_device');
    }
}
