<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Sale;
 
class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $sales = Sale::orderBy('id')->get();
        return ['sales'=>$sales];
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
        $sales = new Sale(); 
        $sales->mozo_id = $request->mozo_id;
        $sales->client_id = $request->client_id;
        $sales->payment_method_id = $request->payment_method_id;
        $sales->mesa_id = $request->mesa_id;
        $sales->importe = $request->importe;
        $sales->state = $request->state;  
        $sales->save(); 
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
        $classification = Sale::find($id);
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
        $sales = Sale::find($id);
        $sales->mozo_id = $request->mozo_id;
        $sales->client_id = $request->client_id;
        $sales->payment_method_id = $request->payment_method_id;
        $sales->mesa_id = $request->mesa_id;
        $sales->importe = $request->importe;
        $sales->state = $request->state;
        $sales->save();

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
     * Get the list of restaurante where someday i got a buy, this for id_client
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function estuve($id)
    {
        //
        $franquiciados = [];
        $sales = Sale::orderBy('id')->get();
        foreach ($sales as $sale)
        {
            $client_id = $sale->client_id;
            $franchisee = Client::where('id',$client_id)->first();
            $franquiciados[] = $franchisee;
        }
        return ['franquiciados'=>$franquiciados];
    }
}
