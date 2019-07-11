<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  
    public function franchise()
    {
        return $this->belongsTo('App\Franchise','franchise_id');
    }

    public function mozos()
    {
        return $this->hasMany('App\Mozo');
    }

    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function ingredients(){
        return $this->hasMany('App\Ingredient');
    }

    public function salsas(){
        return $this->hasMany('App\Salsa');
    }

    public function clientphotos(){
        return $this->hasMany('App\ClientPhoto');
    }

    public function services(){
        return $this->belongsToMany('App\Service');
    }
 
    public function clientConfigurations()
    {
        return $this->belongsToMany('App\ClientConfiguration');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comment');
    }

    public function horarios()
    {
        return $this->belongsToMany('App\ClientHorario');
    }

    public function politicas()
    {
        return $this->belongsToMany('App\ClientPolitica');
    }

    public function clientServices()
    {
        return $this->belongsToMany('App\ClientService');
    }

    public function visitas()
    {
        return $this->hasOne('App\ClientVisita','client_id');
    }

    public function points()
    {
        return $this->hasOne('App\ClientPoint','client_id');
    }

    public function reservas()
    {
        return $this->hasMany('App\Booking');
    }
 
}

