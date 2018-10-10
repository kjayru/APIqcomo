<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $cliente)
    {

        return [
            'cliente_id' => (int)$cliente->id,
            'rol_id' => (int)$cliente->role,
            'nombre' => (string)$cliente->name,
            'apellido' => (string)$cliente->lastname,
            'correo' => (string)$cliente->email,
            'telefono' => (string)$cliente->telefono,
            'sexo' => (string)$cliente->sexo,
            'edad' => (string)$cliente->edad,
            'fotografia' => (string)$cliente->foto,
            
            'fechaCreacion' =>  (string)$cliente->created_at,
            'fechaActualizacion' =>(string)$cliente->updated_at,
        ];
    }
}
