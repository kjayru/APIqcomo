<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genero';

    public function accesos_por_genero(){
        return $this->hasMany('App\access_gener');
    }
}
