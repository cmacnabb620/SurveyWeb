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


class AdminFrequencyTypeController extends Controller {


    public function index(){
        
        $freq_types	=	ReportFreq::all();
        return view('Admin.Projects.ManageFrequencyType.manage_frequency_types',compact('freq_types'));
    }

    public function addNewFrequencyType(Request $request){
        	
        $rules = array(
			'freq_type' => 'required|unique:report_freq,report_frequency',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			
			return redirect()->back()->withErrors($validator)->withInput();
			
			$this->throwValidationException($request, $validator);
		}else{
			$current_time 						=   Carbon::now();
			$new_freq_type						=	new ReportFreq;
			$new_freq_type->report_frequency	=	$request->freq_type;
			$new_freq_type->last_update	=	$current_time->toDateTimeString();
			$new_freq_type->save();

			return redirect()->back()->with('message', 'Frequency Type Successfully Created');
        }
    }

    public function editFrequencyType($report_freq_id){
    	
    	$freq_id	= Hashids::decode($report_freq_id);
    	
    	if(count($freq_id) == 0){
    		
    		return redirect()->to('admin/page-not-found');
    	}else{
	    		$freq_types		=	ReportFreq::all();
	    		$edit_record	=	ReportFreq::where('report_freq_id',$freq_id)->first();
	    		
	    	return view('Admin.Projects.ManageFrequencyType.edit_frequency_type',compact('freq_types','edit_record')); 
    	}

    }


    public function updateFrequencyType(Request $request){
        $rules = array(
			
			'report_frequency' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);
		
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			$this->throwValidationException($request, $validator);

		}else{
			
			if($request->get('report_frequency_name') == $request->get('report_frequency')){
				
			$current_time					= Carbon::now();	
			$freq_types  					= ReportFreq::where('report_freq_id',$request->get('report_freq_id'))->first();
		    $freq_types->report_frequency 	= $request->get('report_frequency');
		    $freq_types->last_update		= $current_time->toDateTimeString();
		    $freq_types->save();
			    
			    return redirect()->to('/admin/manage_frequency_types')->with('message', 'Frequency Type Successfully Updated');
			}else{

				$freq_types = ReportFreq::where('report_frequency',$request->get('report_frequency'))->count();
				
				if($freq_types == 0){

					$current_time = Carbon::now();
					$freq_types  = ReportFreq::where('report_freq_id',$request->get('report_freq_id'))->first();
			        $freq_types->report_frequency 	=	$request->get('report_frequency');
			    	$freq_types->last_update		= 	$current_time->toDateTimeString();
		    		$freq_types->save();
			        return redirect()->to('/admin/manage_frequency_types')->with('message', 'Frequency Type Successfully Updated');
				}
				return redirect()->to('admin/edit_frequency_type/'.Hashids::encode($request->get('report_freq_id')))->with('fail', 'Sorry, Frequency Type Already Existed');
			}
			
        }
    }

    public function deleteFrequencyType($report_freq_id){
       	
       	$freq_id 	= Hashids::decode($report_freq_id);
    	
    	if(count($freq_id) == 0){
    		return redirect()->to('admin/page-not-found');
    	}
    	$freq_type 	=	ReportFreq::where('report_freq_id',$freq_id)->delete();
    	return redirect()->to('/admin/manage_frequency_types')->with('message', 'Frequency Type Deleted Successfully');
    }



}






