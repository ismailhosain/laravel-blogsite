<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class policycontroller extends Controller
{
    function policyindex(){
        return view('/policy');
    }
}
