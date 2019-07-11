<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenuLike extends Model
{
    protected $table = 'userclient_points'; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
