<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Ingredient;
use App\IngredientPhoto;

class IngredientClientController extends Controller
{
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
   
        $ingredient = new Ingredient();

        $ingredient->name = $request->name;
        $ingredient->price = $request->price;
        $ingredient->calorias = $request->calorias;
        $ingredient->description = $request->description;

        $ingredient->client_id = $request->client_id;
        $ingredient->save();

        
            $photos = $request->file('photo');
            
           
            foreach ($photos as $photo) {
              

                $extension = $photo->getClientOriginalExtension();
                $filename  = uniqid() . '.' . $extension;
                $paths   = $photo->storeAs('ingredients', $filename);

                $photo = new IngredientPhoto();
                $photo->ingredient_id = $ingredient->id;
                $photo->photo = $paths;
                $photo->save();
            }

        return response()->json(['rpta'=>'ok']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IngredientClient  $ingredientClient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IngredientClient  $ingredientClient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredient = Ingredient::find($id);

        return response()->json($ingredient);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IngredientClient  $ingredientClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);

        $ingredient->name = $request->name;
        $ingredient->price = $request->price;
        $ingredient->calorias = $request->calorias;
        $ingredient->description = $request->description;
        $ingredient->client_id = $request->client_id;
        $ingredient->save();
        

        if($request->file('photo')){
            $photos = $request->file('photo');
             
            foreach ($photos as $photo) {
                $extension = $photo->getClientOriginalExtension();
                $filename  = uniqid() . '.' . $extension;
                $paths   = $photo->storeAs('ingredients', $filename);

                $photo = new IngredientPhoto();
                $photo->ingredient_id = $ingredient->id;
                $photo->photo = $paths;
                $photo->save();
            }
        }
        return response()->json(['rpta'=>'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IngredientClient  $ingredientClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingredient::where('id',$id)->delete();

        return response()->json(['rpta'=>'ok']);
    }
}
