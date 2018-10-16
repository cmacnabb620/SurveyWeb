<?php

namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Carbon\Carbon;
use Browser;
use App\Models\UserLoginTime;
use Vinkla\Hashids\Facades\Hashids;

class AdminDashboardController extends Controller {

//Admin Login Form displayed
    public function index(Request $request){
    	if(Auth::check()){
            return view('Admin.admin_dashboard'); 
    	}else{
    		return redirect()->to('/')->with('after-logout-access-dashboard', 'Sorry, you can not access dashboard with out Login.');
    	}
        
    }


    public function pagenotFound(){
    	return view('Error_Pages.admin-404');
    }

    public function update_url_request_time(Request $request){
        $current_time = Carbon::now();
        $user_token = Session::get('login_time_user_token');
        if(isset($user_token) && !empty($user_token)){
            $user_login_record_update = UserLoginTime::where('user_id',Auth::user()->user_id)->where('user_token',$user_token)->first();
            $user_login_record_update->last_request_url = $request->get('name');
            $user_login_record_update->last_request_url_time = $current_time->toDateTimeString();
            $user_login_record_update->save();
        }
        return 'success';
    }
    public function check_ajax_time_every_3seconds(Request $request){
        //$updated_time=EnvatoUser::timie_caliculate_difference_in_milliseconds();
        $current_time = Carbon::now();
        $user_token = Session::get('login_time_user_token');
        $current_time->toDateTimeString();
        $user_login_record_update = UserLoginTime::where('user_id',Auth::user()->user_id)->where('user_token',$user_token)->select('last_request_url_time')->first();
        $last_request_url_time = $user_login_record_update['last_request_url_time'];
        $current = strtotime($current_time);
        $latest_request_time = strtotime($last_request_url_time); 
        //Get the difference in seconds.
        $difference = $current - $latest_request_time;
        //Get the difference in milli seconds.
       return $millisconds=$difference*1000;
    }

    public function continue_session()
    {
        $logintime = date('Y-m-d H:i:s');
        $logouttime = date('Y-m-d H:i:s',strtotime('+15 minutes',strtotime($logintime)));

        /*$update_data['login_time'] = $logintime;
        $update_data['logout_time'] = $logouttime;*/
      
        $user_update = User::where('user_id',Auth::user()->user_id)->first();
        $user_update->login_time=$logintime;
        $user_update->logout_time=$logouttime;
        $user_update->save();

        if($user_update)
        {
          $arr_response['status'] = 'success'; 
          $arr_response['login_time'] = $user_update->login_time;
          $arr_response['logout_time'] = $user_update->logout_time;
        }
        else
        {
          $arr_response['status'] = 'error'; 
        }

        return response()->json($arr_response);

    }

    public function userPreviousLoginTimingsFetch(Request $request){
      $user_login_record_update = UserLoginTime::orderBy('created_at', 'desc')->where('user_id',$request->get('user_id'))->where('logout_time','<>',NULL)->limit(1)->get();
      return view('Admin.Layouts.last_login_timing',compact('user_login_record_update'));
    }

    public function changeStatus($id){

         $user_id= Hashids::decode($id);   
         $user_record = User::where('user_id', $user_id)->first();

        if($user_record->active == 1){
          $user_record->active = 0;
        }else{
          $user_record->active = 1;
        }
        $user_record->save();
        
        return redirect()->back()->with('message','User Status has been changed');
    }
}






