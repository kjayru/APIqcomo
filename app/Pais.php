<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'Paises';

    public function ciudades(){
        return $this->hasMany('App\Ciudad','Paises_Codigo','Codigo');
    }
}
