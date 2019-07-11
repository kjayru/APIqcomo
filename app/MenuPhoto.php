<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuPhoto extends Model
{
    protected $table='menus_photo';

    public function menu(){
        return $this->belongsTo('App\Menu');
    }

}
