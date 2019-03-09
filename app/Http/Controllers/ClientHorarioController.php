<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientHorario;

class ClientHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientHorario = ClientHorario::orderBy('id')->get();
        return ['horarios'=>$clientHorario];
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
        $clientHorario = new ClientHorario();
        $clientHorario->lunes_inicio = $request->lunes_inicio;
        $clientHorario->lunes_final = $request->lunes_final;
        $clientHorario->martes_inicio = $request->martes_inicio;
        $clientHorario->martes_final = $request->martes_final;
        $clientHorario->miercoles_inicio = $request->miercoles_inicio;
        $clientHorario->miercoles_final = $request->miercoles_final;
        $clientHorario->jueves_inicio = $request->jueves_inicio;
        $clientHorario->jueves_final = $request->jueves_final;
        $clientHorario->viernes_inicio = $request->viernes_inicio;
        $clientHorario->viernes_final = $request->viernes_final;
        $clientHorario->sabado_inicio = $request->sabado_inicio;
        $clientHorario->sabado_final = $request->sabado_final;
        $clientHorario->domingo_inicio = $request->domingo_inicio;
        $clientHorario->domingo_final = $request->domingo_final; 
        $clientHorario->save();
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
        $clientHorario = ClientsComentario::find($id);
        return response()->json($clientHorario);
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
        $clientHorario = ClientHorario::find($id);
        $clientHorario->lunes_inicio = $request->lunes_inicio;
        $clientHorario->lunes_final = $request->lunes_final;
        $clientHorario->martes_inicio = $request->martes_inicio;
        $clientHorario->martes_final = $request->martes_final;
        $clientHorario->miercoles_inicio = $request->miercoles_inicio;
        $clientHorario->miercoles_final = $request->miercoles_final;
        $clientHorario->jueves_inicio = $request->jueves_inicio;
        $clientHorario->jueves_final = $request->jueves_final;
        $clientHorario->viernes_inicio = $request->viernes_inicio;
        $clientHorario->viernes_final = $request->viernes_final;
        $clientHorario->sabado_inicio = $request->sabado_inicio;
        $clientHorario->sabado_final = $request->sabado_final;
        $clientHorario->domingo_inicio = $request->domingo_inicio;
        $clientHorario->domingo_final = $request->domingo_final; 
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
