<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPointDetail extends Model
{
    public function companypoint(){
        return $this->belongsTo('CompanyPoint');
    }
}
