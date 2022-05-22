<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class photocontroller extends Controller
{
   function photoindex()
   {
    return view('/photo');
   }
}
