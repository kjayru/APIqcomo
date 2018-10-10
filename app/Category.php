<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    protected $fillable = [
		'name','descripcion'
	];
    public function categoryDetails(){
        return $this->hasMany('App\CategoryDetail');
    }

    public function categoryorderdetails(){
        return $this->hasMany('App\CategoryOrderDetail');
    }

    public function restaurantdetail(){
        return $this->belongsTo('App\RestaurantDetail');
    }

    public function childs(){
    	return $this->hasMany('App\Category','parent_id');
    }
}
