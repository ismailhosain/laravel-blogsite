<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coursemodel;

class coursecontroller extends Controller
{
    function courseindex(){
        $coursesdata=json_decode(coursemodel::all());

        return view('/course',['coursedata'=>$coursesdata]);
    }
}
