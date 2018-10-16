<?php

namespace App\Http\Controllers\SuperAdmin\ProjectManagement;
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
use App\Models\DistType;
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


class ProjectSettingsController extends Controller {


    public function index(){
        $freq_types_count =   ReportFreq::count();
        $clients_count= Client::join('address as addrs', 'addrs.address_id', '=', 'client.address_id')
                   ->select('*')
                   ->count();
        $dist_types_count  =   DistType::count();
        $languages_count  =   Language::count();
        $survey_types_count  =  SurveyType::count();
        return view('Admin.Projects.ProjectSettings.project_setting',compact('freq_types_count','clients_count','dist_types_count','languages_count','survey_types_count'));
    }
}






