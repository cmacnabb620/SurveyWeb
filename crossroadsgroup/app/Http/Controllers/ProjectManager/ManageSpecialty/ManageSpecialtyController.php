<?php

namespace App\Http\Controllers\ProjectManager\ManageSpecialty;
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
use App\Models\Provider;
use App\Models\Specialty;
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


class ManageSpecialtyController extends Controller {


    public function index(){
        
        $specialty 	= Specialty::get()->all();
        // dd($specialty);

        return view('ProjectManager.ManageSpecialty.manage_specialty',compact('specialty'));
    }

    public function addNewSpecialty(){

    	 return view('ProjectManager.ManageSpecialty.add_new_specialty');
    } 

    public function saveNewSpecialty(Request $request){

    	 $rules = array(
				     'name' 	=> 'required|unique:specialty,specialty_name',
				     'req_surveys' 	=> 'required|integer'
			       	 );
        $validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
                $this->throwValidationException($request, $validator);  
		} else{
            $new_specialty = Specialty::where('specialty_name',$request->name)->count();

            if($new_specialty > 0){
                return redirect()->back()->with('error', 'Specialty is already exist');
            }else{
                
                $new_specialty              =  new Specialty;
                $new_specialty->specialty_name  =  $request->get('name');
                $new_specialty->surveys_required    = $request->get('req_surveys');
                $new_specialty->save();

                return redirect()->back()->with('message', 'Specialty is created successfully.');
            }
			
		}
    }

    public function editSpecialty($specialty_id){

    	$specialty_id = Hashids::decode($specialty_id);
        
        if(empty($specialty_id)){
            return redirect()->to('/page-not-found');
        }else{
	        
	        $specialty = Specialty::where('specialty_id',$specialty_id)->first();
	        // dd($specialty);
	    	return view('ProjectManager.ManageSpecialty.edit_specialty',compact('specialty'));
    	}
    }

    public function updateSpecialty(Request $request){
    	// return "hai";
    	$rules = array(
				      'name' 		=> 'required|unique:specialty,specialty_name',
				      'req_surveys' => 'required'
			       	 );
        $validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
                $this->throwValidationException($request, $validator);  
		} else{

		
		$update_specialty =  Specialty::where('specialty_id',$request->specialty_id)->first();
		
		$update_specialty->specialty_name	=  $request->get('name');
		$update_specialty->surveys_required	= $request->get('req_surveys');
		$update_specialty->save();

			return redirect('project_manager/manage_specialty')->with('message', 'Specialty is updated successfully.');
		}
    }

    public function deleteSpecialty($specialty_id){
    	
    	$specialty_id= Hashids::decode($specialty_id);
        
        if(empty($specialty_id)){
            return redirect()->to('/page-not-found');
        }else{
    		$specialty = Specialty::where('specialty_id',$specialty_id);
    		if(!empty($specialty)){
				$specialty->delete();
				return redirect()->back()->with('message', 'Specialty Deleted Successfully');
			}else{
				return redirect()->back()->with('error', 'Specialty not Found');
			} 
        }
    	
    }
}






