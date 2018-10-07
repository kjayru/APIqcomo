<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    public function costumerdetail()
    {
        return $this->belongsTo('App\CostumerDetail');
    }

    public function package()
    {
        return $this->belongsTo('App\Package');
    }
}
