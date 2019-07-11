<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMenuLike extends Model
{
    protected $table = 'user_menu_likes'; 

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
