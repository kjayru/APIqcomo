<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\UserActivo;

class UserActivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $userActivo = UserActivo::all();
        return view('admin.paginas.miposicionpuntos.index', ['userActivos' => $userActivo]);
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
        $activo = UserActivo::find($id);
        if( $activo != null ){
            $userActivo = new UserActivo();  
            $clientVisita->user_id = $request->user_id;
            $clientVisita->state = $request->state; 
            $clientVisita->save(); 
        }else{
            $activo->user_id = $request->user_id;
            $activo->state = $request->state; 
            $activo->save(); 
        }

        return response()->json(['rpta'=>'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
