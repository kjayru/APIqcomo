<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public function order(){
        return $this->belongsTo('App\Order');
    }
    public function orderstate(){
        return $this->belongsTo('App\OrderState');
    }

    public function categoryorderdetails()
    {
        return $this->hasMany('App\CategoryOrderDetail');
    }
    public function ordertype(){
        return $this->belongsTo('App\OrderType');
    }
    public function paytype(){
        return $this->belongsTo('App\PayType');
    }
}
