<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPoint extends Model
{
    public function companypointdetails()
    {
        return $this->hasMany('App\CompanyPointDetail');
    }

    
}
