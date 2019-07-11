<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{
   public $timestamps = false;

   protected $table = 'client_service';

   public function client(){
      return $this->belongsTo('App\Client');
  }

  public function service(){
      return $this->belongsTo('App\Service');
  }
}
