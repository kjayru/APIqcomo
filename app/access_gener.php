<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class access_gener extends Model
{
    protected $table = 'access_geners';

    public function genero(){
        return $this->belongsTo('App\Genero');
    }
}
