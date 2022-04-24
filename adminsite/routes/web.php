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

Route::get('/service','App\Http\Controllers\servicecontroller@serviceindex');

Route::get('/getservice','App\Http\Controllers\servicecontroller@getserviceindex');