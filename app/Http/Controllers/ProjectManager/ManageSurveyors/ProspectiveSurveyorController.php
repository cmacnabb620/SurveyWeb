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


class ProspectiveSurveyorController extends Controller {


    public function index(){
        $prospective_surveyors= \EnvatoUser::user_type_list(3);
        return view('ProjectManager.ManageSurveyors.ProspectiveSurveyors.manage_prospective_surveyors',compact('prospective_surveyors'));
    }

    public function detailViewSurveyor(){
        
    	return view('ProjectManager.ManageSurveyors.ProspectiveSurveyors.detail_view_prospective_surveyor');
    }

}






