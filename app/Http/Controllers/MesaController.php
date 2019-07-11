<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mesa;
use App\Mozo;
use App\BookingMesa;
use App\BookingSector;
use App\Booking;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas = RestaurantDetail::all();

        
        return view('admin.paginas.mesas.index',['mesas'=>$mesas]);
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
        $mesa = new Mesa();

        $mesa->nummesa = $request->nummesa;
        $mesa->descripcion = $request->descripcion;
        $mesa->client_id = $request->client_id;

        $mesa->save();

        return response()->json(['rpta'=>'ok','client_id'=>$mesa->client_id]);
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
        $mesa = Mesa::find($id);

        return response()->json($mesa);
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
        $mesa =  Mesa::find($id);

        $mesa->nummesa = $request->nummesa;
        $mesa->descripcion = $request->descripcion;
        $mesa->client_id = $request->client_id;

        $mesa->save();

        return response()->json(['rpta'=>'ok','client_id'=>$mesa->client_id]);
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
     * Muestra las mesas disponibles a una hora y fecha dada
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enabled($sector_id, $dia, $h0, $hf)
    {
        $mesas = Mesa::where('sector_id',$sector_id)->get();
        $bookings = Booking::where(['day'=>$dia,'star'=>$h0,'end'=>$hf])->get();   
        $out = [];
        foreach( $bookings as $book ){
            $item = $book;
            $item['mesas'] = $book->mesa;
            $out[] = $item;
        }
        return response()->json(['rpta'=>'ok','mesas'=>$mesas,'libros'=>$out]);
    }
}
