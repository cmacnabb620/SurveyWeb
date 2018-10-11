<?php

namespace App\Http\Controllers\QualityUser;
use App\Http\Controllers\Controller;


class QualityUserDashboardController extends Controller {

//Admin Login Form displayed
    public function index(){
        
        return view('QualityUser.quality_user_dashboard');
    }


}






