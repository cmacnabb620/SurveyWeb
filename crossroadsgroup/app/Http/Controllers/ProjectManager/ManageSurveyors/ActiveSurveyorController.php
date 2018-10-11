<?php

namespace App\Http\Controllers\ProjectManager\ManageSurveyors;
use App\Http\Controllers\Controller;


class ActiveSurveyorController extends Controller {


    public function index(){
        
        return view('ProjectManager.ManageSurveyors.ActiveSurveyors.manage_active_surveyors');
    }

    public function detailViewSurveyor(){
        
        return view('ProjectManager.ManageSurveyors.ActiveSurveyors.detail_view_surveyor');
    }

}






