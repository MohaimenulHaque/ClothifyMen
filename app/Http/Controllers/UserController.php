<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){


        if(Auth::check() && Auth::user()->user_type=='user'){
            return view('/');
        }


        // if(Auth::check() && Auth::user()->user_type=='admin'){
        //     return view('admin.dashboard');
        // }
        // elseif(Auth::check() && Auth::user()->user_type=='user'){
        //     return view('/');
        // }

    }
    public function home(){
        $getProduct = Product::all();
        return view('welcome', compact('getProduct'));
    }
}
