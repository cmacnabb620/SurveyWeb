<?php

namespace App\Http\Controllers\ProjectManager\ManageProjects;
use App\Http\Controllers\Controller;


class DelayProjectController extends Controller {


    public function index(){
        
        return view('ProjectManager.ManageProjects.DelayProjects.manage_delay_projects');
    }

    public function detailViewProject(){
        
        return view('ProjectManager.ManageProjects.DelayProjects.detail_view_delay_project');
    }

}






