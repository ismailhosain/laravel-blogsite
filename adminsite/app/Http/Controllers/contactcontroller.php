<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\contactmodel;

class contactcontroller extends Controller
{
     function contacttindex()
    {

        return view('/contact');
    }

    //to fetch contact content into admin panel

    function getcontactindex()
    {
    $result=json_decode(contactmodel::orderby('id','desc')->get());

    return $result;
    }  
    
    // project delete code

  function contactdelete(Request $req){
    
    $id=$req->input('id');

    $result=contactmodel::where('id','=',$id)->delete();
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }

  }  
}
