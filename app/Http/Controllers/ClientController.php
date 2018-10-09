<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\User;
class ClientController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       
        $clientes = User::where('role_id',2)->get();
        return $this->showAll($clientes);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ];

        $this->validate($request, $rules);

        $nuevo = $request->all();
        $nuevo['role_id'] = User::ROLE;
        $nuevo['password'] = bcrypt($request->password);
        $nuevo['verified'] = User::USUARIO_NO_VERIFICADO;
        $nuevo['varification_token'] = User::generarVerificationToken();
        $nuevo['admin'] = User::USUARIO_REGULAR;


        $usuario = User::create($nuevo);

        return response()->json(['data'=>$usuario],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $cliente = User::find($id);

         //return $this->showOne($cliente);
         return response()->json(['data'=>$cliente]);
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
        dd('updates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('destroys');
    }
}
