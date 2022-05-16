<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\projectmodel;

class projectcontroller extends Controller
{
     function projectindex()
    {

        return view('/project');
    }

    
//to fetch project content into admin panel

    function getprojectindex()
    {
    $result=json_decode(projectmodel::orderby('id','desc')->get());

    return $result;
    }  


// project delete code

  function projectdelete(Request $req){
    
    $id=$req->input('id');

    $result=projectmodel::where('id','=',$id)->delete();
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }

  }  


//indivisual id edit function

    function projectdetails(Request $req){

     $id=$req->input('id');

    $result=projectmodel::where('id','=',$id)->get();

    return $result;

     } 




//save button project to update code

   function projectupdatebutton(Request $req)
   {
    
    $id=$req->input('id');
    $pname=$req->input('pname');
    $pdesc=$req->input('pdesc');
    $plink=$req->input('plink');
    $pimg=$req->input('pimg');    

$result=projectmodel::where('id','=',$id)->update([
    'project_name'=>$pname,
    'project_des'=>$pdesc,
    'project_link'=>$plink,
    'project_img'=>$pimg,   
]);
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }
    }  

//add button project to insert code
   function projectinsertbutton(Request $req)
   {
    $pname=$req->input('pname');
    $pdesc=$req->input('pdesc');
    $plink=$req->input('plink');
    $pimg=$req->input('pimg');    

    $result=projectmodel::insert(['project_name'=>$pname,'project_des'=>$pdesc,'project_link'=>$plink,'project_img'=>$pimg]);
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }
    }  

}
