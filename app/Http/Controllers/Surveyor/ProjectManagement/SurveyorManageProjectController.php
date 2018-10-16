<?php

namespace App\Http\Controllers\Surveyor\ProjectManagement;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Tag;
use App\Models\Language;
use App\Models\Project;
use App\Models\SurveyType;
use App\Models\ReportFreq;
use App\Models\Client;
use App\Models\Status;
use App\Models\TagBridge;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Crypt;
use Response;
use Carbon\Carbon;
use Mail;
use Exception;


class SurveyorManageProjectController extends Controller {


    public function index(){
      return view('Surveyor.Projects.manage_working_projects');
         
    }

    public function completedProjects(){
      return view('Surveyor.Projects.manage_completed_projects');
         
    }
    
    public function projectInfo($projectid){
      return "project info page";
    }

    
}






