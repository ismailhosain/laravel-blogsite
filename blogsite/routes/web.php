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

// Route::get('/', function () {
//     return view('layout.home');
// });

Route::get('/','App\Http\Controllers\homecontroller@homeindex');

//insert contact route 

Route::post('/homecontact','App\Http\Controllers\homecontroller@contactinsertbutton');

//contact route

Route::get('/contact','App\Http\Controllers\contactcontroller@contactindex');

//project route

Route::get('/project','App\Http\Controllers\projectcontroller@projectindex');

//policy route

Route::get('/policy','App\Http\Controllers\policycontroller@policyindex');

//course route

Route::get('/course','App\Http\Controllers\coursecontroller@courseindex');

//term & condition route

Route::get('/terms','App\Http\Controllers\termcontroller@termcon');