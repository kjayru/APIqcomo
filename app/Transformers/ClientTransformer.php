<?php

namespace App\Transformers;

use App\Client;
use League\Fractal\TransformerAbstract;
use App\Franchise; 

class ClientTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Client $client)
    {

        $idf = $client->franchise_id;
        $franchisee = Franchise::where('id',$idf)->first();

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
            'latitud'=>(double)$client->latitude,
            'longitud'=>(double)$client->longitude, 
            'numero_mesas'=>(int)$client->numesas,  
            'estado'=>(int)$client->status,       
            'foto1'=>(string)$client->foto1,       
            'foto2'=>(string)$client->foto2,       
            'foto3'=>(string)$client->foto3,       
            'foto4'=>(string)$client->foto4,      
            'id_paquete'=>(int)$client->package_id,    
            'likes'=>(int)$client->likes,    
            'clasificacion_id'=> $franchisee->classification_id,   
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
            'numero_mesas'=> 'numesas',
            'estado'=> 'status',  
            'foto1'=> 'foto1',
            'foto2'=> 'foto2',
            'foto3'=> 'foto3',
            'foto4'=> 'foto4',   
            'likes'=> 'likes',     
            'paquete_id'=> 'package_id',  
            'clasificacion_id'=> 'classification_id',     
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
            'numesas'=> 'numero_mesas',
            'status'=> 'estado',
            'foto1'=> 'foto1',
            'foto2'=> 'foto2',
            'foto3'=> 'foto3',
            'foto4'=> 'foto4',
            'likes'=> 'likes',     
            'package_id'=> 'paquete_id',   
            'classification_id'=> 'clasificacion_id',     
            'created_at' =>  'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : error;
    }
    
}
