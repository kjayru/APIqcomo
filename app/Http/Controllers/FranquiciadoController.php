<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Franchisee;

class FranquiciadoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $franquiciados = Client::orderBy('id')->get();  
        
        foreach ($franquiciados as &$franquiciado)
        {
            $id_franchised = $franquiciado->franchise_id;
            $result = Franchisee::where('id',$id_franchised)->first(); 
            $franquiciado['classification_id'] = $result->classification_id;
        }        
        
        return ['franquiciados'=>$franquiciados];
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
     
}
