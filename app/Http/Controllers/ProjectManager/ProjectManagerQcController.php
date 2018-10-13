<?php

namespace App\Http\Controllers\ProjectManager;
use App\Http\Controllers\Controller;


class ProjectManagerQcController extends Controller {


    public function index(){
        
        return view('ProjectManager.QcReports.manage_qc_reports');
    }

    public function viewQcReport(){
        
        return view('ProjectManager.QcReports.view_qc_report');
    }

}






