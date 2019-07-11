<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\access_gener;

class AccessGenerController extends Controller
{//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $access_gener = access_gener::orderBy('id')->get();
        return ['reservas'=>$access_device];
    }
    
    public function __construct()
    {
        //$this->middleware('guest');
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $access_gener = new access_gener(); 
        $access_gener->genero_id = $request->genero_id; 
        $access_gener->save(); 
        return response()->json(['rpta'=>'ok']);
    }
}
