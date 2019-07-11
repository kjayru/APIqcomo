<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MenuClient;

use App\Menu;
use App\CLient;
use App\Category;
use App\Ingredient;
use App\Product;
use App\Salsa;

class MenuClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $producto = new Product();
        $producto->category_id = $request->category_id;
        $producto->title = $request->title;
        $producto->price1 = $request->price1;
        $producto->price2 = $request->price2;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('products');
            $producto->photo = $photo;
        }

        $producto->save();

        return response()->json(['rpta'=>'ok']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuClient  $menuClient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where('client_id',$id)->get();
        $cat_total = Category::where('client_id',$id)->count();
        $salsas = Salsa::where('client_id',$id)->get();
        $ingredient = Ingredient::all();

        $productos = Product::where('category_id',$categories[0]->id)->get();
        
   
        return view('admin.paginas.productoscarta.index',['productos' => $productos,'categorias'=>$categories,'ingredientes'=>$ingredient,'client_id'=>$id,'salsas'=>$salsas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuClient  $menuClient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Product::find($id);

        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuClient  $menuClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Product::find($id);
        $producto->category_id = $request->category_id;
        $producto->title = $request->title;
        $producto->price1 = $request->price1;
        $producto->price2 = $request->price2;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('products');
            $producto->photo = $photo;
        }

        $producto->save();

        return response()->json(['rpta'=>'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuClient  $menuClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id',$id)->delete();

        return response()->json(['rpta'=>'ok']);
    }

    public function replicate(){
        $product = Product::orderBy('id','desc')->first();
        Product::find($product->id)->replicate()->save();
    }


}
