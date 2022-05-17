<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','App\Http\Controllers\homeController@homeindex');

Route::get('/visitor','App\Http\Controllers\visitorController@visitorindex');

//<======admin service page controller setup=======>

Route::get('/service','App\Http\Controllers\servicecontroller@serviceindex');

Route::get('/getservice','App\Http\Controllers\servicecontroller@getserviceindex');

Route::post('/deleteservice','App\Http\Controllers\servicecontroller@servicedelete'); 
//delete route for indivisual id
Route::post('/editservice','App\Http\Controllers\servicecontroller@servicedetails'); 
//edit route for indivisual id
Route::post('/editservicesave','App\Http\Controllers\servicecontroller@serviceupdatebutton'); 
//update save button click route for indivisual id
Route::post('/insertservicesave','App\Http\Controllers\servicecontroller@serviceinsertbutton'); 
//add save button click to insert data's


//<=======admin courses page controller setup======>

Route::get('/course','App\Http\Controllers\coursecontroller@courseindex');

Route::get('/getcourse','App\Http\Controllers\coursecontroller@getcourseindex');

Route::post('/deletecourse','App\Http\Controllers\coursecontroller@coursedelete'); 
//delete route for indivisual id
Route::post('/editcourse','App\Http\Controllers\coursecontroller@coursedetails'); 
//edit route for indivisual id
Route::post('/editcoursesave','App\Http\Controllers\coursecontroller@courseupdatebutton'); 
//update save button click route for indivisual id
Route::post('/insertcoursesave','App\Http\Controllers\coursecontroller@courseinsertbutton'); 
//add save button click to insert data's



//<=======admin project page controller setup======>

Route::get('/project','App\Http\Controllers\projectcontroller@projectindex');

Route::get('/getproject','App\Http\Controllers\projectcontroller@getprojectindex');

Route::post('/deleteproject','App\Http\Controllers\projectcontroller@projectdelete'); 
//delete route for indivisual id
Route::post('/editproject','App\Http\Controllers\projectcontroller@projectdetails'); 
//edit route for indivisual id
Route::post('/editprojectsave','App\Http\Controllers\projectcontroller@projectupdatebutton'); 
//update save button click route for indivisual id
Route::post('/insertprojectsave','App\Http\Controllers\projectcontroller@projectinsertbutton'); 
//add save button click to insert data's

// <=======frontpage contact controller setup======>

Route::get('/contact','App\Http\Controllers\contactcontroller@contacttindex');
//
Route::get('/getcontact','App\Http\Controllers\contactcontroller@getcontactindex');

Route::post('/deletecontact','App\Http\Controllers\contactcontroller@contactdelete'); 
//delete route for indivisual id