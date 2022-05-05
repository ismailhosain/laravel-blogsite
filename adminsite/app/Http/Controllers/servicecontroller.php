<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\servicemodel;

class servicecontroller extends Controller
{
   
    function serviceindex(){

        return view('/service');

}
  
  function getserviceindex(){

    $result=json_decode(servicemodel::all());

    return $result;

  }  

  //indivisual id edit function

  function servicedetails(Request $req){

     $id=$req->input('id');

    $result=servicemodel::where('id','=',$id)->get();

    return $result;

  } 





// service delete code

  function servicedelete(Request $req){
    
    $id=$req->input('id');

    $result=servicemodel::where('id','=',$id)->delete();
    
    if($result==true){
      return 1;
    }else{
      return 0;
    }

  }


}
