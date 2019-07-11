<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use App\Booking;
use App\RoleUser;
use App\User;
use App\UserClientAdmin; 
use App\Sector;
use App\Client;
use App\Franchise; 
use App\BookingMesa;
use App\BookingSector;
 
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $from = date('Y-m-d');
        $reservas = [];        

        //segun el tipo de rol
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->first(); 
         
        $clients = [];
        $sectors = [];  

        //reservas del dia        
        $to = date('Y-m-d', strtotime($from));
        $date_arr = explode('-', $to);

        $temp = Booking::where('user_id',$user_id)->whereDate('day','>=',$to)->get(); 
    
        $item = [];
        foreach($temp as $subtemp){    
            $subitem = $subtemp;
            $user_booking = $subtemp->user;
            $subitem['name'] = $user_booking->name;
            if( empty($user_booking->telefono) ){
                $subitem['cellphone'] = 'no especificado';        
            } else{
                $subitem['cellphone'] = $user_booking->telefono;
            } 

            $booking_sector = BookingSector::where('booking_id',$subtemp->id)->first(); 

            if( empty($booking_sector) ){
                $subitem['sector'] = 'no especificado';  
            } else{
                $subitem['sector'] = $booking_sector->sector->name;
            }
            if( empty($subtemp->estado) ){
                $subitem['estado'] = 'no especificiado';
            }else{
                $subitem['estado'] = $subtemp->estado->name;
            }
            $item[] = $subitem;
        }

        $reservas=$item;      
         
        return response()->json(["rpta"=>"ok", "msg"=>"",'reservas'=>$reservas, "clients"=>$clients, "sectors"=>$sectors]); 
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
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required',
            'hora0' => 'required',
            'horaf' => 'required',
            'user_id' => 'required|numeric',
            'client_id' => 'required|numeric',
        ]); 

        $booking = new Booking;
        $booking->amount = $request->amount;
        $booking->day = $request->date;
        $booking->star = $request->hora0;
        $booking->end = $request->horaf;
        $booking->user_id = $request->user_id;
        $booking->client_id = $request->client_id;
        $booking->bookingstate_id = 1;
        $booking->save();

        foreach($request->mesas as $mesa){
            $bookingMesa = new BookingMesa;
            $bookingMesa->booking_id = $booking->id;
            $bookingMesa->mesa_id = $mesa;
            $bookingMesa->save();
        }

        $bookingSector = new BookingSector;
        $bookingSector->booking_id = $booking->id;
        $bookingSector->sector_id = $request->sector_id;
        $bookingSector->save();

        return response()->json(["rpta"=>"ok", "msg"=>"La reserva fue creado con exito"]);
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

    
    public function cancel(Request $request)
    {   
        $booking = Booking::where('id',$request->id)->first(); 
        $booking->bookingstate_id = 4;
        $booking->save(); 
        return response()->json(["rpta"=>"ok", "msg"=>"La reserva se cancelo"]);
    }
}
