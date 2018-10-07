<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function categoryorderdetails(){
        return $this->hasMany('App\CategoryOrderDetail');
    }
}
