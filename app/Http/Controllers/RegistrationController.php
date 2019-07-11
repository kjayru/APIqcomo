<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User; 
use App\RoleUser;  
 
class RegistrationController extends ApiController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $id = Auth::id();  
            //$token = Str::random(60);
            $ac = new AuthController();
            $token = $ac->login($request);
    
            $request->user()->forceFill([
                'remember_token' => $token->access_token,
            ])->save();
    
            return response()->json(['rpta'=>'ok', 'user'=>$user, 'token'=>$token]);
        }
        else{
            
            $path_foto = "";
            if ($request->hasFile('foto')) {
                $avatar = $request->file('foto')->store('users');
                $path_foto = $avatar;
            }
            else{
                $path_foto = $request->foto;
            }
            
            $created_user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'foto' => $path_foto,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60),
            ]);

            $role_user = RoleUser::create([
                'role_id' => 5,
                'user_id' => $created_user->id
            ]);
            
            $ac = new AuthController();
            $token = $ac->login($request);
            return response()->json(['rpta'=>'ok', 'user'=>$created_user, 'token'=>$token]);
        }
         
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
