<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogUniController extends Controller
{
    public  function index(){
        return view("loginss");
    }

    public function logs(Request $request)
    {

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials)){
            //  dd($credentials);
            return view('homePage');
        }else{
            // dd($credentials);
            return back()->with('error', 'incorrect username or password');
        }
    }

}
