<?php

namespace App\Http\Controllers\ProjectManager\ManageProjects;
use App\Http\Controllers\Controller;


class ActiveProjectController extends Controller {


    public function index(){
        
        return view('ProjectManager.ManageProjects.ActiveProjects.manage_active_projects');
    }

    public function detailViewProject(){
        
        return view('ProjectManager.ManageProjects.ActiveProjects.detail_view_project');
    }

}






