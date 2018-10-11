<?php

namespace App\Http\Controllers\ProjectManager\ManageProviders;
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


class ManageProviderController extends Controller {


    public function index(){
        
        $providers 	= Provider::get()->all();
        // dd($provider);

        return view('ProjectManager.ManageProviders.manage_providers',compact('providers'));
    }

    public function addNewProvider(){

    	 return view('ProjectManager.ManageProviders.add_new_provider');
    } 

    public function saveNewProvider(Request $request){

    	 $rules = array(
				     'first_name' 	=> 'required',
				     'last_name' 	=> 'required',
			         'req_surveys' 	=> 'required|integer',
			         'completed_surveys' => 'required|integer'
			       	 );
        $validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect()->back()->withErrors('error', 'Fields are Required');
		} else{

			$new_provider = Provider::where('first_name',$request->first_name)->where('last_name',$request->last_name)->count();
			if($new_provider >= 1){
				
				return redirect()->back()->withErrors('error', 'Provider is already exist');
			}else{
				
				$current_time 				=  Carbon::now();
				$new_provider 				=  new Provider();
				$new_provider->first_name	=  $request->get('first_name');
				$new_provider->last_name	=  $request->get('last_name');
				$new_provider->surveys_required	= $request->get('req_surveys');
				$new_provider->surveys_completed = $request->get('completed_surveys');
				$new_provider->last_update  = $current_time->toDateTimeString();
				$new_provider->save();

			return redirect()->back()->with('message', 'Provider is created successfully.');
			}

			
		}
    }

    public function editProvider($provider_id){

    	$provider_id= Hashids::decode($provider_id);
        
        if(empty($provider_id)){
            return redirect()->to('/page-not-found');
        }else{
	        
	        $provider = Provider::where('NPI',$provider_id)->first();
	        // dd($provider);
	    	return view('ProjectManager.ManageProviders.edit_provider',compact('provider'));
    	}
    }

    public function updateProvider(Request $request){
    	// return "hai";
    	$rules = array(
				     'first_name' 	=> 'required',
				     'last_name' 	=> 'required'
			       	 );
        $validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Fields are Required');
		} else{

		$current_time 		 	=  Carbon::now();
		$update_provider 		=  Provider::where('NPI',$request->provider_id)->first();
		$update_provider->first_name=  $request->get('first_name');
		$update_provider->last_name	=  $request->get('last_name');
		$update_provider->surveys_required	= $request->get('req_surveys');
		$update_provider->surveys_completed = $request->get('completed_surveys');
		$update_provider->last_update  		= $current_time->toDateTimeString();
		$update_provider->save();

			return redirect('project_manager/manage_providers')->with('message', 'Provider is updated successfully.');
		}
    }

    public function deleteProvider($provider_id){
    	
    	$provider_id= Hashids::decode($provider_id);
        
        if(empty($provider_id)){
            return redirect()->to('/page-not-found');
        }else{
    		$provider = Provider::where('NPI',$provider_id);
    		if(!empty($provider)){
				$provider->delete();
				return redirect()->back()->with('message', 'Provider Deleted Successfully');
			}else{
				return redirect()->back()->with('error', 'Provider not Found');
			} 
        }
    	
    }
}






