<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserClientPoint;

class UserClientPointController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $sale = new UserClientPoint(); 
        $sale->client_id = $request->client_id;
        $sale->user_id = $request->user_id;
        $sale->points = $request->points;
        $sale->description = $request->description; 
        $sale->save();         
        return response()->json(['rpta'=>'ok']);
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
        $points = UserClientPoint::where('user_id', $id)->get();
        return ['points'=>$points];
    }


}
