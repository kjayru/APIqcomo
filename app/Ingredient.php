<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function ingredientphotos(){
        return $this->hasMany('App\IngredientPhoto');
    }

    public function client(){
        return $this->belonsTo('App\Client');
    }
}
