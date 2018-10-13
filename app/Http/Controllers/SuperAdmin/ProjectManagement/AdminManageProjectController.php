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

class AdminManageProjectController extends Controller {
  
    public function index(){
         $projects=Project::all();
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
         //return $project_data;
        return view('Admin.Projects.ManageProject.admin_manage_projects',compact('project_data'));
    }

    public function addProject(){
          $language           = Language::get()->all();
          $survey_type        = SurveyType::get()->all();
          $report_freq        = ReportFreq::get()->all(); 
          $status             = Status::get()->all();
          $clients            = Client::get()->all();
        $project_managers   = \EnvatoUser::user_type_list(2);
        // dd($stat(filename)atus);
        return view('Admin.Projects.ManageProject.add_new_project',compact('language','survey_type','status','project_managers','clients','report_freq'));
    }    

    public function storeProject(Request $request){
        $rules = array('project_name' => 'required','project_manager_id' => 'required','client_id' => 'required','report_frequency_id' => 'required','survey_type_id' => 'required','language_id' => 'required','language_id' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{
           $project_check = Project::where('project_name',$request->get('project_name'))->count();
           if($project_check >=1){
           return response()->json(['status' => 'fail', 'message' => "Project Name Already Existed."]);
           }else{
            $current_time = Carbon::now();
            $add_new_project = new Project;
            $add_new_project->project_name = $request->get('project_name');
            $add_new_project->client_id = $request->get('client_id');
            $add_new_project->project_manager_id = $request->get('project_manager_id');
            $add_new_project->language_id  = $request->get('language_id');
            $add_new_project->survey_type_id = $request->get('survey_type_id');
            $add_new_project->report_freq_id = $request->get('report_frequency_id');
            $add_new_project->project_status = $request->get('status_id');
            $add_new_project->last_update = $current_time->toDateTimeString();
            $add_new_project->save();
            //mail link sent to client for roster data update start
           /* $client_record=Client::where('client_id',$request->get('client_id'))->first();
            $data = array('id'=>Hashids::encode($user_table_insert->user_id),'email'=>$request->get('email'),'fname'=>$request->get('fname'),'lname'=>$request->get('lname'),'user_name' =>$user_table_insert->username ,"body" => "Test mail","user_type" => $user_type->user_type_desc);
            $mail_sent=Mail::send('Email.password-setup', $data, function($message) use ($data){
              $message->to($data['email'], 'Receiver')
                        ->subject('Crossroads Group Request For Set Password');
                $message->from('muralidharan.bora@gmail.com','Sender');         
            });*/
            //mail link sent to client for roster data update start
            return response()->json(['status' => 'success', 'message' => "Project Stored Successfully."]);
           }
           
        }
        
    } 

    public function updateProject(Request $request){
      // return $request->all();
        $rules = array('project_name' => 'required','project_original_name' => 'required','project_manager_id' => 'required','client_id' => 'required','report_frequency_id' => 'required','survey_type_id' => 'required','language_id' => 'required','language_id' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{
  
        if($request->get('project_name') == $request->get('project_original_name')){
          
        $update_project = Project::where('project_id',$request->project_id)->first();
          $current_time = Carbon::now();
          $update_project->project_name = $request->get('project_name');
          $update_project->client_id = $request->get('client_id');
          $update_project->project_manager_id = $request->get('project_manager_id');
          $update_project->language_id  = $request->get('language_id');
          $update_project->survey_type_id = $request->get('survey_type_id');
          $update_project->report_freq_id = $request->get('report_frequency_id');
          $update_project->project_status = $request->get('status_id');
          $update_project->last_update = $current_time->toDateTimeString();
          $update_project->save();
          return response()->json(['status' => 'success', 'message' => "Project Updated Successfully."]);        
        }else{

          $project_check = Project::where('project_name',$request->project_name)->count();
          
          if($project_check == 0){

            $update_project = Project::where('project_id',$request->project_id)->first();
              $current_time = Carbon::now();
              $update_project->project_name = $request->get('project_name');
              $update_project->client_id = $request->get('client_id');
              $update_project->project_manager_id = $request->get('project_manager_id');
              $update_project->language_id  = $request->get('language_id');
              $update_project->survey_type_id = $request->get('survey_type_id');
              $update_project->report_freq_id = $request->get('report_frequency_id');
              $update_project->project_status = $request->get('status_id');
              $update_project->last_update = $current_time->toDateTimeString();
              $update_project->save();
              return response()->json(['status' => 'success', 'message' => "Project Updated Successfully."]); 
          }else{
            return response()->json(['status' => 'fail', 'message' => "Project Name Already Existed."]);
          /*return redirect()->to('admin/edit_survey_type/'.Hashids::encode($request->get('survey_id')))->with('fail', 'Sorry, Survey Type Already Existed');*/
          }

        
        }
        
      }
        
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
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;
         }
         // return $data;
	    return view('Admin.Projects.ManageProject.admin_project_info',compact('data'));
    }

    public function editProject($projectid){
        $language           = Language::get()->all();
        $survey_type        = SurveyType::get()->all();
        $report_freq        = ReportFreq::get()->all(); 
        $status             = Status::get()->all();
        $clients            = Client::get()->all();
        $project_managers   = \EnvatoUser::user_type_list(2);
        // dd($stat(filename)atus);
        $project_id=Hashids::decode($projectid);
        $project=Project::where('project_id',$project_id)->first();
         $data=[];
         if(!empty($project)){
          $data['project_name']=$project->project_name;
          $data['report_freq_id']=$project->report_freq_id;
          $data['project_report_frequency']=\EnvatoUser::get_report_frequeny($project->report_freq_id);
          $data['client_id']= $project->client_id;
          $data['client_name']=\EnvatoUser::get_client_full_name($project->client_id);
          $data['org_abbrev']=\EnvatoUser::get_client_org_name($project->client_id);
          $data['client_type']=\EnvatoUser::get_client_type($project->client_id);
          $client_record=Client::where('client_id',$project->client_id)->first();
          $data['client_address']=\EnvatoUser::get_client_address($client_record->address_id);
          $data['project_manager_name']=\EnvatoUser::get_user_full_name($project->project_manager_id);
          $data['project_manager_id']=$project->project_manager_id;
          $data['project_status_id']=$project->project_status;
          $data['project_status']=\EnvatoUser::get_project_status($project->project_status);
          $data['survey_type_id']=$project->survey_type_id;
          $data['survey_type']=\EnvatoUser::get_survey_type($project->survey_type_id);
          $data['language_id']=$project->language_id;
          $data['project_language']=\EnvatoUser::project_related_language($project->language_id);
          $data['last_update']=$project->last_update;
          $data['project_id']=$project->project_id;

          // echo "<pre>";print_r($data);echo "</pre>"; exit;
         }
        return view('Admin.Projects.ManageProject.admin_edit_project',compact('language','survey_type','status','project_managers','clients','report_freq','data'));
    }

  public function deleteProject($projectid){
     $project_record=Hashids::decode($projectid);
     $project_delete=Project::where('project_id',$project_record)->delete();
     return redirect()->back()->with('message','Project Deleted Successfully');
  }

    public function addNewSurveyType(Request $request){
        $rules = array(
            'mysurveytypeform' => 'required|unique:survey_type,survey_type',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{
           $current_time = Carbon::now();
           $survey_type  = new SurveyType();
           $survey_type->survey_type=$request->get('mysurveytypeform');
           $survey_type->last_update= $current_time->toDateTimeString();
           $survey_type->save();

           return 'success';
        }
      
    }

    public function addNewClient(Request $request){
       $rules = array('client_name' => 'required','org_abbrev' => 'required','client_type' => 'required', 'address_1' => 'required', 'address_2' => 'required','country' => 'required','state' => 'required','city' => 'required','phone' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{
           
               $client_details                  =   new Client();
               $client_details->client_id       =   $request->get('client_id');
               $client_details->namespace       =   $request->get('client_name');
               $client_details->org_abbrev      =   $request->get('org_abbrev');
               $client_details->client_id       =   $request->get('client_type');
               $client_details->address_id      =   $request->get('address_1');
               $client_details->client_type     =   $request->get('client_type');
               $client_details->client_status   =   $request->get('client_status');
               $survey_type->last_update        =   $current_time->toDateTimeString();
               $survey_type->save();
               return 'success';
        }

    }

    public function addNewLanguage(Request $request){
      $rules = array(
            'new_language' => 'required|unique:language,language',
            'new_iso_name' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{
           $current_time = Carbon::now();
           $new_language=new Language();
           $new_language->language=$request->get('new_language');
           $new_language->iso_name=$request->get('new_iso_name');
           $new_language->last_update= $current_time->toDateTimeString();
           $new_language->save();
           return 'success';
        }
    }

    public function makePost($projectid){
        $project_id=Hashids::decode($projectid);

        $project = Project::where('project_id',$project_id)->count();

        if($project >= 0){
         
          $project = Project::where('project_id',$project_id)->first();         
          $current_time = Carbon::now();
          $project->posted = $current_time->toDateTimeString();
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
          $project->posted = NULL;
          $project->save();
          return redirect()->back()->with('message', 'Project is not posted.');  
        
        }else{

           return redirect()->back()->with('error', 'Project not found.');  
        }  

    }*/
}






