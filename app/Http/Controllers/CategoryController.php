<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Menu;
use App\MenuPhoto;
use App\MenuIngredient;
use App\Ingredient;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth:api')->except(['index','store', 'verify', 'resend']);
        //$this->middleware('transform.input:' . ClientTransformer::class)->only(['index','store', 'update']);
    }

    public function index()
    {
        $categories = Category::all(); 
        return ['data'=>$categories]; 
    }
    
    public function getFranchiseedCategories($id)
    { 
        $categories = Category::where('client_id', $id)->get(); 
        return ['data'=>$categories]; 
    }
    
    public function getFranchiseedSubCategories($id)
    { 
        $categories = Category::where('parent_id', $id)->get(); 
        return ['data'=>$categories]; 
    }

    public function get_guarniciones($id)
    { 
        $categories = Category::where([
            ['client_id', '=', $id],
            ['es_guarnicion', '=', '1'],
        ])->get(); 

        $guarniciones = [];
        foreach( $categories as $categoria ){  
            $menus = Menu::where('category_id', $categoria->id)->get();
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

            $guarniciones[] = $out;
        }

        return ['data'=>$guarniciones]; 
    }
    
}
