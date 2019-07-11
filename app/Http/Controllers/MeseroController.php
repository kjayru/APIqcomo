<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Franchise;
use App\Mozo;

class MeseroController extends Controller
{
    public function index()
    {
        $mozos = Mozo::orderBy('id','desc')->paginate(15);

        
        return view('admin.paginas.mozos.index',['mozos'=>$mozos]);
    }
}