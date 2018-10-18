<?php

namespace App\Http\Controllers\QualityUser\MySurveyorManagement;
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
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Mail;
use Exception;


class MySurveyorController extends Controller {

    public function index(){
      $active_surveyors = \EnvatoUser::user_type_list(5);
      
      return view('QualityUser.MySurveyors.my_surveyors',compact('active_surveyors'));
    }

    public function surveyorProjectInfo($userid, $usertypeid){

      return view('QualityUser.MySurveyors.surveyor_projects_info');		
    }
}






