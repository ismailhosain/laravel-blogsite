<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
     function homeindex(){

        return view('layout/home');

    }
}
