<?php

namespace App\Transformers;

use App\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Client $client)
    {

        return [
            'cliente_id' => (int)$client->id,
            'franquicia_id' => (int)$client->franchise_id,
            'cover' => (string)$client->cover,
            'nombre' => (string)$client->name,
            'direccion' => (string)$client->address,
            'ciudad' => (string)$client->city,
            'provincia' => (string)$client->province,
            'pais' => (string)$client->country,
            'celular' => (string)$client->cellphone,
            'correo' =>(string)$client->email,
            'sexo' => (string)$client->sexo,
            'cajero'=> (string)$client->cashier,
            'logo' => (string)$client->logo,
            'latitud'=>(string)$client->latitude,
            'longitud'=>(string)$client->longitude,
            'estado'=>(string)$client->status,         
            'fechaCreacion' =>  (string)$client->created_at,
            'fechaActualizacion' =>(string)$client->updated_at,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'cliente_id' => 'id',
            'franquicia_id' => 'franchise_id',
            'cover' =>  'cover',
            'nombre' =>  'name',
            'direccion' =>  'address',
            'ciudad' =>  'city',
            'provincia' =>  'province',
            'pais' =>  'country',
            'celular' =>  'cellphone',
            'correo' => 'email',
            'sexo' =>  'sexo',
            'cajero'=>  'cashier',
            'logo' =>  'logo',
            'latitud'=> 'latitude',
            'longitud'=> 'longitude',
            'estado'=> 'status',         
            'fechaCreacion' =>  'created_at',
            'fechaActualizacion' => 'updated_at',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'cliente_id',
            'franchise_id' => 'franquicia_id',
            'cover' =>  'cover',
            'name' =>  'nombre',
            'address' =>  'direccion',
            'city' =>  'ciudad',
            'province' =>  'provincia',
            'country' =>  'pais',
            'cellphone' =>  'celular',
            'email' => 'correo',
            'sexo' =>  'sexo',
            'cashier'=>  'cajero',
            'logo' =>  'logo',
            'latitude'=> 'latitud',
            'longitude'=> 'longitud',
            'status'=> 'estado',         
            'created_at' =>  'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : error;
    }
    
}
