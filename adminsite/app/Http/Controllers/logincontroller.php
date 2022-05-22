<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\loginmodel;

class logincontroller extends Controller
{
    function loginindex()
    {
        return view('/adminlogin');
    }

   function onlogout(Request $req)
   {
            $req->session()->flush();
            return redirect('/login');
   }


    function onlogin(Request $req){

        $adminname=$req->input('name');
        $adminpassword=$req->input('password');

       $loginmatch=loginmodel::where('name','=',$adminname)->where('password','=',$adminpassword)->count();

       if($loginmatch == 1){

            $req->session()->put('username',$adminname);
            return 1;

       }else{
        return 0;
       }

    }


}
