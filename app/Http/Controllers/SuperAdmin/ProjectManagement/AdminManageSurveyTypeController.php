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


class AdminManageSurveyTypeController extends Controller {


    public function index(){
        
        $survey_types	=	SurveyType::all();
        // dd($survey_types);

        return view('Admin.Projects.ManageSurveyType.manage_survey_types',compact('survey_types'));
    }

    public function addNewSurveyType(Request $request){
            
        $rules = array(
            'survey_type' => 'required|unique:survey_type,survey_type',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            if(empty($request->survey_type)){
            
            return redirect()->back()->with('error', 'Survey Type is Required');
            }else{
                
                return redirect()->back()->withErrors($validator)->withInput();
                $this->throwValidationException($request, $validator);  
            }
            
            
        }else{
            $current_time                   =   Carbon::now();
            $new_survey_type                =   new SurveyType;
            $new_survey_type->survey_type   =   $request->survey_type;
            $new_survey_type->last_update   =   $current_time->toDateTimeString();
            $new_survey_type->save();

            return redirect()->back()->with('message', 'Survey Type Successfully Created');
        }
    }

    public function editSurveyType($survey_type_id){
    	
    	$survey_id	= Hashids::decode($survey_type_id);
    	
    	if(count($survey_id) == 0){
    		
    		return redirect()->to('admin/page-not-found');
    	}else{
	    		$survey_types	=	SurveyType::all();
	    		$edit_record	=	SurveyType::where('survey_type_id',$survey_id)->first();
	    		
	    	return view('Admin.Projects.ManageSurveyType.edit_survey_type',compact('survey_types','edit_record')); 
    	}

    }


    public function updateSurveyType(Request $request){
        
        $rules = array(
			'survey_type' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);
		
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			$this->throwValidationException($request, $validator);

		}else{
			
			if($request->get('survey_type') == $request->get('survey_name_for_validation')){
				
			$current_time = Carbon::now();	
			$survey_type  = SurveyType::where('survey_type_id',$request->get('survey_type_id'))->first();
		    $survey_type->survey_type 	= $request->get('survey_type');
		    $survey_type->last_update	= $current_time->toDateTimeString();
		    $survey_type->save();
			    
			    return redirect()->to('/admin/manage_survey_types')->with('message', 'Survey Type Successfully Updated');
			}else{

				$survey_type = SurveyType::where('survey_type',$request->get('survey_type'))->count();
				
				if($survey_type == 0){

					$current_time = Carbon::now();
					$survey_type  = SurveyType::where('survey_type_id',$request->get('survey_type_id'))->first();
			        $survey_type->survey_type 	=	$request->get('survey_type');
			    	$survey_type->last_update	= 	$current_time->toDateTimeString();
		    		$survey_type->save();
			        return redirect()->to('/admin/manage_survey_types')->with('message', 'Survey Type Successfully Updated');
				}
				return redirect()->back()->with('fail', 'Sorry, Survey Type Already Existed');
				/*return redirect()->to('admin/edit_survey_type/'.Hashids::encode($request->get('survey_id')))->with('fail', 'Sorry, Survey Type Already Existed');*/
			}
			
        }
    }

    public function deleteSurveyType($survey_type_id){
       	
       	$survey_id = Hashids::decode($survey_type_id);
    	
    	if(count($survey_id) == 0){
    		return redirect()->to('admin/page-not-found');
    	}
    	$survey_type 	=	SurveyType::where('survey_type_id',$survey_id)->delete();
    	return redirect()->to('/admin/manage_survey_types')->with('message', 'Survey Type Deleted Successfully');
    }



}






