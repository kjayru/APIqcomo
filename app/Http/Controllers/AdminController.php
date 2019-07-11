<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Franchise;
use App\Package;
use App\Classification;
use App\Client;
use App\ClientPhoto;
use App\ClientConfiguration;
use App\ClientService;
use App\Service;
use App\Configuration;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.paginas.master.index');
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
        //
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
        //
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
        //
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

    public function apiFranquicia(){
        $franquicias = Franchise::orderBy('status','desc')->get();

        $packages = Package::all();

        $classifications = Classification::all();

        return response()->json(['franquicias'=>$franquicias,'packages'=>$packages,'clasificacion'=>$classifications]);
    }
 
    public function apiCliente($id)
    {
        $services = Service::all();
      
        $configurations = Configuration::all();
        $clientes = Client::where('franchise_id',$id)->get();
        $franchise_id = $id;
        
        return response()->json(['clients'=>$clientes,'franchise_id'=>$franchise_id,'services'=>$services,'configurations'=>$configurations]);
    }
}
