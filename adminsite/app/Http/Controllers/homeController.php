<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\visitormodel;
use App\Models\servicemodel;
use App\Models\coursemodel;
use App\Models\projectmodel;
use App\Models\contactmodel;
use App\Models\reviewmodel;



class homeController extends Controller
{
     function homeindex(){

      $visitordata=json_decode(visitormodel::count());

      $servicedata=json_decode(servicemodel::count());

      $coursedata=json_decode(coursemodel::count());

      $projectdata=json_decode(projectmodel::count());

      $contactdata=json_decode(contactmodel::count());

      $reviewdata=json_decode(reviewmodel::count());

        return view('/home',[

         'visitorcount'=>$visitordata,

         'servicecount'=>$servicedata,

         'coursecount'=>$coursedata,

         'projectcount'=>$projectdata,

         'contactcount'=>$contactdata,

         'reviewcount'=>$reviewdata,

        ]);

    }
}
