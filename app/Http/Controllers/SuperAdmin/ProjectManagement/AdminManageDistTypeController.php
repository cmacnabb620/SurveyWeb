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
use App\Models\DistType;
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


class AdminManageDistTypeController extends Controller {


    public function index(){
        
        $dist_types	=	DistType::all();

        return view('Admin.Projects.ManageDistType.manage_dist_type',compact('dist_types'));
    }

    public function addNewDistType(Request $request){
        	
        $rules = array(
			'dist_type' => 'required|unique:dist_types,dist_type',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			
			return redirect()->back()->withErrors($validator)->withInput();
			
			$this->throwValidationException($request, $validator);
		}else{
			
				$new_dist_type					=	new DistType;
				$new_dist_type->dist_type		=	$request->dist_type;
				$new_dist_type->save();

			return redirect()->back()->with('message', 'Distribution Type Successfully Created');
        }
    }

    public function editDistType($dist_types_id){
    	
    	$dist_types_id	= Hashids::decode($dist_types_id);
    	
    	if(count($dist_types_id) == 0){
    		
    		return redirect()->to('admin/page-not-found');
    	}else{
	    		$dist_types		=	DistType::all();
	    		$edit_record	=	DistType::where('dist_types_id',$dist_types_id)->first();
	    		

	    	return view('Admin.Projects.ManageDistType.edit_dist_type',compact('dist_types','edit_record')); 
    	}

    }


    public function updateDistType(Request $request){
 
        $rules = array(
			
			'dist_type' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);
		
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			$this->throwValidationException($request, $validator);

		}else{
			
			if($request->get('dist_type') == $request->get('dist_type_name')){
				
			$dist_type  					= DistType::where('dist_types_id',$request->get('dist_types_id'))->first();
		    $dist_type->dist_type 			= $request->get('dist_type');
		    $dist_type->save();
			    
			    return redirect()->to('/admin/manage_dist_type')->with('message', 'Distribution Type Successfully Updated');
			}else{

				$dist_type = DistType::where('dist_type',$request->get('dist_type'))->count();
				
				if($dist_type == 0){

					$current_time = Carbon::now();
					$dist_type  = DistType::where('dist_types_id',$request->get('dist_types_id'))->first();
			        $dist_type->dist_type 	=	$request->get('dist_type');
		    		$dist_type->save();
			        return redirect()->to('/admin/manage_dist_type')->with('message', 'Distribution Type Successfully Updated');
				}
				return redirect()->to('admin/edit_dist_type/'.Hashids::encode($request->get('dist_types_id')))->with('fail', 'Sorry, Distribution Type Already Existed');
			}
			
        }
    }

    public function deleteDistType($dist_types_id){
       	
       	$dist_types_id 	= Hashids::decode($dist_types_id);
    	
    	if(count($dist_types_id) == 0){
    		return redirect()->to('admin/page-not-found');
    	}
    	$dist_types 	=	DistType::where('dist_types_id',$dist_types_id)->delete();
    	return redirect()->to('/admin/manage_dist_type')->with('message', 'Distribution Type Deleted Successfully');
    }



}
