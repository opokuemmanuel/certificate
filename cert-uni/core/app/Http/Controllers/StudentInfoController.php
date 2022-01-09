<?php

namespace App\Http\Controllers;

use App\programs;
use App\Qualification;
use App\SignUpUni;
use App\student_info;
use Illuminate\Http\Request;

class StudentInfoController extends Controller
{
    public function StudentInfo(Request $request)
    {

        $pro['pro'] = programs::where('school',$request->university_name)->get();
        $classs['qual'] = Qualification::all();
       return view('Student_info')->with($pro)->with($classs);
    }

    public function add_Info(Request $request){
        $All = student_info::where('Student_name',$request->student_name)
                             ->where('School',$request->school)->get();

        if (sizeof($All)==1){
            $pro['pro'] = programs::where('school',$request->university_name)->get();
            $classs['qual'] = Qualification::all();
            return view('Student_info')->with($pro)->with($classs)->with('successMsg','Info already added ');

        }else{
            $input = [];
            $input['Student_name'] = $request->student_name;
            $input['School'] = $request->school;
            $input['Program'] = $request->program;
            $input['Class'] = $request->class;
            $input['Year_of_completion'] = $request->year;


            $yourdat =  student_info::create($input);

            if ($yourdat) {


                $pro['pro'] = programs::where('school',$request->university_name)->get();
                $classs['qual'] = Qualification::all();
                return view('Student_info')->with($pro)->with($classs)->with('successMsg','Info added successfully');

            }
        }


    }

    public function ShowAll(Request $request)
    {

        $arr['pro'] = student_info::where('School',$request->university_name)->get();
        $arre['pros'] = programs::where('school',$request->university_name)->get();

        return view('All_student')->with($arr)->with($arre);

    }

    public function SearchInfo(Request $request)
    {

        $ar['pros'] = student_info::where('School',$request->university_name)
                                    ->where('Student_name',$request->student_name)
                                    ->where('Program',$request->program)->get();

            return view('Search_results')->with($ar);

    }

    public function ShowEdit($id=null)
    {

        $arr = student_info::where('id',$id)->first();

        return view('ShowEdit')->with(compact('arr'));

    }

    public function delete(Request $request)
    {
        student_info::where('id',$request->id)->delete();

        $arr['pro'] = student_info::where('School',$request->university_name)->get();
        $arre['pros'] = programs::where('school',$request->university_name)->get();

        return view('All_student')->with($arr)->with($arre)->with('successMsg','Info deleted successfully');

    }

    public function updateInfo(Request $request)
    {

        $product=  student_info::find($request->id);

        $product->Student_name = $request->student_name;
        $product->School = $request->school;
        $product->Program = $request->program;
        $product->Class = $request->class;
        $product->Year_of_completion = $request->year;

        $yourdat =  $product->save();


        // dd($input);
        if ($yourdat){
            $arr['pro'] = student_info::where('School',$request->university_name)->get();
            $arre['pros'] = programs::where('school',$request->university_name)->get();

            return view('All_student')->with($arr)->with($arre)->with('successMsg','Update successfully');

        }

    }


}
