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
    public function show(User $cliente)
    {
        
         //$cliente = User::find($id);

         return $this->showOne($cliente);
        // return response()->json(['data'=>$cliente]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $cliente)
    {
       
        $reglas = [
            'email'=>'required|email|unique:users,email'.$cliente->id,
            'password'=>'min:6|confirmed',
            'admin' => 'in:'.User::USUARIO_ADMINISTRADOR.','.User::USUARIO_REGULAR
        ];

        $this->validate($request,$reglas);

        if($request->has('name')){
            $cliente->name = $request->name;
        }

        if($request->has('email') && $cliente->email != $request->email){
            $cliente->verified = User::USUARIO_NO_VERIFICADO;
            $cliente->verification_token = User::generarVerificationToken();
            $cliente->email = $request->email;
        }

        if($request->has('password')){
            $cliente->password = bcrypt($request->password);
        }

        if($request->has('admin')){
            if(!$cliente->esVerificado()){
                return $this->errorResponse('Unicamente los usuarios verificados pueden cambiar su valor de administrador',409);
            }
            $cliente->admin = $request->admin;
        }

        if(!$cliente->isDirty()){
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar',422);
        }

        $cliente->save();

        return $this->showOne($cliente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $cliente)
    {
        $user->delete();
        
        return $this->showOne($user);
    }
}
