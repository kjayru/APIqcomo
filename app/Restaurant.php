<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function personfranchises(){
        return $this->belongsToMany('App\PersonFranchise');
    }

    public function restaurantdetails(){
        return $this->hasMany('App\RestaurantDetail');
    }
}
