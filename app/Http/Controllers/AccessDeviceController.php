<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\access_device;

class AccessDeviceController extends Controller
{//
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $access_device = access_device::orderBy('id')->get();
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
        $access_device = new access_device(); 
        $access_device->tipodevice_id = $request->tipodevice_id; 
        $access_device->save(); 
        return response()->json(['rpta'=>'ok']);
    }
}
