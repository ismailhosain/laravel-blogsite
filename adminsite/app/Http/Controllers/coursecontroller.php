<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\coursemodel;

class coursecontroller extends Controller
{
    function courseindex()
    {

        return view('/course');
    }

//to fetch course content into admin panel

    function getcourseindex()
    {
    $result=json_decode(coursemodel::all());

    return $result;
    }  

//indivisual id edit function

    function coursedetails(Request $req){

     $id=$req->input('id');

    $result=coursemodel::where('id','=',$id)->get();

    return $result;

     } 


// course delete code

  function coursedelete(Request $req){
    
    $id=$req->input('id');

    $result=coursemodel::where('id','=',$id)->delete();
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }

  }  


//save button course to update code

   function courseupdatebutton(Request $req)
   {
    
    $id=$req->input('id');
    $cname=$req->input('cname');
    $cdesc=$req->input('cdesc');
    $cfees=$req->input('cfees');
    $cenroll=$req->input('cenroll');
    $ctotalclass=$req->input('ctotalclass');
    $clink=$req->input('clink');
    $cimg=$req->input('cimg');

$result=coursemodel::where('id','=',$id)->update([
    'course_name'=>$name,
    'course_des'=>$desc,
    'course_fee'=>$cfees,
    'course_totalenroll'=>$cenroll,
    'course_totalclass'=>$ctotalclass,
    'course_link'=>$clink,
    'course_img'=>$cimg
]);
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }
    }  

//add button course to insert code
   function courseinsertbutton(Request $req)
   {
    $cname=$req->input('cname');
    $cdesc=$req->input('cdesc');
    $cfees=$req->input('cfees');
    $cenroll=$req->input('cenroll');
    $ctotalclass=$req->input('ctotalclass');
    $clink=$req->input('clink');
    $cimg=$req->input('cimg');

    $result=coursemodel::insert(['course_name'=>$cname,'course_des'=>$cdesc,'course_fee'=>$cfees,'course_totalenroll'=>$cenroll,'course_totalclass'=>$ctotalclass,'course_link'=>$clink,'course_img'=>$cimg]);
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }
    }  

}
