<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitormodel;

class visitorController extends Controller
{
    
    function visitorindex(){

    $visitordata=json_decode(visitormodel::all());

    return view('visitor',['visitordata'=> $visitordata]);
}
}
