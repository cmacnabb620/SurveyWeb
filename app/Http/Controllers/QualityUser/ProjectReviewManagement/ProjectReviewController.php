<?php

namespace App\Http\Controllers\QualityUser\ProjectReviewManagement;
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


class ProjectReviewController extends Controller {

    public function index(){
      $projects = Project::where('admin_posted', '!=', NULL)->where('project_status', 1 )->get()->all();
      // dd($projects);
      $data=[];
         if(!empty($projects)){
          foreach($projects as $project){
          $data['project_name']=$project->project_name;
          $data['project_report_frequency']=\EnvatoUser::get_report_frequeny($project->report_freq_id);
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

      return view('QualityUser.ProjectReviews.qc_projects_reviews',compact('project_data'));
    }

    public function viewReview($projectid){

      return view('QualityUser.ProjectReviews.review_project_info');
    }

}






