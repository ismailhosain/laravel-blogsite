<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitormodel;
use App\Models\servicemodel;
use App\Models\coursemodel;


class homeController extends Controller
{
    function homeindex(){
        $UserIP=$_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate= date("Y-m-d h:i:sa");
        visitormodel::insert(['ip_address'=>$UserIP,'visit_time'=>$timeDate]); 
        
              
        // services data select query

            $servicedata=json_decode(servicemodel::all());

        // courses data select query

        $coursesdata=json_decode(coursemodel::orderby('id','desc')->limit(6)->get());
        
        // services and courses data return view
                 
        return view('layout/home',[
            'servicedata'=>$servicedata,
            'coursesdata'=>$coursesdata,
        
        ]);

               
    
       }
}
