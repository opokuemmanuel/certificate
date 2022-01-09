<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//use Barryvdh\Snappy\Facades\SnappyPdf as PDF;


//Route::get('/', function () {
//
//
//    $pdf = PDF::loadView('new');
//   return $pdf->stream('new.pdf');
//
//
//});


use App\image;
use App\student_info;
use Illuminate\Http\Request;

Route::get('/','pdfController@showHomePage');

///////////////All routes on Login and SignUp with token ///////////////////);
Route::post('/lo','LoginsController@log')->name('lo');
Route::get('/showLogin','LogUniController@index')->name('Log');
Route::get('/checkToken','SignUpUniController@index')->name('SignUps');
Route::post('/SignUpUni','SignUpUniController@uni_signup')->name('SignUp');
Route::post('/logs','LogUniController@logs')->name('logs');

/////////////All routes on Token/////////////////////////////
Route::post('/checkAuth','CheckTokenController@CheckToken')->name('Check');


////////////////////All routes on department////////////////////////
Route::post('/add_department','DepartmentController@add_department')->name('add_department');
Route::get('/department','HomepageController@view_home')->name('homePage');
Route::post('/all_department','DepartmentController@view_department')->name('allDepartment');
Route::post('/deleteDepa','DepartmentController@delete')->name('deleteDepa');
Route::get('/EditDepartment/{id}','DepartmentController@ShowEdit');
Route::post('/Update','DepartmentController@updateDepartment')->name('update');

///////////////////////All routes on program///////////////////////////////
Route::get('/program','ProgramsController@program')->name('program');
Route::post('/add_program','ProgramsController@add_program')->name('add_program');
Route::get('/all_program','ProgramsController@all_program')->name('all_program');
Route::get('/EditProgram/{id}','ProgramsController@ShowEdit');
Route::post('/UpdateProgram','ProgramsController@updateProgram')->name('updateProgram');
Route::post('/deleteProgram','ProgramsController@delete')->name('deleteProgram');


////////////////////All routes on images///////////////////////////////////////
Route::get('/add_image','ImgaeController@Image')->name('Add_image');
Route::post('/image_added','ImgaeController@add_image')->name('Image_added');
Route::get('/edit_image','ImgaeController@edit_image')->name('Edit_image');
Route::get('/deleteImage/{school}','ImgaeController@delete');
Route::get('/EditImage/{school}','ImgaeController@ShowEdit');
Route::post('/ImageUpdated','ImgaeController@updateImage')->name('update_image');


/////////////////////////All routes on Students///////////////////////////
Route::get('/student','StudentInfoController@StudentInfo')->name('Student_Info');
Route::post('/studentInfo','StudentInfoController@add_Info')->name('add_info');
Route::get('/AllStudentInfo','StudentInfoController@ShowAll')->name('all_student');
Route::get('/SaecrhInfo','StudentInfoController@SearchInfo')->name('search_info');
Route::get('/EditInfo/{id}','StudentInfoController@ShowEdit');
Route::post('/delete','StudentInfoController@delete')->name('deleteInfo');
Route::post('/Update','StudentInfoController@updateInfo')->name('Update_info');

///////////////////All routes on checking validity////////////////////////
//Route::get('/checkValidity','pdfController@checkValidity')->name('CheckValidity');

Route::get('/checkValidity', function (Request $request) {

    $ALL = student_info::where('Student_name',$request->student_name)
        ->where('School',$request->school)
        ->where('Program',$request->program)->first();

    $Image = image::where('school',$request->school)->first();

    if ($ALL){

        // return view('new')->with($ALL)->with($Image);

        $pdf = PDF::loadView('new',compact('ALL'),compact('Image'))->setPaper('A5', 'landscape');
        return $pdf->stream('verify.pdf');
    }else{
        return back()->with('error', 'Invalid credentials');
    }

})->name('CheckValidity');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
