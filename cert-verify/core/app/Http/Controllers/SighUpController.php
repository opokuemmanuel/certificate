<?php

namespace App\Http\Controllers;

use App\signups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SighUpController extends Controller
{
    public function SignUp(Request $request)
    {
        $validate_data = $request->validate([
            'name' => ['unique:signups'],
            'password' => ['unique:signups'],
            'confirm_password' => ['same:password'],
        ], [
            'name.required' => 'username is required',
            'password.required' => 'Password is required',
            'Confirm_password.same' => 'Password does not match',
        ]);

        if ($validate_data) {
            $input = [];
            $input['name'] = $request->name;
            $input['password'] = Hash::make($request->password);


           //  dd($input);
           $yourdat = signups::create($input);


            if ($yourdat) {
                return back()->with('success', 'Registered successfully');
            } else {
                return back()->with('error', 'Registration error, incorrect username or password');
            }

        }
    }
}
