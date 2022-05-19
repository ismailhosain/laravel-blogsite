<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectmodel;

class projectcontroller extends Controller
{
    function projectindex(){
        $projectdata=json_decode(projectmodel::all());
        return view('/project',['projectdetails'=>$projectdata]);
        
    }
}
