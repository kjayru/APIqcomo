<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FranchiseedCategorie;
use App\Category;

class FranchiseesCategorieController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth:api')->except(['index','store', 'verify', 'resend']);
        //$this->middleware('transform.input:' . ClientTransformer::class)->only(['index','store', 'update']);
    }

    public function index()
    {
        $categories = FranchiseedCategorie::all(); 
        return ['data'=>$categories]; 
    }
    
    public function getFranchiseedCategories($id)
    { 
        $categories = Category::where('client_id', $id)->get(); 
        return ['data'=>$categories]; 
    }


}
