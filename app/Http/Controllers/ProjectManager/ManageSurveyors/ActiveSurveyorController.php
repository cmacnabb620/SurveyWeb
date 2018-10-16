<?php

namespace App\Http\Controllers\ProjectManager\ManageSurveyors;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Tag;
use App\Models\TagBridge;
use App\Models\SurveyorAdditionalInfo;
use App\Models\SurveyorTypeChangingDate;
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


class ActiveSurveyorController extends Controller {


    public function index(){
    	$active_surveyors = \EnvatoUser::user_type_list(5);
        
        return view('ProjectManager.ManageSurveyors.ActiveSurveyors.manage_active_surveyors',compact('active_surveyors'));
    }

    public function detailViewSurveyor($userid, $usertypeid){
        
        return view('ProjectManager.ManageSurveyors.ActiveSurveyors.detail_view_surveyor');
    }

}






