<?php

namespace App\Http\Controllers\Surveyor;
use App\Http\Controllers\Controller;


class SurveyorDashboardController extends Controller {

//Surveyor Login Form displayed
    public function index(){
        
        return view('Surveyor.surveyor_dashboard');
    }


}






