<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{
   public $timestamps = false;

   protected $table = 'client_service';
}
