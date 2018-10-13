<?php

namespace App\Http\Controllers\ProjectManager\ManageSurveyors;
use App\Http\Controllers\Controller;


class TraineeSurveryorController extends Controller {


    public function index(){
        
        return view('ProjectManager.ManageSurveyors.TraineeSurveyors.manage_trainee_surveyors');
    }

    public function detailViewSurveyor(){
        
       return view('ProjectManager.ManageSurveyors.TraineeSurveyors.detail_view_trainee_surveyor');
    }

}






