<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientHorario extends Model
{
    //
    protected $table = 'client_horarios';

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
