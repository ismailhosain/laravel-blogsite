<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\reviewmodel;

class reviewcontroller extends Controller
{
     function reviewindex()
    {

        return view('/review');
    }

    //to fetch review content into admin panel

    function getreviewindex()
    {
    $result=json_decode(reviewmodel::orderby('id','desc')->get());

    return $result;
    }  


// review delete code

  function reviewdelete(Request $req){
    
    $id=$req->input('id');

    $result=reviewmodel::where('id','=',$id)->delete();
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }

  }  


//indivisual id edit function

    function reviewdetails(Request $req){

     $id=$req->input('id');

    $result=reviewmodel::where('id','=',$id)->get();

    return $result;

     } 




//save button review to update code

   function reviewupdatebutton(Request $req)
   {
    
    $id=$req->input('id');
    $name=$req->input('name');
    $description=$req->input('description');
    $image=$req->input('image');    

$result=reviewmodel::where('id','=',$id)->update([
    'name'=>$name,
    'description'=>$description,
    'image'=>$image,   
]);
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }
    }  

//add button review to insert code
   function reviewinsertbutton(Request $req)
   {
    $name=$req->input('name');
    $description=$req->input('description');
    $image=$req->input('image');    

    $result=reviewmodel::insert(['name'=>$name,'description'=>$description,'image'=>$image]);
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }
    }  
}
