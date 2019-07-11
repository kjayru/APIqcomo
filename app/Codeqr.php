<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codeqr extends Model
{
     public function mesa(){
         return $this->belongsTo('App\Mesa');
     }
}
