<?php

namespace App\Http\Controllers\ProjectManager\ManageProjects;
use App\Http\Controllers\Controller;


class CompletedProjectController extends Controller {


    public function index(){
        
      return view('ProjectManager.ManageProjects.CompletedProjects.manage_completed_projects');
    }

    public function detailViewProject(){
        
      return view('ProjectManager.ManageProjects.CompletedProjects.detail_view_completed_project');
    }

}






