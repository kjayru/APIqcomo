<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Franchise;

class FranchiseTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Franchise $franchise)
    {

       
        return [
            'franquicia_id' => (int)$franchise->id,
            'nombre' => (string)$franchise->names,
            'direccion' => (string)$franchise->address,
            'ciudad' => (string)$franchise->city,
            'provincia' => (string)$franchise->province,
            'celular' => (string)$franchise->cellphone,
            'correo' => (string)$franchise->mail,
            'avatar' => (string)$franchise->avatar,
            'estado' => (string)$franchise->status,

            'package_id' => (int)$franchise->package_id,
            'user_id' => (int)$franchise->user_id,
            'classification_id' => (int)$franchise->classification_id,

            'fechaCreacion' =>  (string)$franchise->created_at,
            'fechaActualizacion' => (string)$franchise->updated_at,
        ];
    }


    public static function originalAttribute($index)
    {
        $attributes = [
            'franquicia_id' => 'id',
            'nombre' => 'names',
            'direccion' => 'address',
            'ciudad' => 'city',
            'provincia' => 'province',
            'celular' => 'cellphone',
            'correo' => 'mail',
            'avatar' => 'avatar',
            'estado' => 'status',

            'package_id' => 'package_id',
            'user_id' => 'user_id',
            'classification_id' => 'classification_id',

            'fechaCreacion' =>  'created_at',
            'fechaActualizacion' => 'updated_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'franquicia_id',
            'names' => 'nombre',
            'address' => 'direccion',
            'city' => 'ciudad',
            'province' => 'provincia',
            'cellphone' => 'celular',
            'mail' => 'correo',
            'avatar' => 'avatar',
            'status' => 'estado',

            'package_id' => 'package_id',
            'user_id' => 'user_id',
            'classification_id' => 'classification_id',

            'created_at' =>  'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : error;
    }
}
