<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitormodel;
use App\Models\servicemodel;



class homeController extends Controller
{
    function homeindex(){
        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        visitormodel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]); 
        
        
            $servicedata=json_decode(servicemodel::all());


                 return view('layout/home',['servicedata'=>$servicedata]);
    
       }
}
