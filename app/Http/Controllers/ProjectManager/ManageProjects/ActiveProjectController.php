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
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Mail;
use Exception;


class ActiveProjectController extends Controller {


    public function index(){
        $projects = Project::where('project_manager_id',Auth::user()->user_id)->where('admin_posted', '!=', NULL)->where('project_status', 1 )->get()->all();
         // dd($projects);
         $data=[];
         if(!empty($projects)){
          foreach($projects as $project){
          $data['project_name']=$project->project_name;
          $data['client_name']=\EnvatoUser::get_client_full_name($project->client_id);
          $data['project_manager_name']=\EnvatoUser::get_user_full_name($project->project_manager_id);
          $data['project_status']=\EnvatoUser::get_project_status($project->project_status);
          $data['last_update']=$project->last_update;
          $data['admin_posted']=$project->admin_posted;
          $data['pm_posted']=$project->pm_posted;
          $data['project_id']=$project->project_id;
          $project_data[]=$data;
          }
         }
         // return $project_data;
     return view('ProjectManager.ManageProjects.ActiveProjects.manage_active_projects',compact('project_data'));
    }

    public function projectInfo($projectid){

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
          $data['admin_posted']=$project->admin_posted;
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;
          $data['project_start_enddate_days_count']= Carbon::parse($project->start_date)->diffInDays(Carbon::parse($project->end_date));
          $data['roster_data_loop_count'] = ceil($data['project_start_enddate_days_count'] / 7);
          $data['weeks_count']=  CarbonInterval::days($data['project_start_enddate_days_count']);
         }

         $weeks_count = ceil($data['project_start_enddate_days_count'] / 7);
        
         $end_date = new \Carbon\Carbon($project->end_date);
         $w=1;
         $start_date=[];
         $projectdatest=Session::get('sessiond');;
         for($w=1; $w<=$weeks_count;$w++){
          if($w == 1){
            $start_dateeee = new \Carbon\Carbon($project->start_date);
          }
          $start_dateeee = new \Carbon\Carbon($projectdatest);
          $start_date = $start_dateeee->addDays(7);
          Session::put('sessiond', $start_date);
          $gg[]=$start_date;
         }
         return $gg;
        

            /*$period = CarbonPeriod::between(Carbon::parse($project->start_date)->format('Y-m-d'), Carbon::parse($project->end_date)->format('Y-m-d'));
                $weekendFilter = function ($date) {
                    return $date->isWeekend();
                };
                $period->filter($weekendFilter);

                $days = [];
                foreach ($period as $date) {
                    $days[] = $date->format('m-d-Y');
                }
                return $dates= implode(', ', $days);*/
        return view('ProjectManager.ManageProjects.ActiveProjects.detail_view_active_project',compact('data','project','languages','survey_types','language_ids','survey_type_ids'));
    }

    public function makeSchedule($projectid){

         $project_id   = Hashids::decode($projectid);
         $project      = Project::where('project_id',$project_id)->first();
         $language     = Language::get()->all();
         $survey_type  = SurveyType::get()->all();
         $surveyors_id = User::where('user_type_id', 3)->orwhere('user_type_id', 4)->orwhere('user_type_id', 5)->pluck('contact_id');
         $surveyors_name = Contact::where('contact_id', $surveyors_id)->pluck('first_name','last_name');
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
          $data['survey_type_id']=$project->survey_type_id;
          $data['survey_type']=\EnvatoUser::get_survey_type($project->survey_type_id);
          $data['project_language_id']=$project->language_id;
          $data['project_language']=\EnvatoUser::project_related_language($project->language_id);
          $data['admin_posted']=$project->admin_posted;
          $data['start_date']=$project->start_date;
          $data['end_date']=$project->end_date;
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;
         }
         // echo "<pre>";print_r($survey_type);echo "</pre>";exit;
         // return $data;
      return view('ProjectManager.ManageProjects.ActiveProjects.make_schedule',compact('data','project','language','survey_type'));
    }
}






