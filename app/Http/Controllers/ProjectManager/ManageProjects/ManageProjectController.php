<?php

namespace App\Http\Controllers\ProjectManager\ManageProjects;
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


class ManageProjectController extends Controller {


    public function index(){
         $projects = Project::where('project_manager_id',Auth::user()->user_id)->where('posted', '!=', NULL)->get()->all();
         // dd($projects);
         $data=[];
         if(!empty($projects)){
          foreach($projects as $project){
          $data['project_name']=$project->project_name;
          $data['client_name']=\EnvatoUser::get_client_full_name($project->client_id);
          $data['project_manager_name']=\EnvatoUser::get_user_full_name($project->project_manager_id);
          $data['project_status']=\EnvatoUser::get_project_status($project->project_status);
          $data['last_update']=$project->last_update;
          $data['posted']=$project->posted;
          $data['project_id']=$project->project_id;
          $project_data[]=$data;
          }
         }
         // return $project_data;
        return view('ProjectManager.ManageProjects.NewProjects.manage_projects',compact('project_data'));
    }
    
    public function projectInfo($projectid){
      $project_id=Hashids::decode($projectid);
      $project=Project::where('project_id',$project_id)->first();
         $data=[];
         if(!empty($project)){
          $data['project_name']=$project->project_name;
          $data['project_report_frequency']=\EnvatoUser::get_report_frequeny($project->report_freq_id);
          $data['client_name']=\EnvatoUser::get_client_full_name($project->client_id);
          $data['org_abbrev']=\EnvatoUser::get_client_org_name($project->client_id);
          $data['client_type']=\EnvatoUser::get_client_type($project->client_id);
          $client_record=Client::where('client_id',$project->client_id)->first();
          $data['client_address']=\EnvatoUser::get_client_address($client_record->address_id);
          $data['project_manager_name']=\EnvatoUser::get_user_full_name($project->project_manager_id);
          $data['project_status']=\EnvatoUser::get_project_status($project->project_status);
          $data['survey_type']=\EnvatoUser::get_survey_type($project->survey_type_id);
          $data['project_language']=\EnvatoUser::project_related_language($project->language_id);
          $data['posted']=$project->posted;
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;
         }
         //return $data;
	    return view('ProjectManager.ManageProjects.NewProjects.detail_view_project',compact('data'));
    }

    public function makeSchedule($projectid){

         $project_id = Hashids::decode($projectid);
         $project    = Project::where('project_id',$project_id)->first();
         $surveyors  = 
         $data=[];
         if(!empty($project)){
          $data['project_name']=$project->project_name;
          $data['project_report_frequency']=\EnvatoUser::get_report_frequeny($project->report_freq_id);
          $data['client_name']=\EnvatoUser::get_client_full_name($project->client_id);
          $data['org_abbrev']=\EnvatoUser::get_client_org_name($project->client_id);
          $data['client_type']=\EnvatoUser::get_client_type($project->client_id);
          $client_record=Client::where('client_id',$project->client_id)->first();
          $data['client_address']=\EnvatoUser::get_client_address($client_record->address_id);
          $data['project_manager_name']=\EnvatoUser::get_user_full_name($project->project_manager_id);
          $data['project_status']=\EnvatoUser::get_project_status($project->project_status);
          $data['survey_type']=\EnvatoUser::get_survey_type($project->survey_type_id);
          $data['project_language']=\EnvatoUser::project_related_language($project->language_id);
          $data['posted']=$project->posted;
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;
         }
         //return $data;
      return view('ProjectManager.ManageProjects.NewProjects.make_schedule',compact('data'));
    }
}






