<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMenuLike;
use App\Menu;

class UserMenuLikeController extends Controller
{

    public function userLikes($id)
    {
        $menus = UserMenuLike::where('user_id',$id)->get();
        $out = [];
        foreach($menus as $menu)
        {
            $out[] = $menu->menu_id;
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
        $curr_userMenu = UserMenuLike::where([
            'user_id'=>$request->user_id,
            'menu_id'=>$request->plato_id,
        ])->first();
         
        $menu = Menu::where('id',$request->plato_id)->first();
        if( $menu == null ){
            return response()->json(['rpta' => 'fail','msg'=>'menu no existe']); 
        }
  
        $new_num = 0;
        if($curr_userMenu != null){ 
            //actualizar estado del like en userclientlike
            $old_estado = $curr_userMenu->estado;
            if($old_estado == 0 ){
                $curr_userMenu->estado = 1; 
            }else{
                $curr_userMenu->estado = 0; 
            } 
            $curr_userMenu->save(); 

            //actualizar num likes en client 
            $old_num = $menu->likes;
            if($curr_userMenu->estado == 1){
                $menu->likes = $old_num+1;
            } else{
                $menu->likes = $old_num-1;
            }
            $menu->save();
        }else{
            $userMenuLike = new UserMenuLike(); 
            $userMenuLike->menu_id = $request->plato_id;
            $userMenuLike->user_id = $request->user_id; 
            $userMenuLike->estado = 1; 
            $userMenuLike->save(); 

            $menu = Menu::where('id',$request->plato_id)->first();
            $old_num = $menu->likes;
            $new_num = $old_num + 1;
            $menu->likes = $new_num;
            $menu->save();
        }


        return response()->json(['rpta' => 'ok','likes'=> $menu->likes ]);
    }
}
