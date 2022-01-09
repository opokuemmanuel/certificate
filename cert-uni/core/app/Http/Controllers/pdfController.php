<?php

namespace App\Http\Controllers;

use App\image;
use App\student_info;
use Hamcrest\Core\AllOf;
use Illuminate\Http\Request;
use PDF;


class pdfController extends Controller
{
    public function showHomePage()
    {
        return view('loginss');


//        $data = ['title' => 'Welcome to HDTuto.com'];
//        $pdf = PDF::loadView('new', $data);
//        return $pdf->stream('itsolutionstuff.pdf');
    }

//    public function checkValidity(Request $request)
//    {
//
//
//        $ALL['Al'] = student_info::where('Student_name',$request->student_name)
//                             ->where('School',$request->school)
//                             ->where('Program',$request->program)->get();
//
//        $Image['img'] = image::where('school',$request->school)->get();
//
//        if (sizeof($ALL)==1){
//
//           // return view('new')->with($ALL)->with($Image);
//
//                    $pdf = PDF::loadView('new')->with($ALL);
//                    return $pdf->stream('itsolutionstuff.pdf');
//        }else{
//            return back()->with('error', 'Invalid credentials');
//        }
//
//         //        $data = ['title' => 'Welcome to HDTuto.com'];
//         //        $pdf = PDF::loadView('new', $data);
//         //        return $pdf->stream('itsolutionstuff.pdf');
//
//    }


}
