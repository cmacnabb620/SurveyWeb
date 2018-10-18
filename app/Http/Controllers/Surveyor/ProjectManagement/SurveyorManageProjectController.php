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
use Carbon\CarbonInterval;
use Mail;
use Exception;


class SurveyorManageProjectController extends Controller {


    public function workingProjects(){
    	$projects = Project::where('admin_posted', '!=', NULL)->where('project_status', 1 )->get()->all();
         // dd($projects);
         $data=[];
         if(!empty($projects)){
          foreach($projects as $project){
          $data['project_name']=$project->project_name;
          $data['client_id']=$project->client_id;
          $data['client_name']=\EnvatoUser::get_client_full_name($project->client_id);
          $data['project_manager_name']=\EnvatoUser::get_user_full_name($project->project_manager_id);
          $data['project_status']=\EnvatoUser::get_project_status($project->project_status);
          if($project->start_date != NULL){
           $data['start_date']=date("m/d/Y", strtotime($project->start_date));
          }else{
           $data['start_date']="";
          }
          if($project->end_date != NULL){
          $data['end_date']=date("m/d/Y", strtotime($project->end_date));
          }else{
            $data['end_date']="";
          }
          $data['last_update']=$project->last_update;
          $data['admin_posted']=$project->admin_posted;
          $data['pm_posted']=$project->pm_posted;
          $data['project_id']=$project->project_id;
          $current_time_date_now  = Carbon::now();
          $admin_posted_date_time = Carbon::parse($project->admin_posted);
          $data['admin_posted_days_cont']= $admin_posted_date_time->diffInDays($current_time_date_now);
          $project_data[]=$data;
          }
         }

      return view('Surveyor.Projects.manage_working_projects',compact('project_data','project'));
         
    }

    public function completedProjects(){
      $projects = Project::where('admin_posted', '!=', NULL)->where('project_status', 5 )->get()->all();
      $data=[];
         if(!empty($projects)){
          foreach($projects as $project){
          $data['project_name']=$project->project_name;
          $data['client_id']=$project->client_id;
          $data['client_name']=\EnvatoUser::get_client_full_name($project->client_id);
          $data['project_manager_name']=\EnvatoUser::get_user_full_name($project->project_manager_id);
          $data['project_status']=\EnvatoUser::get_project_status($project->project_status);
          if($project->start_date != NULL){
           $data['start_date']=date("m/d/Y", strtotime($project->start_date));
          }else{
           $data['start_date']="";
          }
          if($project->end_date != NULL){
          $data['end_date']=date("m/d/Y", strtotime($project->end_date));
          }else{
            $data['end_date']="";
          }
          $data['last_update']=$project->last_update;
          $data['admin_posted']=$project->admin_posted;
          $data['pm_posted']=$project->pm_posted;
          $data['project_id']=$project->project_id;
          $current_time_date_now  = Carbon::now();
          $admin_posted_date_time = Carbon::parse($project->admin_posted);
          $data['admin_posted_days_cont']= $admin_posted_date_time->diffInDays($current_time_date_now);
          $project_data[]=$data;
          }
         }
      return view('Surveyor.Projects.manage_completed_projects',compact('project_data','project'));
         
    }
    
    public function workingProjectInfo($projectid){
      $project_id=Hashids::decode($projectid);
      $project=Project::where('project_id',$project_id)->first();
      $languages = Language::get()->all();
      $survey_types = SurveyType::get()->all();   
         $data=[];
         if(!empty($project)){
          $language_ids= explode(',',$project->language_id);
          $survey_type_ids= explode(',',$project->survey_type_id);
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
          $data['start_date']=$project->start_date;
          $data['end_date']=$project->end_date;
          $data['admin_posted']=$project->admin_posted;
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;
          $data['project_start_enddate_days_count']= Carbon::parse($project->start_date)->diffInDays(Carbon::parse($project->end_date));
          $data['roster_data_loop_count'] = ceil($data['project_start_enddate_days_count'] / 7);
          $data['weeks_count']=  CarbonInterval::days($data['project_start_enddate_days_count']);
         }
         // print_r($data['roster_data_loop_count']);
      return view('Surveyor.Projects.working_project_info',compact('data','languages','survey_types','language_ids','survey_type_ids'));
    }

    public function completedProjectInfo($projectid){
      $project_id   = Hashids::decode($projectid);
      $project      = Project::where('project_id',$project_id)->first();
      $languages    = Language::get()->all();
      $survey_types = SurveyType::get()->all();   
         $data=[];
         if(!empty($project)){
          $language_ids= explode(',',$project->language_id);
          $survey_type_ids= explode(',',$project->survey_type_id);
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
          $data['start_date']=$project->start_date;
          $data['end_date']=$project->end_date;
          $data['admin_posted']=$project->admin_posted;
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;
          $data['project_start_enddate_days_count']= Carbon::parse($project->start_date)->diffInDays(Carbon::parse($project->end_date));
          $data['roster_data_loop_count'] = ceil($data['project_start_enddate_days_count'] / 7);
          $data['weeks_count']=  CarbonInterval::days($data['project_start_enddate_days_count']);
         }
         // print_r($data['roster_data_loop_count']);
      return view('Surveyor.Projects.completed_project_info',compact('data','languages','survey_types','language_ids','survey_type_ids'));
    }

    
}






