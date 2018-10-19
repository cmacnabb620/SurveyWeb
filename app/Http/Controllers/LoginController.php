<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use App\Models\UserLoginTime;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Browser;

class LoginController extends Controller {

    public function login(){
        //return $password = bcrypt('murali123');
    	if(!Auth::check()){
    		return view('login');
    	}else{
    		   $user_type = Auth::user()->user_type_id;
	         $user_type_name=UserType::where('user_type_id',$user_type)->select('user_type_id')->first();
	         if($user_type_name['user_type_id'] == 1){
	         	return redirect()->to('admin/dashboard');
	         }
           elseif($user_type_name['user_type_id'] == 2){
            return redirect()->to('project_manager/dashboard');
           }
           elseif($user_type_name['user_type_id'] == 3){
            return redirect()->to('surveyor/dashboard');
           }
           elseif($user_type_name['user_type_id'] == 4){
            return redirect()->to('surveyor/dashboard');
           }
           elseif($user_type_name['user_type_id'] == 5){
            return redirect()->to('surveyor/dashboard');
           }
           elseif($user_type_name['user_type_id'] == 6){
            return redirect()->to('quality_user/dashboard');
           }
           elseif($user_type_name['user_type_id'] == 7){
            return redirect()->to('finance_user/dashboard');
           }
    	}  
    }

    public function submitLogin(Request $request){
    	$rules = array(
		'username' => 'required|min:6',
		'password' => 'required|min:6',
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()){
			return response()->json($validator->getMessageBag(), 301);
		}else{
    	   $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'active' => 1
            );
    	    if($request->ajax()){
                if(Auth::attempt($userdata)){
		                 $user_type = Auth::user()->user_type_id;
		                 $user_type_name=UserType::where('user_type_id',$user_type)->select('user_type_id')->first();
		                 if($user_type_name['user_type_id'] == 1){
                     
                      \EnvatoUser::login_time_user_detect_info($request);
                       $url = url('admin/dashboard');
		                 }
                     
                     elseif($user_type_name['user_type_id'] == 2){
                      \EnvatoUser::login_time_user_detect_info($request);
                       $url = url('project_manager/dashboard');
                     }
                     
                     elseif($user_type_name['user_type_id'] == 3){
                      \EnvatoUser::login_time_user_detect_info($request);
                       $url = url('surveyor/dashboard');
                     }
                     
                     elseif($user_type_name['user_type_id'] == 4){
                      \EnvatoUser::login_time_user_detect_info($request);
                       $url = url('surveyor/dashboard');
                     }
                     
                     elseif($user_type_name['user_type_id'] == 5){
                      \EnvatoUser::login_time_user_detect_info($request);
                       $url = url('surveyor/dashboard');
                     }
                     
                     elseif($user_type_name['user_type_id'] == 6){
                      \EnvatoUser::login_time_user_detect_info($request);
                       $url = url('quality_user/dashboard');
                     }

                     elseif($user_type_name['user_type_id'] == 7){
                      \EnvatoUser::login_time_user_detect_info($request);
                       $url = url('finance_user/dashboard');
                     }
		                 return response()->json(array(
			              'success' => $user_type_name['user_type_desc'].' '.'Dashboard Get Successfully',
			              'redirect_url' => $url,
			              'status' => 200,
			              ), 200);
		            }else{
		            	return response()->json(array(
			              'fail' => 'Dashboard Get fail',
			              'status' => 400,
			              ), 400);
		            }
    	   }
        }       
                                                                             
    }

    public function logout(){
        $current_time = Carbon::now();
        $user_token = Session::get('login_time_user_token');
         if(isset($user_token) && !empty($user_token)){
            $user_logout_time = UserLoginTime::where('user_id',Auth::user()->user_id)->where('user_token',$user_token)->first();
            if(!empty($user_logout_time)){
               $user_logout_time->logout_time = $current_time->toDateTimeString();
               $user_logout_time->save();
            }  
         }
         Auth::logout();
         Session::flush();
         return redirect()->to('/')->with('message', 'You are Successfully Logged Out');
    }           


    public function forgotUsernameCheck(Request $request){
    	$username = $request->get('username');
    	if(!empty($username)){
    	  $user=User::where('username',$request->get('username'))->first();
    	  if(!empty($user)){
    	    $url = url('set-password');
           return response()->json(array(
			              'success' => 'User Name Get Successfully',
			              'user_id' =>Hashids::encode($user['user_id']),
			              'redirect_url' => $url,
			              'status' => 200,
			              ), 200);
    	  }else{
            return response()->json(array(
			              'fail' => 'User Name Not Found',
			              'status' => 400,
			              ), 400);
    	  }
    	}else{
           return response()->json(array(
			              'fail' => 'User Empty',
			              'status' => 400,
			              ), 400);
    	}
    	
    }

    public function setPassword($hashuserid){
    	$user_id= Hashids::decode($hashuserid);
    	if(count($user_id) == 0){
    		return redirect()->to('/');
    	}
    	$user=User::where('user_id',$user_id)->first();
    	if(!empty($user)){
    		return view('set-password',compact('user'));
    	}else{
    		return redirect()->to('/');
    	}
    }

    public function updatePassword(Request $request){
       $new_password=$request->get('new_password');
       $re_password=$request->get('re_password');
       $user_id=$request->get('user_id');
       if(!empty('$new_password') && !empty('$re_password') && !empty('$user_id')){
         $user_record = User::findOrFail($user_id);
         $user_record->password=bcrypt($new_password);
         $user_record->save();
         $url = url('/');
          return response()->json(array(
			              'success' => 'Password Updated Successfully',
			              'redirect_url' => $url,
			              'status' => 200,
			              ), 200);
       }else{
          return response()->json(array(
			              'fail' => 'User Name Not Found',
			              'status' => 400,
			              ), 400);
       }

    }

    public function setYourPassword($hashuserid){

        Auth::logout();
        $user_id= Hashids::decode($hashuserid);
        if(empty($user_id)){
            return redirect()->to('/');
        }
        $user=User::where('user_id',$user_id)->first();
        if(!empty($user) && empty($user->password)){
           return view('mail_link_with_set_password',compact('user'));
        }else{
          return redirect()->to('/')->with('emial_setpassword_link_expired_warning_message','Sorry, Your link was expired.');  
        }
    }

     public function updateEmaillinkPassword(Request $request){
       $new_password=$request->get('new_password');
       $re_password=$request->get('re_password');
       $user_id=$request->get('user_id');
       if(!empty('$new_password') && !empty('$re_password') && !empty('$user_id')){
         $user_record = User::findOrFail($user_id);
         $user_record->password=bcrypt($new_password);
         $user_record->save();
         $url = url('/');
          return response()->json(array(
                          'success' => 'Password Updated Successfully',
                          'redirect_url' => $url,
                          'status' => 200,
                          ), 200);
       }else{
          return response()->json(array(
                          'fail' => 'User Name Not Found',
                          'status' => 400,
                          ), 400);
       }

    }

  }
