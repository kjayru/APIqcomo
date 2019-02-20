<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        

        return [
            'cliente_id' => (int)$user->id,
            'rol_id' => (int)$user->role_id,
            'nombre' => (string)$user->name,
            'apellido' => (string)$user->lastname,
            'correo' => (string)$user->email,
            'telefono' => (string)$user->telefono,
            'sexo' => (string)$user->sexo,
            'edad' => (string)$user->edad,
            'fotografia' => (string)$user->foto,
            'fechaCreacion' =>  (string)$user->created_at,
            'fechaActualizacion' => (string)$user->updated_at,
            
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
           'cliente_id' => 'id',
            'rol_id' => 'role_id',
            'nombre' => 'name',
            'apellido' => 'lastname',
            'correo' => 'email',
            'telefono' => 'telefono',
            'sexo' => 'sexo',
            'edad' => 'edad',
            'fotografia'=>'foto',
            'fechaCreacion' =>'created_at',
            'fechaActualizacion' => 'updated_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' =>  'cliente_id',
            'role_id' => 'rol_id',
            'name' => 'nombre',
            'lastname' => 'apellido',
            'email' => 'correo',
            'telefono' => 'telefono',
            'sexo' => 'sexo',
            'edad' => 'edad',
            'foto' => 'fotografia',
            'created_at' => 'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : error;
    }
}
