<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
     public function orderdetails(){
         return $this->hasMany('App\OrderDetail');
     }
}
