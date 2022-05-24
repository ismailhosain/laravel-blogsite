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

Route::get('/','App\Http\Controllers\homeController@homeindex')->middleware('logincheck');
Route::get('/visitor','App\Http\Controllers\visitorController@visitorindex')->middleware('logincheck');

//<======admin service page controller setup=======>

Route::get('/service','App\Http\Controllers\servicecontroller@serviceindex')->middleware('logincheck');
Route::get('/getservice','App\Http\Controllers\servicecontroller@getserviceindex')->middleware('logincheck');
Route::post('/deleteservice','App\Http\Controllers\servicecontroller@servicedelete')->middleware('logincheck'); 
//delete route for indivisual id
Route::post('/editservice','App\Http\Controllers\servicecontroller@servicedetails')->middleware('logincheck'); 
//edit route for indivisual id
Route::post('/editservicesave','App\Http\Controllers\servicecontroller@serviceupdatebutton')->middleware('logincheck'); 
//update save button click route for indivisual id
Route::post('/insertservicesave','App\Http\Controllers\servicecontroller@serviceinsertbutton')->middleware('logincheck'); 
//add save button click to insert data's


//<=======admin courses page controller setup======>

Route::get('/course','App\Http\Controllers\coursecontroller@courseindex')->middleware('logincheck');
Route::get('/getcourse','App\Http\Controllers\coursecontroller@getcourseindex')->middleware('logincheck');
Route::post('/deletecourse','App\Http\Controllers\coursecontroller@coursedelete')->middleware('logincheck'); 
//delete route for indivisual id
Route::post('/editcourse','App\Http\Controllers\coursecontroller@coursedetails')->middleware('logincheck'); 
//edit route for indivisual id
Route::post('/editcoursesave','App\Http\Controllers\coursecontroller@courseupdatebutton')->middleware('logincheck'); 
//update save button click route for indivisual id
Route::post('/insertcoursesave','App\Http\Controllers\coursecontroller@courseinsertbutton')->middleware('logincheck'); 
//add save button click to insert data's



//<=======admin project page controller setup======>

Route::get('/project','App\Http\Controllers\projectcontroller@projectindex')->middleware('logincheck');
Route::get('/getproject','App\Http\Controllers\projectcontroller@getprojectindex')->middleware('logincheck');
Route::post('/deleteproject','App\Http\Controllers\projectcontroller@projectdelete')->middleware('logincheck'); 
//delete route for indivisual id
Route::post('/editproject','App\Http\Controllers\projectcontroller@projectdetails')->middleware('logincheck'); 
//edit route for indivisual id
Route::post('/editprojectsave','App\Http\Controllers\projectcontroller@projectupdatebutton')->middleware('logincheck'); 
//update save button click route for indivisual id
Route::post('/insertprojectsave','App\Http\Controllers\projectcontroller@projectinsertbutton')->middleware('logincheck'); 
//add save button click to insert data's

// <=======frontpage contact controller setup======>

Route::get('/contact','App\Http\Controllers\contactcontroller@contacttindex')->middleware('logincheck');
Route::get('/getcontact','App\Http\Controllers\contactcontroller@getcontactindex')->middleware('logincheck');
Route::post('/deletecontact','App\Http\Controllers\contactcontroller@contactdelete')->middleware('logincheck'); 
//delete route for indivisual id



//<=======admin review page controller setup======>

Route::get('/review','App\Http\Controllers\reviewcontroller@reviewindex')->middleware('logincheck');
Route::get('/getreview','App\Http\Controllers\reviewcontroller@getreviewindex')->middleware('logincheck');
Route::post('/deletereview','App\Http\Controllers\reviewcontroller@reviewdelete')->middleware('logincheck');
//delete route for indivisual id
Route::post('/editreview','App\Http\Controllers\reviewcontroller@reviewdetails')->middleware('logincheck');
//edit route for indivisual id
Route::post('/editreviewsave','App\Http\Controllers\reviewcontroller@reviewupdatebutton')->middleware('logincheck'); 
//update save button click route for indivisual id
Route::post('/insertreviewsave','App\Http\Controllers\reviewcontroller@reviewinsertbutton')->middleware('logincheck'); 
//add save button click to insert data's

//<=======admin login page controller setup======>

Route::get('/login','App\Http\Controllers\logincontroller@loginindex');

Route::post('/onlogin','App\Http\Controllers\logincontroller@onlogin');

Route::get('/logout','App\Http\Controllers\logincontroller@onlogout');


//<=======admin Photo Gallery page controller setup======>

Route::get('/photo','App\Http\Controllers\photocontroller@photoindex')->middleware('logincheck');

Route::post('/photoupload','App\Http\Controllers\photocontroller@photoupload')->middleware('logincheck');

Route::get('/photoselect','App\Http\Controllers\photocontroller@photoselect')->middleware('logincheck');
