<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\MenuPhoto;
use App\MenuIngredient;
use App\Ingredient;
use App\UserPlatoLike;

class MenusController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth:api')->except(['index','store', 'verify', 'resend']);
        //$this->middleware('transform.input:' . ClientTransformer::class)->only(['index','store', 'update']);
    }

    public function index()
    {
        $menus = Menu::all(); 
        return ['data'=>$menus]; 
    }
    
    
    public function getFranchiseedMenus($id)
    { 
        $menus = Menu::where('category_id', $id)->get(); 
        $out = [];
        foreach ($menus as $menu) {
            $item = $menu;
            
            $fotos = MenuPhoto::where('menu_id', $menu->id)->get(); 
            $item['fotos'] = $fotos;

            $ingredientes = MenuIngredient::where('menu_id', $menu->id)->get(); 
            $detaill_ingredientes = [];
            foreach ($ingredientes as $ing) {
                $detaill_ingredientes[] = Ingredient::where('id', $ing->ingredient_id)->first(); 
            }

            $item['ingredientes'] = $detaill_ingredientes;
            $out[] = $item;
        }

        return ['data'=>$out]; 
    }


    /**
     * Guarda en la table de usuario_plato_likes y se cuenta en la table de client columna like
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    { 
        //tabla client like
        $menu = Menu::where("id", $request->plato_id)->first(); 
        $menu->likes = $menu->likes + 1;
        $menu->save();

        //table usuario_franquiciado_likes
        $platolike = new UserPlatoLike();
        $platolike->iduser = $request->user_id;
        $platolike->idmenu = $request->plato_id;
        $platolike->estado = 1;
        $platolike->save();

        $out["rpta"] = "ok";
        return response()->json($out); 
    }

}
