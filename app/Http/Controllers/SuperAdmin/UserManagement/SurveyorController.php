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
use App\Models\SurveyorAdditionalInfo;
use App\Models\SurveyorTypeChangingDate;
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


class SurveyorController extends Controller {

    public function index(){
    	$active_surveyors= \EnvatoUser::user_type_list(5);
        $prospective_surveyors= \EnvatoUser::user_type_list(3);
        $trainee_surveyors= \EnvatoUser::user_type_list(4);
        $inactive_surveyors= \EnvatoUser::user_type_list(8);
    	/*dd($project_managers);*/
        return view('Admin.Users.Surveyor.manage_active_surveyor',compact('active_surveyors','prospective_surveyors','trainee_surveyors','inactive_surveyors'));
    }

    public function prospective_surveyors(){
        $active_surveyors= \EnvatoUser::user_type_list(5);
        $prospective_surveyors= \EnvatoUser::user_type_list(3);
        $trainee_surveyors= \EnvatoUser::user_type_list(4);
        $inactive_surveyors= \EnvatoUser::user_type_list(8);
        /*dd($project_managers);*/
        return view('Admin.Users.Surveyor.manage_prospective_surveyor',compact('active_surveyors','prospective_surveyors','trainee_surveyors','inactive_surveyors'));
    }

    public function trainee_surveyors(){
        $active_surveyors= \EnvatoUser::user_type_list(5);
        $prospective_surveyors= \EnvatoUser::user_type_list(3);
        $trainee_surveyors= \EnvatoUser::user_type_list(4);
        $inactive_surveyors= \EnvatoUser::user_type_list(8);
        /*dd($project_managers);*/
        return view('Admin.Users.Surveyor.manage_trainee_surveyor',compact('active_surveyors','prospective_surveyors','trainee_surveyors','inactive_surveyors'));
    }
    public function inactive_surveyors(){
        $active_surveyors= \EnvatoUser::user_type_list(5);
        $prospective_surveyors= \EnvatoUser::user_type_list(3);
        $trainee_surveyors= \EnvatoUser::user_type_list(4);
        $inactive_surveyors= \EnvatoUser::user_type_list(8);
        /*dd($project_managers);*/
        return view('Admin.Users.Surveyor.manage_inactive_surveyor',compact('active_surveyors','prospective_surveyors','trainee_surveyors','inactive_surveyors'));
    }
   

   	public function addSurveyor(){
       $surveyor_types= UserType::whereIn('user_type_id',[3,4,5,8])->get();
        return view('Admin.Users.Surveyor.add_surveyor',compact('surveyor_types'));
    }

    public function storeDetails(Request $request){
        /*return $request->all();*/
    	$rules = array('fname' => 'required','lname' => 'required','email' => 'required','phone' => 'required','start_date' => 'required','user_type' => 'required');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return Response::json(array('success' => false,'errors' => $validator->getMessageBag()->toArray()), 400);
        }else{

			 $current_time = Carbon::now();
        	//tag_bridge table store start
        	 $tagbridge_table_store=new TagBridge;
        	 $tagbridge_table_store->tag_tag_id=$request->get('surveyor_type');
        	 $tagbridge_table_store->save();

             //Address table store start
        	 $address_table_store=new Address;
        	 
             if(!empty($request->get('address'))){
                $address_table_store->address=Crypt::encryptString($request->get('address'));   
             }
             // if(!empty($request->get('district'))){
             //    $address_table_store->district=Crypt::encryptString($request->get('district'));   
             // }
             if(!empty($request->get('city'))){
                $address_table_store->city=Crypt::encryptString($request->get('city'));   
             }
             if(!empty($request->get('state'))){
                $address_table_store->state=Crypt::encryptString($request->get('state'));   
             }
             if(!empty($request->get('country'))){
                $address_table_store->country=Crypt::encryptString($request->get('country'));   
             }

             // $address_table_store->address=Crypt::encryptString($request->get('address'));
        	 // $address_table_store->district=Crypt::encryptString($request->get('district'));
        	 // $address_table_store->city=Crypt::encryptString($request->get('city'));
        	 // $address_table_store->country=Crypt::encryptString($request->get('country'));
        	 // $address_table_store->state=Crypt::encryptString($request->get('state'));
        	 
             $address_table_store->phone=Crypt::encryptString($request->get('phone'));
        	 $address_table_store->last_update=$current_time->toDateTimeString();
        	 $address_table_store->save();

        	 //Contact table store start
        	 $contact_table_store=new Contact;
        	 $contact_table_store->first_name=Crypt::encryptString($request->get('fname'));
        	 $contact_table_store->last_name=Crypt::encryptString($request->get('lname'));
        	 $contact_table_store->email=Crypt::encryptString($request->get('email'));
        	 $contact_table_store->phone=Crypt::encryptString($request->get('phone'));
        	 
             if(!empty($request->get('date'))){
                $contact_table_store->DOB=Crypt::encryptString($request->get('date'));   
             }
        	 
             $contact_table_store->address_id=$address_table_store->address_id;
        	 $contact_table_store->last_update=$current_time->toDateTimeString();
        	 $contact_table_store->save();

             //User table store start
        	 $user_table_insert=new User;
        	 $user_table_insert->user_type_id=$request->get('surveyor_type');;
        	 $user_table_insert->username= \EnvatoUser::random_username($request->get('fname'),$request->get('lname'));
             $user_table_insert->start_date=$request->get('start_date');
        	 $user_table_insert->active=1;
        	 $user_table_insert->contact_id= $contact_table_store->contact_id;
        	 $user_table_insert->tag_bridge_user_id=$tagbridge_table_store->user_id;
        	 $user_table_insert->created_at=$current_time->toDateTimeString();
        	 $user_table_insert->save();

             $surveyor_table_insert  = new SurveyorTypeChangingDate;
             $surveyor_table_insert->user_id  = $user_table_insert->user_id;
             $surveyor_type = $request->get('surveyor_type');
                
                if($surveyor_type == 3){
                    $surveyor_table_insert->prospective_date  = $current_time->toDateTimeString();
                }

                if($surveyor_type == 4){
                    $surveyor_table_insert->trainee_date  = $current_time->toDateTimeString();
                }
                
                if($surveyor_type == 5){
                    $surveyor_table_insert->active_date  = $current_time->toDateTimeString();
                }

                if($surveyor_type == 8){
                    $surveyor_table_insert->inactive_date  = $current_time->toDateTimeString();
                }
                
              $surveyor_table_insert->save();
        	

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

    public function viewDetails($userid,$usertype){

        $user_id= Hashids::decode($userid);
        $user_type= Hashids::decode($usertype);
        if(count($user_id) == 0){
            return redirect()->to('admin/page-not-found');
        }else{
            $project_surveyor_edt_record= \EnvatoUser::edit_user($user_id,$user_type);
            // dd($project_surveyor_edt_record);
            $user_types=UserType::all();
            return view('Admin/Users/Surveyor/view_surveyors',compact('user_types','project_surveyor_edt_record'));
        }
    }

    public function editDetails($userid,$usertype){
        $user_id= Hashids::decode($userid);
        $user_type= Hashids::decode($usertype);
        if(count($user_id) == 0){
            return redirect()->to('admin/page-not-found');
        }else{
            $project_surveyor_edt_record= \EnvatoUser::edit_user($user_id,$user_type);
            $user_types=UserType::whereIn('user_type_id',[3,4,5,8])->get();
            return view('Admin/Users/Surveyor/edit_surveyor',compact('user_types','project_surveyor_edt_record'));
        }
    }

    public function updateDetails(Request $request){
       /* return $request->all();*/
       $rules = array('fname' => 'required','lname' => 'required','email' => 'required','phone' => 'required','start_date' => 'required','user_type' => 'required');
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
             
             if(!empty($request->get('address'))){
                $address_table_store->address=Crypt::encryptString($request->get('address'));   
             }
             // if(!empty($request->get('district'))){
             //    $address_table_store->district=Crypt::encryptString($request->get('district'));   
             // }
             if(!empty($request->get('city'))){
                $address_table_store->city=Crypt::encryptString($request->get('city'));   
             }
             if(!empty($request->get('country'))){
                $address_table_store->country=Crypt::encryptString($request->get('country'));   
             }
             if(!empty($request->get('state'))){
                $address_table_store->state=Crypt::encryptString($request->get('state'));   
             }
              
             // $address_table_store->address=Crypt::encryptString($request->get('address'));
             // $address_table_store->district=Crypt::encryptString($request->get('district'));
             // $address_table_store->city=Crypt::encryptString($request->get('city'));
             // $address_table_store->country=Crypt::encryptString($request->get('country'));
             // $address_table_store->state=Crypt::encryptString($request->get('state'));

             $address_table_store->phone=Crypt::encryptString($request->get('phone'));
             $address_table_store->last_update=$current_time->toDateTimeString();
             $address_table_store->save();

             //Contact table store start
             $contact_table_store=Contact::where('contact_id',$request->get('contact_id'))->first();
             $contact_table_store->first_name=Crypt::encryptString($request->get('fname'));
             $contact_table_store->last_name=Crypt::encryptString($request->get('lname'));
             $contact_table_store->email=Crypt::encryptString($request->get('email'));
             $contact_table_store->phone=Crypt::encryptString($request->get('phone'));
             
             if(!empty($request->get('date'))){
                $contact_table_store->DOB=Crypt::encryptString($request->get('date'));   
             }
             
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

             $surveyor_table_update=SurveyorTypeChangingDate::where('user_id',$request->get('user_id'))->first();
             $surveyor_type = $request->get('user_type');
                
                if($surveyor_type == 3){
                    $surveyor_table_update->prospective_date  = $current_time->toDateTimeString();
                }

                if($surveyor_type == 4){
                    $surveyor_table_update->trainee_date  = $current_time->toDateTimeString();
                }
                
                if($surveyor_type == 5){
                    $surveyor_table_update->active_date  = $current_time->toDateTimeString();
                }

                if($surveyor_type == 8){
                    $surveyor_table_update->inactive_date  = $current_time->toDateTimeString();
                }
                
              $surveyor_table_update->save();

            //mail sent to set security questions and password start
           /* $data = array('id'=>Hashids::encode($user_table_insert->user_id),'email'=>$request->get('email'),'fname'=>$request->get('fname'),'lname'=>$request->get('lname'),'user_name' =>$user_table_insert->username ,"body" => "Test mail");
            $mail_sent=Mail::send('Email.password-setup', $data, function($message) use ($data){
                    $message->to($data['email'], 'Receiver')
                            ->subject('Crossroads Group Request For Set Password');
                    $message->from('muralidharan.bora@gmail.com','Sender');         
                });*/
            //mail sent to set security questions and password end
            
             $url = url('admin/active_surveyors');
             return response()->json(array(
                          'success' => $request->get('fname').' '.$request->get('lname').' '.'Details Updated Successfully',
                          'redirect_url' => $url,
                          'status' => 200,
                          ), 200);

        }
    }

    public function deleteSurveyor($userid){
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
            $surveyor_info_delete =SurveyorAdditionalInfo::where('surveyor_id',$userid)->delete();
            return redirect()->back()->with('message', 'Surveyor Deleted Successfully');
            }catch (Exception $e) {
             //return redirect()->to('/admin/surveyors')->with('error', 'Somethig Went Wrong');
            }finally {
             //return redirect()->to('/admin/surveyors')->with('error', 'Somethig Went Wrong');
            }
        }else{
          return redirect()->to('admin/page-not-found');
        }
        
    }

}






