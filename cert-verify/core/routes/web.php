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

Route::get('/', function () {
    return view('loginss');
});

/////All routes on univeristies////////////////
Route::post('/Add_School','UniversityController@Add_School')->name('Add_School');
Route::get('/View_Add_School','UniversityController@view_add_school')->name('view_add_school');
Route::post('/Edit_School','UniversityController@updateUniversity')->name('Edit_School');
Route::get('/Registered_schools','UniversityController@Registered')->name('registered_schools');
Route::get('/deleteAccount/{id}','UniversityController@deleteAccount');
Route::get('/EditAccount/{id}','UniversityController@ShowEdit');



///////////////All routes on Admin account///////////////////
Route::post('/admin','UsersController@SignUpAdmin')->name('Add_Admin');
Route::get('/ShowAdmin','UsersController@ShowSignUpAdmin')->name('Show_SignUp');
Route::post('/lo','LoginsController@log')->name('lo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
