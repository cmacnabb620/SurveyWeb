<?php

namespace App\Http\Controllers\ProjectManager\ManageSurveyors;
use App\Http\Controllers\Controller;


class InactiveSurveyorController extends Controller {


    public function index(){
        
        return view('ProjectManager.ManageSurveyors.InactiveSurveyors.manage_inactive_surveyors');
    }

    public function detailViewSurveyor(){
        
        return view('ProjectManager.ManageSurveyors.InactiveSurveyors.detail_view_inactive_surveyor');
    }

}






