<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function personaldetails()
    {
        return $this->hasMany('App\PersonalDetail');
    }
}
