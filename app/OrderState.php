<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    public function orderdetails(){
        return $this->hasMany('App\OrderDetail');
    }
}
