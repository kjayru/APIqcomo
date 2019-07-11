<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\access_age;

class AccessAgeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $access_age = access_age::orderBy('id')->get();
        return ['reservas'=>$access_age];
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
        $access_age = new access_age(); 
        $access_age->age = $request->age; 
        $access_age->save(); 
        return response()->json(['rpta'=>'ok']);
    }
}
