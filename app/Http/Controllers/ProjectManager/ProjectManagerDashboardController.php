<?php

namespace App\Http\Controllers\ProjectManager;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Carbon\Carbon;
use Browser;
use App\Models\UserLoginTime;
use Vinkla\Hashids\Facades\Hashids;


class ProjectManagerDashboardController extends Controller {


    public function index(){  
	    if(Auth::check()){ 
	        return view('ProjectManager.project_manager_dashboard');
		}else{
			return redirect()->to('/')->with('after-logout-access-dashboard', 'Sorry, you can not access dashboard with out Login.');
		}
    }


}






