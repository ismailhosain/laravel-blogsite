<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\photomodel;

class photocontroller extends Controller
{
   function photoindex()
   {
    return view('/photo');
   }


   function photoselect(){
     $result= photomodel::take(6)->get();
     return $result;
   }

   // photo load on page


   function photoload(Request $req){

      $firstid=$req->id;
      $lastid=$firstid+6;

      return photomodel::where('id','>=',$firstid)->where('id','<',$lastid)->get();



   }


  function photoupload(Request $req){

   $photoindex=$req->file('photo')->store('public');


   $photoname=(explode('/',$photoindex))[1];

   $host=$_SERVER['HTTP_HOST'];

   $photopath="http://".$host."/storage/".$photoname;

   $result=photomodel::insert(['location'=>$photopath]);

   return $result;

  }


}
