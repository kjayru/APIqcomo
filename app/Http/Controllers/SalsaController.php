<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Salsa;



class SalsaController extends Controller
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
        $salsa = new Salsa();
        $salsa->name = $request->name;
        $salsa->client_id = $request->client_id;
        $salsa->price = $request->price;
        $salsa->description = $request->description;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('salsas');
            $salsa->photo = $photo;
        }
        $salsa->save();

        return response()->json(['rpta'=>'ok']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salsa = Salsa::find($id);

        return response()->json($salsa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salsa = Salsa::find($id);
        $salsa->name = $request->name;
        $salsa->client_id = $request->client_id;
        $salsa->price = $request->price;
        $salsa->description = $request->description;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('salsas');
            $salsa->photo = $photo;
        }
        $salsa->save();

        return response()->json(['rpta'=>'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salsa  $salsa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Salsa::where('id',$id)->delete();

       return response()->json(['rpta'=>'ok']);
    }
}
