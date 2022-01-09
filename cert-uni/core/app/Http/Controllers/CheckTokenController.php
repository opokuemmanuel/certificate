<?php

namespace App\Http\Controllers;

use App\CheckToken;
use Illuminate\Http\Request;

class CheckTokenController extends Controller
{
    public function CheckToken(Request $request){

        $data = CheckToken::where('default_password',$request->token)->get();

        if(sizeof($data)==1){
            $arr = CheckToken::where('default_password',$request->token)->first();

            return view('SuccessPage')->with(compact('arr'));

           // return view('editCategory')->with(compact('arr'));
        }else{
            return back()->with('error', 'Invalid Token');
        }
    }
}
