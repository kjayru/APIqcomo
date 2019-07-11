<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classification;
use App\Client;
use App\ClientPoint;
use App\RoleUser;
use App\UserClientAdmin;
use App\Franchise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MiPosicionPuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $classifications = Classification::all();
        $clients = [];
        $currClient = [];  

        //tipo del rol de la cuenta y cliente donde trabaja
        $user_id = Auth::id();
        $role_user = RoleUser::where('user_id',$user_id)->first();

        switch($role_user->role_id){
            case 1://administrador
                     
                $clients = Client::all(); 
                $pos_gen = 0;
                $pos_cat = 0; 
                $ii_gen = 0;
                $ii_cat = 0;
                
            break;
            case 2://franquicia
            break;
            case 3://mozo
            break;
            case 4://caja
            break;
            case 5://usuario o client
                
                //datos del cliente logueado
                $userClientAdmin = UserClientAdmin::where('user_id',$user_id)->first(); 
                $currClient = $userClientAdmin->client; 
                $currClient['classification_id'] = $currClient->franchise->classification_id;

                $currClientPoint = $currClient->points;
                if( empty($currClientPoint) ){
                    $currClientPoint = new ClientPoint(); 
                    $currClientPoint->client_id = $currClient->id;
                    $currClientPoint->point_used = 0;
                    $currClientPoint->point_enabled = 0;
                    $currClientPoint->amount = 0;
                    $currClientPoint->save();
                }
                $currClient['point'] = $currClientPoint;

                //datos de los otros cliente
                $pos_gen = 0;
                $pos_cat = 0; 
                $ii_gen = 0;
                $ii_cat = 0;
                
                $clients = Client::all(); 
                foreach($clients as $client)
                { 
                    $client['classification_id'] = $client->franchise->classification_id;
                    $clientPoint = $client->points;
                    if( empty($clientPoint) ){
                        $clientPoint = new ClientPoint(); 
                        $clientPoint->client_id = $client->id;
                        $clientPoint->point_used = 0;
                        $clientPoint->point_enabled = 0;
                        $clientPoint->amount = 0;
                        $clientPoint->save();
                    }
                    $client['point'] = $clientPoint;
                } 
                
            break;
        }
        
        return view('admin.paginas.miposicionpuntos.index', ['clasificaciones' => $classifications, 
        'clients' => $clients, 'user_id' => $user_id, 'role'=>$role_user->role_id,
        'curr_client'=>$currClient]);
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
        //
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
