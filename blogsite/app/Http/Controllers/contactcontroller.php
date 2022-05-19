<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactcontroller extends Controller
{
    function contactindex(){
        return view('/contact');
    }
}
