<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerState extends Model
{
    public function customerdetail()
    {
        return $this->belongsTo('App\CustomerDetail');
    }
}
