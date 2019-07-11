<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserClientLike;
use App\Client;

class UserClientLikeController extends Controller
{

    public function userLikes($id)
    {
        $clients = UserClientLike::where([
            'user_id'=>$id,
            'estado'=>1
            ])->get();
        $out = [];
        foreach($clients as $client)
        {
            $out[] = $client->client_id;
        }
        return response()->json(['rpta' => 'ok','data'=> $out]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curr_userClient = UserClientLike::where([
            'client_id'=>$request->restaurant_id,
            'user_id'=>$request->user_id,
        ])->first();

        $client = Client::where('id',$request->restaurant_id)->first(); 
        if( $client == null ){
            return response()->json(['rpta' => 'fail','msg'=>'cliente no existe']); 
        }
 
        if($curr_userClient != null){ 
            //actualizar estado del like en userclientlike
            $old_estado = $curr_userClient->estado;
            if($old_estado == 0 ){
                $curr_userClient->estado = 1; 
            }else{
                $curr_userClient->estado = 0; 
            } 
            $curr_userClient->save(); 

            //actualizar num likes en client 
            $old_num = $client->likes;
            if($curr_userClient->estado == 1){
                $client->likes = $old_num+1;
            } else{
                $client->likes = $old_num-1;
            }
            $client->save();
        }else{
            //actualizar estado del like en userclientlike
            $userClientLike = new UserClientLike(); 
            $userClientLike->client_id = $request->restaurant_id;
            $userClientLike->user_id = $request->user_id; 
            $userClientLike->estado = 1; 
            $userClientLike->save(); 

            //actualizar num likes en client 
            $old_num = $client->likes;
            $new_num = $old_num + 1;
            $client->likes = $new_num;
            $client->save();
        }

        return response()->json(['rpta' => 'ok','likes'=> $client->likes ]);
        
    }
}
