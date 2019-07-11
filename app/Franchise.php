<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $table = "franchisees";
   
    public function Clients(){
        return $this->hasMany('App\Client');
    }

    public function User(){
     return $this->belongsTo('App\User');
    }

}
