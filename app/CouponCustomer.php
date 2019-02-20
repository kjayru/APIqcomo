<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponCustomer extends Model
{
     public function coupondetails(){
         return $this->hasMany('App\CouponDetail');
     }

}
