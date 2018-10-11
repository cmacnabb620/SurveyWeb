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


class AdminManageLanguageController extends Controller {


    public function index(){
        
        $languages	=	Language::all();
        
        return view('Admin.Projects.ManageLanguage.manage_language',compact('languages'));
    }

    public function addNewLanguage(Request $request){
        	
        $rules = array(
			'language_name' => 'required|unique:language,language',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			
			return redirect()->back()->withErrors($validator)->withInput();
			
			$this->throwValidationException($request, $validator);
		}else{
			$current_time 				=   Carbon::now();
			$new_language				=	new Language;
			$new_language->language		=	$request->language_name;
			$new_language->last_update	=	$current_time->toDateTimeString();
			$new_language->save();

			return redirect()->back()->with('message', 'Language Successfully Created');
        }
    }

    public function editLanguage($language_id){
    	
    	$language_id	= Hashids::decode($language_id);
    	
    	if(count($language_id) == 0){
    		
    		return redirect()->to('admin/page-not-found');
    	}else{
	    		$languages		=	Language::all();
	    		$edit_record	=	Language::where('language_id',$language_id)->first();
	    		

	    	return view('Admin.Projects.ManageLanguage.edit_language',compact('languages','edit_record')); 
    	}

    }


    public function updateLanguage(Request $request){
 
        $rules = array(
			
			'language' => 'required',
		);

		$validator = Validator::make($request->all(), $rules);
		
		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
			$this->throwValidationException($request, $validator);

		}else{
			
			if($request->get('language') == $request->get('language_name')){
				
			$current_time					= Carbon::now();	
			$languages  					= Language::where('language_id',$request->get('language_id'))->first();
		    $languages->language 			= $request->get('language');
		    $languages->last_update			= $current_time->toDateTimeString();
		    $languages->save();
			    
			    return redirect()->to('/admin/manage_language')->with('message', 'Language Successfully Updated');
			}else{

				$languages = Language::where('language',$request->get('language'))->count();
				
				if($languages == 0){

					$current_time = Carbon::now();
					$languages  = Language::where('language_id',$request->get('language_id'))->first();
			        $languages->language 		=	$request->get('language');
			    	$languages->last_update		= 	$current_time->toDateTimeString();
		    		$languages->save();
			        return redirect()->to('/admin/manage_language')->with('message', 'Language Successfully Updated');
				}
				return redirect()->to('admin/edit_language/'.Hashids::encode($request->get('language_id')))->with('fail', 'Sorry, Language Already Existed');
			}
			
        }
    }

    public function deleteLanguage($language_id){
       	
       	$language_id 	= Hashids::decode($language_id);
    	
    	if(count($language_id) == 0){
    		return redirect()->to('admin/page-not-found');
    	}
    	$language 	=	Language::where('language_id',$language_id)->delete();
    	return redirect()->to('/admin/manage_language')->with('message', 'Language Deleted Successfully');
    }



}
