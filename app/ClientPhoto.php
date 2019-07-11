<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPhoto extends Model
{
    protected $table = 'clients_photo';

    public function client(){
        return $this->belongsTo('App\Client');
    }
}
