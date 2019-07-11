<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientPhoto extends Model
{
    protected $table="ingredient_photo";

    public function ingredient(){
        return $this->belonsTo('App\Ingredient');
    }
}
