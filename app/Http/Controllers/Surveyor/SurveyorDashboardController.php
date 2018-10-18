<?php

namespace App\Http\Controllers\Surveyor;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Crypt;
use Response;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Mail;
use Exception;


class SurveyorDashboardController extends Controller {


    public function index(){  
	    if(Auth::check()){ 

	    	$working_projects   = Project::where('project_status',1)->count();
	    	$completed_projects = Project::where('project_status',5)->count();

	        return view('Surveyor.surveyor_dashboard', compact('working_projects','completed_projects'));
		
		}else{
			return redirect()->to('/')->with('after-logout-access-dashboard', 'Sorry, you can not access dashboard with out Login.');
		}
    }
}






