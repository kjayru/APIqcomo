<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function coupondetails(){
        return $this->hasMany('App\CouponDetails');
    }
}
