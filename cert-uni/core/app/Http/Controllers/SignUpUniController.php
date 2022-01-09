<?php

namespace App\Http\Controllers;

use App\CheckToken;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpUniController extends Controller
{
    public  function index(){
        return view("SignUp");
    }


    public function uni_signup(Request $request){
        $validate_data = $request->validate([
            'university_name' => ['required', 'string'],
            'username' => ['unique:sign_up_unis'],
            'password' => ['unique:sign_up_unis'],
            'confirm_password' => ['same:password'],
        ], [
            'username.required' => 'username is required',
            'password.required' => 'Password is required',
            'confirm_password.same' => 'Password does not match',
        ]);

        if ($validate_data) {

            $input = [];
            $input['university_name'] = $request->university_name;
            $input['username'] = $request->username;
            $input['password'] = Hash::make($request->password);

//             dd($input);
            $yourdat = User::create($input);


            if ($yourdat) {

                CheckToken::where('university_name',$request->university_name)->delete();

                return view('loginss')->with('successMsg','SignUp successful');
            } else {
                return back()->with('error', 'Registration error, incorrect username or password');
            }

        }
    }



}
