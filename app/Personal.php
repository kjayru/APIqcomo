<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public function personaldetails()
    {
        return $this->hasMany('App\PersonalDetail');
    }
}
