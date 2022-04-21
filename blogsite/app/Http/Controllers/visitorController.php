<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\visitormodel;

class visitorController extends Controller
{
    function homeindex(){

        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        visitormodel::insert(['visit_time'=>$timeDate,'ip_address'=>$UserIP]);
        return view('layout/home');

    }
}
