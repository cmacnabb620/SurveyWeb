<?php

namespace App\Http\Controllers\SuperAdmin\UserManagement;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Tag;
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


class ProjectManagerController extends Controller {

    public function index(){
    	$project_managers= \EnvatoUser::user_type_list(2);
    	//dd($project_managers);
        return view('Admin.Users.ProjectManager.manage_projectmanager',compact('project_managers'));
    }
   

   	public function addProjectManager(){
        return view('Admin.Users.ProjectManager.add_projectmanager');
    }

    public function storeDetails(Request $request){
    	$rules = array('fname' => 'required','lname' => 'required','address' => 'required', 'city' => 'required', 'country' => 'required','state' => 'required','date' => 'required','start_date' => 'required','email' => 'required','phone' => 'required','user_type' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{

			 $current_time = Carbon::now();
        	//tag_bridge table store start
        	 $tagbridge_table_store=new TagBridge;
        	 $tagbridge_table_store->tag_tag_id=2;
        	 $tagbridge_table_store->save();

             //Address table store start
        	 $address_table_store=new Address;
        	 $address_table_store->address=Crypt::encryptString($request->get('address'));
        	 // $address_table_store->district=Crypt::encryptString($request->get('district'));
        	 $address_table_store->city=Crypt::encryptString($request->get('city'));
        	 $address_table_store->country=Crypt::encryptString($request->get('country'));
        	 $address_table_store->state=Crypt::encryptString($request->get('state'));
        	 $address_table_store->phone=Crypt::encryptString($request->get('phone'));
        	 $address_table_store->last_update=$current_time->toDateTimeString();
        	 $address_table_store->save();

        	 //Contact table store start
        	 $contact_table_store=new Contact;
        	 $contact_table_store->first_name=Crypt::encryptString($request->get('fname'));
        	 $contact_table_store->last_name=Crypt::encryptString($request->get('lname'));
        	 $contact_table_store->email=Crypt::encryptString($request->get('email'));
        	 $contact_table_store->phone=Crypt::encryptString($request->get('phone'));
        	 $contact_table_store->DOB=Crypt::encryptString($request->get('date'));
        	 $contact_table_store->address_id=$address_table_store->address_id;
        	 $contact_table_store->last_update=$current_time->toDateTimeString();
        	 $contact_table_store->save();

             //User table store start
        	 $user_table_insert=new User;
        	 $user_table_insert->user_type_id=2;
        	 $user_table_insert->username= \EnvatoUser::random_username($request->get('fname'),$request->get('lname'));
             $user_table_insert->start_date=$request->get('start_date');
        	 $user_table_insert->active=1;
        	 $user_table_insert->contact_id= $contact_table_store->contact_id;
        	 $user_table_insert->tag_bridge_user_id=$tagbridge_table_store->user_id;
        	 $user_table_insert->created_at=$current_time->toDateTimeString();
        	 $user_table_insert->save();

        	$user_type=UserType::where('user_type_id',$user_table_insert->user_type_id)->first();
            //mail sent to set security questions and password start
            $data = array('id'=>Hashids::encode($user_table_insert->user_id),'email'=>$request->get('email'),'fname'=>$request->get('fname'),'lname'=>$request->get('lname'),'user_name' =>$user_table_insert->username ,"body" => "Test mail","user_type" => $user_type->user_type_desc);
            $mail_sent=Mail::send('Email.password-setup', $data, function($message) use ($data){
		        	$message->to($data['email'], 'Receiver')
		                    ->subject('Crossroads Group Request For Set Password');
		            $message->from('muralidharan.bora@gmail.com','Sender');         
		        });
            //mail sent to set security questions and password end
            
             $url = url('admin/dashboard');
        	 return response()->json(array(
			              'success' => $request->get('fname').' '.$request->get('lname').' '.'Created Successfully',
			              'redirect_url' => $url,
			              'status' => 200,
			              ), 200);

        }
    }

    public function viewDetails($userid){
        $user_id= Hashids::decode($userid);
        if(count($user_id) == 0){
            return redirect()->to('admin/page-not-found');
        }else{
            $project_manager_edt_record= \EnvatoUser::edit_user($user_id,2);
            $user_types=UserType::all();
            return view('Admin/Users/ProjectManager/view_project_manager',compact('user_types','project_manager_edt_record'));
        }
    }

    public function editDetails($userid){
        $user_id= Hashids::decode($userid);
        if(count($user_id) == 0){
            return redirect()->to('admin/page-not-found');
        }else{
            $project_manager_edt_record= \EnvatoUser::edit_user($user_id,2);
            $user_types=UserType::whereIn('user_type_id',[1,2,6,7])->get();
            return view('Admin/Users/ProjectManager/edit_project-manager',compact('user_types','project_manager_edt_record'));
        }
    }

    public function updateDetails(Request $request){
       $rules = array('fname' => 'required','lname' => 'required','address' => 'required', 'city' => 'required', 'country' => 'required','state' => 'required','date' => 'required','start_date' => 'required','email' => 'required','phone' => 'required','user_type' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{

             $current_time = Carbon::now();
            //tag_bridge table store start
             $tagbridge_table_store=TagBridge::where('user_id',$request->get('tag_user_id'))->first();
             $tagbridge_table_store->tag_tag_id=$request->get('user_type');
             $tagbridge_table_store->save();

             //Address table store start
             $address_table_store=Address::where('address_id',$request->get('address_id'))->first();
             $address_table_store->address=Crypt::encryptString($request->get('address'));
             // $address_table_store->district=Crypt::encryptString($request->get('district'));
             $address_table_store->city=Crypt::encryptString($request->get('city'));
             $address_table_store->country=Crypt::encryptString($request->get('country'));
             $address_table_store->state=Crypt::encryptString($request->get('state'));
             $address_table_store->phone=Crypt::encryptString($request->get('phone'));
             $address_table_store->last_update=$current_time->toDateTimeString();
             $address_table_store->save();

             //Contact table store start
             $contact_table_store=Contact::where('contact_id',$request->get('contact_id'))->first();
             $contact_table_store->first_name=Crypt::encryptString($request->get('fname'));
             $contact_table_store->last_name=Crypt::encryptString($request->get('lname'));
             $contact_table_store->email=Crypt::encryptString($request->get('email'));
             $contact_table_store->phone=Crypt::encryptString($request->get('phone'));
             $contact_table_store->DOB=Crypt::encryptString($request->get('date'));
             $contact_table_store->address_id=$address_table_store->address_id;
             $contact_table_store->last_update=$current_time->toDateTimeString();
             $contact_table_store->save();

             //User table store start
             $user_table_insert=User::where('user_id',$request->get('user_id'))->first();
             $user_table_insert->user_type_id=$request->get('user_type');
             //$user_table_insert->username= \EnvatoUser::random_username($request->get('fname').''.$request->get('lname'));
             $user_table_insert->start_date=$request->get('start_date');
             $user_table_insert->active=1;
             $user_table_insert->contact_id= $contact_table_store->contact_id;
             $user_table_insert->tag_bridge_user_id=$tagbridge_table_store->user_id;
             $user_table_insert->created_at=$current_time->toDateTimeString();
             $user_table_insert->save();

            //mail sent to set security questions and password start
           /* $data = array('id'=>Hashids::encode($user_table_insert->user_id),'email'=>$request->get('email'),'fname'=>$request->get('fname'),'lname'=>$request->get('lname'),'user_name' =>$user_table_insert->username ,"body" => "Test mail");
            $mail_sent=Mail::send('Email.password-setup', $data, function($message) use ($data){
                    $message->to($data['email'], 'Receiver')
                            ->subject('Crossroads Group Request For Set Password');
                    $message->from('muralidharan.bora@gmail.com','Sender');         
                });*/
            //mail sent to set security questions and password end
            
             $url = url('admin/project_managers');
             return response()->json(array(
                          'success' => $request->get('fname').' '.$request->get('lname').' '.'Details Updated Successfully',
                          'redirect_url' => $url,
                          'status' => 200,
                          ), 200);

        }
    }

    public function deleteProjectManager($userid){
       $userid= Hashids::decode($userid);
        if(empty($userid)){
            return redirect()->to('admin/page-not-found');
        }
        $user_record=User::where('user_id',$userid)->first();
        if(!empty($user_record)){
            try {
            Session::put('tag_bridge_user_id', $user_record->tag_bridge_user_id);
            $contact_record=Contact::where('contact_id',$user_record->contact_id)->first();
            Session::put('address_table_id',$contact_record->address_id);
            $delete_contact=Contact::where('contact_id',$user_record->contact_id)->delete();
            $tagbridge_record=TagBridge::where('user_id',Session::get('tag_bridge_user_id'))->delete();
            $tagbridge_record=Address::where('address_id',Session::get('address_table_id'))->delete();
            return redirect()->to('/admin/project_managers')->with('message', 'Project manager Deleted Successfully');
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






