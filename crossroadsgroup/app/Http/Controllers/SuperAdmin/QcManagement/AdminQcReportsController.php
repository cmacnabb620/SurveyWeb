<?php

namespace App\Http\Controllers\SuperAdmin\QcManagement;
use App\Http\Controllers\Controller;


class AdminQcReportController extends Controller {


    public function index(){
        
        return view('Admin.QcReports.admin_qcreports');
    }

    public function viewQcReport(){

    	return view('Admin.QcReports.view_admin_qcreports');
    }
}






