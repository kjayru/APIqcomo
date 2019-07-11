<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use App\Sale;
use App\User;
use App\SaleMenu;
use App\Menu;
use App\Payment;
use App\MenuPhoto;
 
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
        return ['pedidos'=>$sales];
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
        $sale = new Sale(); 
        $sale->mozo_id = $request->mozo_id;
        $sale->client_id = $request->client_id;
        $sale->paymentmethod_id = 1;
        $sale->mesa_id = $request->mesa_id;
        $sale->user_id = $request->user_id;  
        $sale->importe = $request->importe;
        $sale->salestate_id = $request->salestate_id;
        $sale->typesale_id = $request->typesale_id;
        $sale->save();    

        $id_sales = $sale->id;
        $json_menus = json_decode($request->menus,1);
        foreach ($json_menus as $menu) {
            $saleMenu = new SaleMenu();
            $saleMenu->sale_id = $id_sales; 
            $saleMenu->menu_id = $menu['id'];
            $saleMenu->amount = $menu['amount'];
            $saleMenu->price = $menu['price'];
            $saleMenu->msg_tochef = $menu['msg_tochef'];
            $saleMenu->discoint = $menu['discoint'];
            $saleMenu->save();
        }
        //TODO, generar un puntaje al cliente que hizo el pedido

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
        $sales->user_id = $request->user_id; 
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
    public function mispedidos($id)
    {
        //
        $sales = Sale::where('user_id', $id)->get();
        $out = [];
        foreach ($sales as $sale)
        {
            $user_id = $sale->user_id;
            $result_user = User::where('id',$user_id)->first();
            
            $franchiseed_id = $sale->client_id;
            $result_franchiseed = Client::where('id',$franchiseed_id)->first();
            
            $sale_id = $sale->id; 
            $result_menus = SaleMenu::where('sale_id',$sale_id)->get();
            $menus_completos = [];
            foreach ($result_menus as $menu)
            {
                $item = $menu;
                $detalle_plato = Menu::where('id',$menu->menu_id)->first();
                $photo = MenuPhoto::where('menu_id',$menu->menu_id)->first();
                $item['detalle_plato'] = $detalle_plato; 
                $item['photo'] = $photo->photo; 
                $menus_completos[] = $item;
            }
             

            $sale['user_contacto'] = $result_user;
            $sale['franchised'] = $result_franchiseed;
            $sale['platos'] = $menus_completos; 
            $out[] = $sale;
        }
        
        return ['pedidos'=>$out];
    }

    /**
     * Cancela un pedido
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelar(Request $request)
    {
        $sales = Sale::find($request->id); 
        $sales->salestate_id = 8; 
        $sales->save();

        //TODO enviar notificacion

        return response()->json(['rpta'=>'ok']);
    }


    /**
     * Cancela un pedido
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function estuve($id)
    {
        $sales = Sale::where('user_id',$id)->get();
        $out = [];
        $ids = [];
        foreach($sales as $sale){
            if( $this->notRepeat($ids, $sale->client_id) == 0 ){
                continue;
            }
            $client = Client::where('id',$sale->client_id)->first();
            $out[] = $client;
        }
        return response()->json(['rpta'=>'ok','data'=>$out]);
    }
 
    private function notRepeat(&$ids, $client_id){
        foreach($ids as $id){
            if($id == $client_id){
                return 0;
            }
        }
        $ids[] = $client_id;
        return 1;
    }
    
}
