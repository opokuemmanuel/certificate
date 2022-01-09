<?php

namespace App\Http\Controllers;

use App\department;
use App\programs;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function program (Request $request)
    {

        $arr['pro'] = department::where('school',$request->university_name)->get();
        return view('add_program')->with($arr);
    }

    public function add_program(Request $request){

        $ALL = programs::where('school',$request->school)
                         ->where('department',$request->department)->get();

        if (sizeof($ALL)==1)
        {
            $arr['pro'] = department::where('school',$request->school)->get();
            return view('add_program')->with('successMsg','Program already added')->with($arr);

        }else{
            $input = [];
            $input['program'] = $request->program_name;
            $input['department'] = $request->department;
            $input['school'] = $request->school;


            $yourdat =  programs::create($input);

            if ($yourdat) {

                $arr['pro'] = department::where('school',$request->school)->get();
                return view('add_program')->with('successMsg','Program added successfully')->with($arr);
            }
        }



    }

    public function all_program(Request $request){

        $all['pro'] = programs::where('school',$request->university_name)->get();

        return view('All_programs')->with($all);
    }

    public function ShowEdit($id=null)
    {

        $arr = programs::where('id',$id)->first();

        return view('Edit_program')->with(compact('arr'));

    }

    public function updateProgram(Request $request)
    {

        $product=  programs::find($request->id);

        $product->program = $request->program;
        $product->department = $request->department;
        $product->school = $request->university_name;

        $yourdat =  $product->save();


        // dd($input);
        if ($yourdat){
            $all['pro'] = programs::where('school',$request->university_name)->get();
            return view('All_programs')->with($all)->with('successMsg','Update successfully');
        }

    }

    public function delete(Request $request)
    {
        programs::where('id',$request->id)->delete();

        $all['pro'] = programs::where('school',$request->university_name)->get();
        return view('All_programs')->with($all)->with('successMsg','Program deleted successfully');

    }
}
