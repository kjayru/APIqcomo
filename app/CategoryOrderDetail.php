<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryOrderDetail extends Model
{
    public function payment(){
        return $this->belongsTo('App\Payment');
    }

    public function orderdetail()
    {
        return $this->belongsTo('App\OrderDetail');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
