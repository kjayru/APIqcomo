<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use App\CouponUser;
 
class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $coupon = Coupon::orderBy('id')->get();
        return ['cupones'=>$coupon];
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
        $coupon = new Coupon(); 
        $coupon->client_id = $request->client_id;
        $coupon->title = $request->title;
        $coupon->product = $request->product;
        $coupon->conditions = $request->conditions;
        $coupon->amount = $request->amount;
        $coupon->descuent = $request->descuent;
        $coupon->days = $request->days;
        $coupon->uses = $request->uses;
        $coupon->points_required = $request->points_required;
        $coupon->cover = $request->cover;
        $coupon->state = $request->state;
        $coupon->save(); 
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
        $classification = Coupon::find($id);
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
        $coupon = Coupon::find($id);
        $coupon->client_id = $request->client_id;
        $coupon->title = $request->title;
        $coupon->product = $request->product;
        $coupon->conditions = $request->conditions;
        $coupon->amount = $request->amount;
        $coupon->descuent = $request->descuent;
        $coupon->days = $request->days;
        $coupon->uses = $request->uses;
        $coupon->points_required = $request->points_required;
        $coupon->cover = $request->cover;
        $coupon->state = $request->state;
        $coupon->save();

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
    
    /**
     * Get the list of point for id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function miscupones($id)
    {
        //
        $coupons_user = CouponUser::where('user_id', $id)->get();
        $out = [];
        foreach ($coupons_user as $coupon_user)
        {
            $idcoupon = $coupon_user->idcoupon;
            $result = Coupon::where('id',$idcoupon)->first();
            $out[] = $result;
        }
        
        return ['cupones'=>$out];
    }
}
