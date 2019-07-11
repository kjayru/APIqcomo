<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FranchiseedCategorie extends Model
{
    public function categories(){
        return $this->hasMany('App\Category');
    }
}
