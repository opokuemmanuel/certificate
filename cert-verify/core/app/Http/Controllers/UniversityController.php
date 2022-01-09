<?php

namespace App\Http\Controllers;

use App\code;
use App\default_password;
use App\university;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function Add_School(Request $request)
    {

        $random_number = mt_rand(100000 , 999999);
        $istrue = true ;

        $data = university::where('default_password' , $random_number)->get();

        while($istrue) {
            if (sizeof($data)  == 0) {
                $datam = university::where('University_name', $request->university_name)->get();
                if (sizeof($datam)  == 1) {
                    return back()->with('error', 'University already exist');
                }else {

                    $product = new university();

                    $product->University_name = $request->university_name;
                    $product->Email = $request->Address;
                    $product->Website = $request->Website;
                    $product->Location = $request->location;
                    $product->Account = $request->SelectAccount;
                    $product->default_password = $random_number;


                    $default = new default_password();
                    $default->university_name = $request->university_name;
                    $default->default_password = $random_number;
                    $default->save();

                    $yourdat = $product->save();
                    $istrue = false;

                    if ($yourdat) {

                        $arr['pro']= university::where('University_name',$request->university_name)->get();

                        return view('default_password')->with('successMsg', 'University Added')->with($arr);
//                return back()->with('success', 'University Added');
                    }
                }

            }
        }

    }

    public function view_add_school()
    {
        return view('Add_School');

    }

    public function registered ()
    {
          $arr['prod'] = university::all();
          return view('registered_schools')->with($arr);
    }

    public function deleteAccount($id=null)
    {
        university::where('id',$id)->delete();
        $arre['prod'] = university::all();
        return view('registered_schools')->with($arre)->with('successMsg','Account Removed successfully');

    }

    public function ShowEdit($id=null)
    {

        $arr = university::where('id',$id)->first();

        return view('ShowEditAccount')->with(compact('arr'));

    }

    public function updateUniversity(Request $request)
    {

        $product=  university::find($request->id);

        $product->University_name = $request->university_name;
        $product->Email = $request->Address;
        $product->Website = $request->Website;
        $product->Location = $request->location;
        $product->Account = $request->SelectAccount;

        $yourdat =  $product->save();


        // dd($input);
        if ($yourdat){
            $arr['prod'] = university::all();
            return view('registered_schools')->with($arr)->with('successMsg','Update successful');
        }

    }


}
