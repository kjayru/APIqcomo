<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\ClientTransformer;

class Client extends Model
{
    public $transformer = ClientTransformer::class;
    protected $table = "clients";
    

    protected $fillable = [
        'id','franchise_id','cover','name','address','city','province','country','cellphone','email','sexo','cashier','logo','latitude','longitude','status','created_at','updated_at'
    ];


    public function franchise(){
        return $this->belongsTo(Franchise::class);
    }
}
