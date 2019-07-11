<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\User;
use App\Franchisee;
use App\Client;
 
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $booking = Booking::orderBy('id')->get();
        return ['reservas'=>$booking];
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
        $booking = new Booking(); 
        $booking->amount = $request->amount;
        $booking->day = $request->day;
        $booking->star = $request->star;
        $booking->end = $request->end;
        //$booking->sector_id = $request->sector_id;
        //$booking->mesa_id = $request->mesa_id;
        $booking->user_id = $request->user_id;
        $booking->bookingstate_id = $request->bookingstate_id;  
        $booking->client_id = $request->client_id;
        $booking->save(); 
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
        $classification = Booking::find($id);
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
        $booking = Booking::find($id);
        $booking->amount = $request->amount;
        $booking->day = $request->day;
        $booking->star = $request->star;
        $booking->end = $request->end;
        $booking->sector_id = $request->sector_id;
        $booking->mesa_id = $request->mesa_id;
        $booking->user_id = $request->user_id;
        $booking->state = $request->state; 
        $booking->save();

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
    public function misreservas($id)
    {
        //
        $bookings = Booking::where('user_id', $id)->get();
        $out = [];
        foreach ($bookings as $booking)
        {
            $user_id = $booking->user_id;
            $result_user = User::where('id',$user_id)->first();
            
            $franchiseed_id = $booking->client_id;
            $result_franchiseed = Client::where('id',$franchiseed_id)->first();
            
            $booking['user_reserva'] = $result_user;
            $booking['franchised'] = $result_franchiseed;
            $out[] = $booking;
        }
        
        return ['reservas'=>$out];
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
        $booking = Booking::find($request->id); 
        $booking->bookingstate_id = 4; 
        $booking->save();

        //TODO enviar notificacion

        return response()->json(['rpta'=>'ok']);
    }
}
