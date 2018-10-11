<?php

namespace App\Http\Controllers\ProjectManager\ManageSurveyors;
use App\Http\Controllers\Controller;


class ProspectiveSurveyorController extends Controller {


    public function index(){
        
        return view('ProjectManager.ManageSurveyors.ProspectiveSurveyors.manage_prospective_surveyors');
    }

    public function detailViewSurveyor(){
        
    	return view('ProjectManager.ManageSurveyors.ProspectiveSurveyors.detail_view_prospective_surveyor');
    }

}






