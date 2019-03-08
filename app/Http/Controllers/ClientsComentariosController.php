<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClientsComentario;
use App\User;

class ClientsComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientComentario = ClientsComentario::orderBy('id')->get();
        return ['puntajes'=>$clientComentario];
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
        $coupon = new ClientsComentario();
        $coupon->client_id = $request->client_id;
        $coupon->descripcion = $request->descripcion;
        $coupon->puntuacion = $request->puntuacion;
        $coupon->user_id = $request->user_id;
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
        $classification = ClientsComentario::find($id);
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
        $coupon = ClientsComentario::find($id);
        $coupon->client_id = $request->client_id;
        $coupon->descripcion = $request->descripcion;
        $coupon->puntuacion = $request->puntuacion;
        $coupon->user_id = $request->user_id; 
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
    
    /**
     * Obtiene una clasificacion de puntajes y su cantidad
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getResumenPuntajes($id)
    {
        $puntajes = ClientsComentario::where('client_id', $id)->get()->take(500);;
        $points = [];
        $p_0 = 0;
        $p_1 = 0;
        $p_2 = 0;
        $p_3 = 0;
        $p_4 = 0;
        $p_5 = 0;
        
        if( $puntajes == null ){
            return ['puntajes'=>[]];
        }
         
        foreach ($puntajes as $puntaje) { 
            switch($puntaje->puntuacion){
                case 0:
                    $p_0 += 1;
                    break;
                case 1:
                    $p_1 += 1;
                    break;
                case 2:
                    $p_2 += 1;
                    break;
                case 3:
                    $p_3 += 1;
                    break;
                case 4:
                    $p_4 += 1;
                    break;
                case 5:
                    $p_5 += 1;
                    break;
            }
        }
        $points[] = ['valor'=>0,'cantidad'=>$p_0];
        $points[] = ['valor'=>1,'cantidad'=>$p_1];
        $points[] = ['valor'=>2,'cantidad'=>$p_2];
        $points[] = ['valor'=>3,'cantidad'=>$p_3];
        $points[] = ['valor'=>4,'cantidad'=>$p_4];
        $points[] = ['valor'=>5,'cantidad'=>$p_5]; 
        
        return ['puntajes'=>$points];
    }
}
