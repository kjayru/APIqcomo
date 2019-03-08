<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientConfiguration extends Model
{
    public $timestamps = false;
    
    protected $table = 'client_configuration';
}
