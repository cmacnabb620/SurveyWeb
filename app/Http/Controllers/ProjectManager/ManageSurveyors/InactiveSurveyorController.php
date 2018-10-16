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


class InactiveSurveyorController extends Controller {


    public function index(){
        $inactive_surveyors= \EnvatoUser::user_type_list(8);
        return view('ProjectManager.ManageSurveyors.InactiveSurveyors.manage_inactive_surveyors',compact('inactive_surveyors'));
    }

    public function detailViewSurveyor(){
        
        return view('ProjectManager.ManageSurveyors.InactiveSurveyors.detail_view_inactive_surveyor');
    }

}






