<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gift;
use App\GiftUser;
 
class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $gifts = Gift::orderBy('id')->get();
        return ['clasificaciones'=>$gifts];
    }
    
    public function __construct()
    {
        $this->middleware('guest');
    } 

    /**BookingController.php
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
        $gifts = new Gift();  
        $gifts->client_id = $request->client_id;
        $gifts->name = $request->name;
        $gifts->description = $request->description;
        $gifts->terms = $request->terms;
        $gifts->cover = $request->cover;
        $gifts->display = $request->display;
        $gifts->repeat = $request->repeat;
        $gifts->points_open = $request->points_open;
        $gifts->sistema = $request->sistema;
        $gifts->distance_permit = $request->distance_permit;
        $gifts->zone_gtm = $request->zone_gtm;
        $gifts->limit_start = $request->limit_start;
        $gifts->limit_end = $request->limit_end;
        $gifts->prize = $request->prize;
        $gifts->save(); 
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
        $classification = Gift::find($id);
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
        $gifts = Gift::find($id); 
        $gifts->client_id = $request->client_id;
        $gifts->name = $request->name;
        $gifts->description = $request->description;
        $gifts->terms = $request->terms;
        $gifts->cover = $request->cover;
        $gifts->display = $request->display;
        $gifts->repeat = $request->repeat;
        $gifts->points_open = $request->points_open;
        $gifts->sistema = $request->sistema;
        $gifts->distance_permit = $request->distance_permit;
        $gifts->zone_gtm = $request->zone_gtm;
        $gifts->limit_start = $request->limit_start;
        $gifts->limit_end = $request->limit_end;
        $gifts->prize = $request->prize;
        $gifts->save();

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
    public function misregalos($id)
    {
        //
        $gifts_user = GiftUser::where('user_id', $id)->get();    
        $out = [];
        foreach ($gifts_user as $gift_user)
        {
            $idgift = $gift_user->gift_id;
            $result = Gift::where('id',$idgift)->first();
            $out[] = $result;
        }
        
        return ['data'=>$out];
    }
}
