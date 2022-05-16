<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitormodel;
use App\Models\servicemodel;
use App\Models\coursemodel;
use App\Models\projectmodel;
use App\Models\contactmodel;

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

        // project data select query

        $projectsdata=json_decode(projectmodel::orderby('id','desc')->limit(6)->get());
        
        // services,courses and projects data return view
                 
        return view('layout/home',[
            'servicedata'=>$servicedata,
            'coursesdata'=>$coursesdata,
            'projectdata'=>$projectsdata
        
        ]);            
    
       }

       //add button project to insert code
   function contactinsertbutton(Request $req)
   {
    $contact_name=$req->input('contact_name');
    $contact_mob=$req->input('contact_mob');
    $contact_email=$req->input('contact_email');
    $contact_msg=$req->input('contact_msg');    

    $result=contactmodel::insert(['contact_name'=>$contact_name,'contact_mob'=>$contact_mob,'contact_email'=>$contact_email,'contact_msg'=>$contact_msg]);
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }
    }  


     
}
