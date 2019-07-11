<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'Ciudades';

    public function pais(){
        return $this->belongsTo('App\Pais','Codigo');
    }
}
