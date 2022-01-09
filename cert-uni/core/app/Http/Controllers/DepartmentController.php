<?php

namespace App\Http\Controllers;

use App\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function add_department(Request $request){

        $All = department::where('school',$request->school)
                         ->where('department_name',$request->department)->get();
        if (sizeof($All)==1){
            return view('homePage')->with('successMsg','Department already added');
        }else{
            $input = [];
            $input['department_name'] = $request->department;
            $input['school'] = $request->school;


            $yourdat =  department::create($input);

            if ($yourdat) {
                // return back()->with('success', 'Department added successfully');
                return view('homePage')->with('successMsg','Department added successfully');
            } else {
                return back()->with('error', 'Registration error, incorrect username or password');
            }
        }


    }

    public function view_department(Request $request)
    {
       $all['pro'] = department::where('school',$request->university_name)->get();

      return view('All_department')->with($all);
    }

    public function delete(Request $request)
    {
        department::where('id',$request->id)->delete();

        $all['pro'] = department::where('school',$request->university_name)->get();
        return view('All_department')->with($all)->with('successMsg','Department deleted successfully');

    }

    public function ShowEdit($id=null)
    {

        $arr = department::where('id',$id)->first();

        return view('Edit_Department')->with(compact('arr'));

    }

    public function updateDepartment(Request $request)
    {

        $product=  department::find($request->id);

        $product->department_name = $request->department;
        $product->school = $request->school;

        $yourdat =  $product->save();


        // dd($input);
        if ($yourdat){
            $all['pro'] = department::where('school',$request->university_name)->get();
            return view('All_department')->with($all)->with('successMsg','Update successfully');
        }

    }
}
