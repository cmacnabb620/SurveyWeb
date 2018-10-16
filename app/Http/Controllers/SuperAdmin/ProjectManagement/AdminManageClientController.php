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


class AdminManageClientController extends Controller {


    public function index(){

    	$clients= Client::join('address as addrs', 'addrs.address_id', '=', 'client.address_id')
                   ->select('*')
                   ->get();
        return view('Admin.Projects.ManageClient.manage_clients',compact('clients'));
    }

    public function addNewClient(){
      return view('Admin.Projects.ManageClient.add_new_client');
    }

   public function saveNewClient(Request $request){
       $rules = array(
				     'client_name' => 'required',
				     'org_abbrev' => 'required',
				     'client_type' => 'required',
			       	 'address_1' => 'required', 
			       	 'address_2' => 'required',
			       	 'country' => 'required',
			       	 'state' => 'required',
			       	 'city' => 'required',
			       	 'phone' => 'required'
			       	 );
        $validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
		} else{
			$current_time = Carbon::now();
			$new_client_address=new Address();
			$new_client_address->address=Crypt::encryptString($request->get('address_1'));
			$new_client_address->address2=Crypt::encryptString($request->get('address_2'));
			$new_client_address->city=Crypt::encryptString($request->get('city'));
			$new_client_address->country=Crypt::encryptString($request->get('country'));
			$new_client_address->state=Crypt::encryptString($request->get('state'));
			$new_client_address->phone=Crypt::encryptString($request->get('phone'));
			$new_client_address->last_update=$current_time->toDateTimeString();
			$new_client_address->save();

			$new_client=new Client();
			$new_client->name=Crypt::encryptString($request->get('client_name'));
			$new_client->org_abbrev=Crypt::encryptString($request->get('org_abbrev'));
			$new_client->client_type=Crypt::encryptString($request->get('client_type'));
			$new_client->client_status=0;
			$new_client->address_id=$new_client_address->address_id;
			$new_client->last_update=$current_time->toDateTimeString();
			$new_client->save();

			$new_contact = new Contact();
			$new_contact->first_name = Crypt::encryptString($request->get('client_name'));	  
			$new_contact->email      = Crypt::encryptString($request->get('client_email'));	  
			$new_contact->phone		 = Crypt::encryptString($request->get('phone'));
			$new_contact->client_id  = $new_client->client_id;
			$new_contact->address_id = $new_client_address->address_id;
			$new_contact->save();
			return 'client saved success';

		}
    }

    public function editClient($clientid){
    	$client_id= Hashids::decode($clientid);
    	if(count($client_id) == 0){
            return redirect()->to('admin/page-not-found');
        }else{

        	$client_record = Client::join('address as addrs', 'addrs.address_id', '=', 'client.address_id')
        		   ->join('contact', 'contact.address_id', '=', 'client.address_id')
        	       ->where('client.client_id',$client_id)
                   ->select('*')
                   ->first();
            // dd($client_record);       
            return view('Admin.Projects.ManageClient.edit_client',compact('client_record'));
        }
    }

    public function updateClient(Request $request){
    	 $rules = array(
				     'client_name' => 'required',
				     'client_email' => 'required',
				     'org_abbrev' => 'required',
				     'client_type' => 'required',
			       	 'address_1' => 'required', 
			       	 'address_2' => 'required',
			       	 'country' => 'required',
			       	 'state' => 'required',
			       	 'city' => 'required',
			       	 'phone' => 'required'
			       	 );
        $validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return "hai";
			/*return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);*/
		} else{
			$current_time = Carbon::now();
			$edit_client=Client::where('client_id',$request->get('client_id'))->first();
			$edit_client->name=Crypt::encryptString($request->get('client_name'));
			$edit_client->org_abbrev=Crypt::encryptString($request->get('org_abbrev'));
			$edit_client->client_type=Crypt::encryptString($request->get('client_type'));
			$edit_client->client_status=$request->get('status');
			$edit_client->last_update=$current_time->toDateTimeString();
			$edit_client->save();

			$client_address= Address::where('address_id',$edit_client->address_id)->first();
			$client_address->address=Crypt::encryptString($request->get('address_1'));
			$client_address->address2=Crypt::encryptString($request->get('address_2'));
			$client_address->city=Crypt::encryptString($request->get('city'));
			$client_address->country=Crypt::encryptString($request->get('country'));
			$client_address->state=Crypt::encryptString($request->get('state'));
			$client_address->phone=Crypt::encryptString($request->get('phone'));
			$client_address->last_update=$current_time->toDateTimeString();
			$client_address->save();
			
			$update_contact = Contact::where('contact_id',$request->contact_id)->first();
			$update_contact->first_name = Crypt::encryptString($request->get('client_name'));	  
			$update_contact->email      = Crypt::encryptString($request->get('client_email'));	  
			$update_contact->phone		 = Crypt::encryptString($request->get('phone'));
			$update_contact->save();
			return 'client updated success';

		}
    }

    public function deleteClient($clientid){
    	
    	$client_id= Hashids::decode($clientid);
        if(empty($client_id)){
            return redirect()->to('admin/page-not-found');
        }
        $client_record=Client::where('client_id',$client_id)->first();
        if(!empty($client_record)){
            try {
            $delete_address_record=Address::where('address_id',$client_record->address_id)->first();
            if(!empty($delete_address_record)){
            	$delete_address_record->delete();
            }
            $delete_contact_record=Contact::where('contact_id',$client_record->client_id)->delete();
            if(!empty($delete_contact_record)){
            	$delete_contact_record->delete();
            }
            $delete_client_record=Client::where('client_id',$client_id)->delete();
            return redirect()->back()->with('message', 'Client Deleted Successfully');
            }catch (Exception $e) {
             //return redirect()->to('/admin/project_managers')->with('error', 'Somethig Went Wrong');
            }finally {
             //return redirect()->to('/admin/project_managers')->with('error', 'Somethig Went Wrong');
            }
        }else{
          return redirect()->to('admin/page-not-found');
        }
    }



}






