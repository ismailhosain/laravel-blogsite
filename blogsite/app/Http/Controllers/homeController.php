<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitormodel;

class homeController extends Controller
{
    function homeindex(){
        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        visitormodel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]);     
        return view('layout/home');
    
       }
}
