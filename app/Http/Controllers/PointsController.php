<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Point;
 
class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $points = Point::orderBy('id')->get();
        return ['points'=>$points];
    }
    
    public function __construct()
    {
        $this->middleware('guest');
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
        $point = new Point(); 
        $point->user_id = $request->user_id;
        $point->points = $request->points;
        $point->description = $request->description;  
        $point->save(); 
        return response()->json(['rpta'=>'ok']);
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classification = Point::find($id);
        return response()->json($classification);
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
        $point = Point::find($id);
        $point->user_id = $request->user_id;
        $point->points = $request->points;
        $point->description = $request->description; 
        $point->save();

        return response()->json(['rpta'=>'ok']);
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
    
    /**
     * Get the list of point for id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mispuntos($id)
    {
        //
        $points = Point::where('user_id', $id)->get();
        return ['points'=>$points];
    }

    /**
     * Devuelve la informacion basica que se mostrara en el app
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function puntajes_single($c, $u)
    {  
        $puntos = Point::where([
            ['client_id', '=', $c],
            ['user_id', '=', $u],
        ])->get(); 
        $out["puntos"] = $puntos;
        $out["rpta"] = "ok";
        return response()->json($out); 
    }
}
