<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPolitica extends Model
{
    //
    protected $table = 'client_politicas';

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
