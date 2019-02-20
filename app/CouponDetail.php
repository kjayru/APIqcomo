<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponDetail extends Model
{
    public function coupon(){
        return $this->belongsTo('App\Coupon');
    }

    public function couponcustomer(){
        return $this->belongsTo('App\CouponCustomer');
    }
}
