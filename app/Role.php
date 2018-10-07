<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const PERSONAL = 2;
  

    public function users(){
        return $this->hasMany('App/User');
    }
}
