<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientSubtipoComida;


class ClientSubtipoComidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = ClientSubtipoComida::orderBy('id')->get();
        return ['subtiposcomida'=>$client];
    }
    
    public function __construct()
    {
        $this->middleware('guest');
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
        $coupon = new ClientSubtipoComida();
        $coupon->nombre = $request->nombre;
        $coupon->descripcion = $request->descripcion;
        $coupon->save();
        return response()->json(['rpta'=>'ok']);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classification = ClientSubtipoComida::find($id);
        return response()->json($classification);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = ClientSubtipoComida::find($id);
        $coupon->nombre = $request->nombre;
        $coupon->descripcion = $request->descripcion;
        $coupon->save();
        
        return response()->json(['rpta'=>'ok']);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
