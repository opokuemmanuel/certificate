<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginsController extends Controller
{
    public function log(Request $request)
    {

        $credentials = $request->only( 'name','password');

        if(Auth::attempt($credentials)){
             //dd($credentials);
           return view('Add_School');
        }else{
            //dd($credentials);
           // return view('Add_School');
            //return view('home');
           return back()->with('error', 'incorrect username or password');
        }
    }
}
