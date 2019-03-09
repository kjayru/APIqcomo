<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientPolitica;

class ClientPoliticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientPolitica = ClientPolitica::orderBy('id')->get();
        return ['politicas'=>$clientPolitica];
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
        $clientPolitica = new ClientPolitica();
        $clientPolitica->rango_precios = $request->rango_precios;
        $clientPolitica->webpage = $request->webpage;
        $clientPolitica->politicas = $request->politicas; 
        $clientPolitica->save();
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
        $clientPolitica = ClientPolitica::find($id);
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
        $clientPolitica = ClientPolitica::find($id);
        $clientPolitica->rango_precios = $request->rango_precios;
        $clientPolitica->webpage = $request->webpage;
        $clientPolitica->politicas = $request->politicas; 
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
