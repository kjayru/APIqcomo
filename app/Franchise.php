<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transformers\FranchiseTransformer;

class Franchise extends Model
{
    public $transformer = FranchiseTransformer::class;
    protected $table = "franchisees";
   
    protected $fillable = [
        'id','names','address', 'city', 'province','cellphone','mail', 'avatar','status','package_id','user_id','classification_id','created_at','updated_at'
     ];
    public function Clients(){
        return $this->hasMany('App\Client');
    }

    public function User(){
     return $this->belongsTo('App\User');
    }

}
