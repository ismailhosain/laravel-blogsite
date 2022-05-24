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

  function photoupload(Request $req){

   $photoindex=$req->file('photo')->store('public');


   $photoname=(explode('/',$photoindex))[1];

   $host=$_SERVER['HTTP_HOST'];

   $photopath="http://".$host."/storage/".$photoname;

   $result=photomodel::insert(['location'=>$photopath]);

   return $result;

  }


}
