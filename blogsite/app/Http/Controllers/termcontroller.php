<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class termcontroller extends Controller
{
    function termcon(){
        return view('/terms');
    }
}
