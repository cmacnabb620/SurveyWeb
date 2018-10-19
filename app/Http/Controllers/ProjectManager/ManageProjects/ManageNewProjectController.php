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
use Mail;
use Exception;


class ManageNewProjectController extends Controller {


    public function index(){
         $projects = Project::where('project_manager_id',Auth::user()->user_id)->where('admin_posted', '!=', NULL)->where('project_status', 1 )->get()->all();
         //dd($projects);
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
         
        return view('ProjectManager.ManageProjects.NewProjects.manage_new_projects',compact('project_data'));
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

	    return view('ProjectManager.ManageProjects.NewProjects.detail_view_project',compact('data','languages','survey_types','language_ids','survey_type_ids'));
    }

    public function setProjectDuration($projectid){

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
      return view('ProjectManager.ManageProjects.NewProjects.set_project_duration',compact('data','project','language','survey_type'));
    }

     public function updateProjectDate(Request $request){

      $rules = array(
            'start_date' => 'required',
            'end_date' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
          return redirect()->back()->withErrors('error', 'All Fields are Required');
         /*return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);*/
        }else{
             $update_project_date = Project::where('project_id',$request->project_id)->first();
             $update_project_date->start_date = date("Y/m/d",strtotime($request->start_date));
             $update_project_date->end_date = date("Y/m/d",strtotime($request->end_date));
             //changing the project status from Prospective to Active
             $update_project_date->project_status = 2 ;
             $update_project_date->save();

            //mail link sent to client for roster data update start
            $client_record=Client::where('client_id',$update_project_date->client_id)->first();
            $client_contact=Contact::where('client_id',$update_project_date->client_id)->first();
            $data = array('client_id'=>Hashids::encode($client_record->client_id),'email'=>Crypt::decryptString($client_contact->email),'client_name'=>Crypt::decryptString($client_record->name),'project_id'=>Hashids::encode($update_project_date->project_id),'project_name' =>$update_project_date->project_name ,"body" => "Invitation to client for upload rosterdata");

            $mail_sent=Mail::send('Email.client_roster_data_load_link', $data, function($message) use ($data){
              $message->to($data['email'], 'Receiver')
                        ->subject('Crossroads Group Request For Load Rosterdata');
                $message->from('muralidharan.bora@gmail.com','Sender');         
            });
            //mail link sent to client for roster data update start

                
          // return response()->json(['status' => 'success', 'message' => "Project Dates are Updated"]);
          return redirect('project_manager/active_projects')->with('message', 'Project Dates are updated successfully.');
        }

    }

    public function makePost($projectid){
        $project_id=Hashids::decode($projectid);

        $project = Project::where('project_id',$project_id)->count();

        if($project >= 0){
         
          $project = Project::where('project_id',$project_id)->first();         
          $current_time = Carbon::now();
          $project->pm_posted = $current_time->toDateTimeString();
          $project->save();
          return redirect()->back()->with('message', 'Project is posted successfully.');  
        
        }else{

           return redirect()->back()->with('error', 'Project not found.');  
        }    
    }

    /*public function removePost($projectid){
        $project_id=Hashids::decode($projectid);

        $project = Project::where('project_id',$project_id)->count();

        if($project >= 0){
          $project = Project::where('project_id',$project_id)->first(); 
          $project->pm_posted = NULL;
          $project->save();
          return redirect()->back()->with('message', 'Project is not posted.');  
        
        }else{

           return redirect()->back()->with('error', 'Project not found.');  
        }  

    }*/  
}






