<?php

namespace App\Http\Controllers\FinanceUser\SettingManagement;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use App\Models\Contact;
use App\Models\Address;
use App\Models\Tag;
use App\Models\TagBridge;
use App\Models\UserProfile;
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
use Hash;
use File;


class FinanceUserSettingController extends Controller {

    public function index(){
      
       $user_id   = Auth::user()->user_id;

      if(empty($user_id)){
            return redirect()->to('/page-not-found');
        }else{  
            $finance_user_profile = User::join('user_type as usertype', 'usertype.user_type_id', '=', 'users.user_type_id')
                   ->join('contact','users.contact_id','=','contact.contact_id')
                   ->join('tag_bridge','users.tag_bridge_user_id','=','tag_bridge.user_id')
                   ->join('address', 'address.address_id', '=', 'contact.address_id')
                   ->leftJoin('user_profile', 'user_profile.user_id', '=', 'users.user_id')
                   ->where('users.user_type_id',7)
                   ->where('users.user_id',Auth::user()->user_id)
                   ->select('*','users.user_id as main_user_id','address.address_id as address_table_id','tag_bridge.user_id as tag_user_id')
                   ->first();
              }

              // dd($finance_user_profile);

        return view('FinanceUser.Settings.finance_user_settings',compact('finance_user_profile'));
    }

    public function updateUser(Request $request){
            
         $rules = array('fname' => 'required','lname' => 'required','address' => 'required', 'city' => 'required', 'country' => 'required','state' => 'required','date' => 'required','email' => 'required','phone' => 'required','user_type' => 'required');
        if(!empty($request->file('profile_pic'))) {
         $rules = array_add($rules, 'profile_pic', 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048');
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
         return redirect()->back()->with('error','Something went wrong');
        }else{
            $current_time        =   Carbon::now();
            $user_table_record   =   User::where('user_id',Auth::user()->user_id)->first();
            $user_profile        =   UserProfile::where('user_id',$user_table_record->user_id)->first(); 
            $file                =   $request->file('profile_pic');
            if(!empty($user_profile)){
              if(!empty($file)){
                  $filename     = $file->getClientOriginalName();
                  $ext          = $file->getClientOriginalExtension();
                  $newfilename  = substr($filename, 0, strrpos($filename, '.'));
                  $newfilename  = uniqid() . '_' . $newfilename . '.' . $ext;
                  $file->move('crossroads/ProfilePics/FinancePics', $newfilename);
                  // previous image delete code implement here.
                  
                  if(!empty($user_profile->profile_pic)){
                    File::delete('crossroads/ProfilePics/FinancePics/'.$user_profile->profile_pic);
                    $user_profile->profile_pic=$newfilename;
                    $user_profile->save();          
                  }
                  else{
                        
                      $user_profile->profile_pic=$newfilename;
                      $user_profile->save();  
                  } 
              }
                
            }else{
              if(!empty($file)){

                  $filename     = $file->getClientOriginalName();
                  $ext          = $file->getClientOriginalExtension();
                  $newfilename  = substr($filename, 0, strrpos($filename, '.'));
                  $newfilename  = uniqid() . '_' . $newfilename . '.' . $ext;
                  $file->move('crossroads/ProfilePics/FinancePics', $newfilename);
                  
                  $user_profile_pic=new UserProfile;
                  // previous image delete code implement here.
                  $user_profile_pic->user_id=$user_table_record->user_id;
                  $user_profile_pic->profile_pic=$newfilename;
                  $user_profile_pic->save();
              }
              
            }
             /*************************User Profile Upload Start**********************/
             /***************************Address Table Start************************/
             $address_table_store=Address::where('address_id',$request->get('address_id'))->first();
             $address_table_store->address=Crypt::encryptString($request->get('address'));
             $address_table_store->city=Crypt::encryptString($request->get('city'));
             $address_table_store->country=Crypt::encryptString($request->get('country'));
             $address_table_store->state=Crypt::encryptString($request->get('state'));
             $address_table_store->phone=Crypt::encryptString($request->get('phone'));
             $address_table_store->last_update=$current_time->toDateTimeString();
             $address_table_store->save();
             /***************************Address Table End************************/
            
            /***************************Contact Table start************************/
             $contact_table_store=Contact::where('contact_id',$request->get('contact_id'))->first();
             $contact_table_store->first_name=Crypt::encryptString($request->get('fname'));
             $contact_table_store->last_name=Crypt::encryptString($request->get('lname'));
             $contact_table_store->email=Crypt::encryptString($request->get('email'));
             $contact_table_store->phone=Crypt::encryptString($request->get('phone'));
             $contact_table_store->DOB=Crypt::encryptString($request->get('date'));
             $contact_table_store->address_id=$address_table_store->address_id;
             $contact_table_store->last_update=$current_time->toDateTimeString();
             $contact_table_store->save();
             /***************************Contact Table End************************/
             return redirect()->back()->with('success','Your Profile Updated Successfully');

        }
    }


     public function updateAdminPassword(Request $request){
     
       $old_password=$request->get('old_pwd');
       $new_password=$request->get('new_password');
       $re_password=$request->get('re_password');
       $user_record=Auth::user();
       if(!empty($old_password) && !empty($new_password) && !empty($re_password)){
         if(!Hash::check($old_password, $user_record->password)){
           return response()->json(array(
                          'fail' => 'Sorry, Old password does not match',
                          'status' => 400,
                          ), 400);
         }
         $user_record->password=bcrypt($new_password);
         $user_record->save();
         $url = url('/');
          return response()->json(array(
                          'success' => 'Password Updated Successfully',
                          'redirect_url' => $url,
                          'status' => 200,
                          ), 200);
       }

    }
}






