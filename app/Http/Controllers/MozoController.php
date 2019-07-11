<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mozo;
use App\Mesa;
class MozoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mozos = Mozo::orderBy('id','desc')->paginate(15);

        
        return view('admin.paginas.mozos.index',['mozos'=>$mozos]);
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
        $mozo = new Mozo();

        $mozo->name = $request->name;
        $mozo->address = $request->address;
        $mozo->country = $request->country;
        $mozo->city = $request->city;
        $mozo->province = $request->province;
        $mozo->cellphone = $request->cellphone;
        $mozo->email = $request->email;
        $mozo->sexo = $request->sexo;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('mozos');
            $mozo->avatar = $avatar;
        }
        $mozo->client_id = $request->client_id;
        $mozo->save();

        return response()->json(['rpta'=>'ok']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mozos = Mozo::where('client_id',$id)->orderBy('id','desc')->get();
        $mesas = Mesa::Where('client_id',$id)->orderBy('id','desc')->get();
        
        return view('admin.paginas.mozos.index',['mozos'=>$mozos, 'mesas'=>$mesas,'client_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mozo = Mozo::find($id);
        return response()->json([$mozo]);
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
        $mozo = Mozo::find($id);
        $mozo->name = $request->name;
        $mozo->address = $request->address;
        $mozo->country = $request->country;
        $mozo->city = $request->city;
        $mozo->province = $request->province;
        $mozo->cellphone = $request->cellphone;
        $mozo->email = $request->email;
        $mozo->sexo = $request->sexo;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('mozos');
            $mozo->avatar = $avatar;
        }
        $mozo->client_id = $request->client_id;
        $mozo->save();

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
}
