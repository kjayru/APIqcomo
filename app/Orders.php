<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function orderdetails(){
        return $this->hasMany('App\OrderDetail');
    }

    
}
