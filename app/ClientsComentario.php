<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientsComentario extends Model
{
    //
    protected $table='clients_comentarios';
    protected $primaryKey='id';
    protected $fillable = ['client_id','descripcion','puntuacion','user_id'];
}
