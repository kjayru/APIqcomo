<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientVisita extends Model
{
    protected $table = 'client_visitas';

    public function client(){
        return $this->belongsTo('App\Client','client_id');
    }
}
