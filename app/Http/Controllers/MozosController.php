<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mozo;

class MozosController extends Controller
{
    public function __construct()
    {
       
        //$this->middleware('auth:api')->except(['index','store', 'verify', 'resend']);
        //$this->middleware('transform.input:' . FranchiseTransformer::class)->only(['index','store', 'update']);
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mozo = Mozo::all();
        
        return $this->showAll($mozo);
    }



    /**
     * Devuelve el id_mozo y el id_restaurante
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getinfo($id)
    {  
        $mozo = Mozo::where("id", $id)->first();   
        return response()->json(['rpta'=>'ok', 'mozo'=>$mozo]);
    }


}
