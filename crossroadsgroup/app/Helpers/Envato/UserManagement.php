<?php
//app/Helpers/Envato/User.php
namespace App\Helpers\Envato;
 
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Crypt;
use App\Models\UserLoginTime;
use App\Models\Language;
use App\Models\Project;
use App\Models\SurveyType;
use App\Models\ReportFreq;
use App\Models\Client;
use App\Models\Status;
use Browser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

 
class UserManagement {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_username($user_id) {
        $user = DB::table('users')->where('user_id', $user_id)->first(); 
        return (isset($user->username) ? $user->username : '');
    }

    public static function get_user_full_name($user_id) {
        $user_table_record = DB::table('users')->where('user_id', $user_id)->first(); 
        $contact_table_record = DB::table('contact')->where('contact_id', $user_table_record->contact_id)->first();
        $full_name= ucfirst(Crypt::decryptString($contact_table_record->first_name)).' '.ucfirst(Crypt::decryptString($contact_table_record->last_name));
        return (isset($full_name) ? $full_name : '');
    }

    public static function user_check($user_type_id) {
        $user_type = DB::table('user_type')->where('user_type_id', $user_type_id)->first(); 
        return (isset($user_type->user_type_id) ? $user_type->user_type_id : '');
    }

public static function profile_pic($user_id,$user_type) {
    $profile_pic_data = User::join('user_type as usertype', 'usertype.user_type_id', '=', 'users.user_type_id')
                   ->leftJoin('user_profile', 'user_profile.user_id', '=', 'users.user_id')
                   ->where('users.user_type_id',$user_type)
                   ->where('users.user_id',$user_id)
                   ->select('*')
                   ->first();
    return $profile_pic_data->profile_pic;

  }

   /* public static function rrrandom_username($string) {
       return substr(str_replace(' ','',strtolower($string)), 0, 5).rand(1,100000000);
    }
*/
    public static function random_username($str1,$str2){
      $current_date_time = Carbon::now();
      $current_year_last_two_digits=substr($current_date_time->year,-2);
      $current_month=$current_date_time->month;
      $current_date=$current_date_time->day;   
      return lcfirst($str1[0]).lcfirst($str2[0].$str2[1].$str2[2]).$current_month.$current_year_last_two_digits;
    }

    public static function user_type_list($usertype){
        $user_types= User::join('user_type as usertype', 'usertype.user_type_id', '=', 'users.user_type_id')
                   ->join('contact','users.contact_id','=','contact.contact_id')
                   ->join('tag_bridge','users.tag_bridge_user_id','=','tag_bridge.user_id')
                   ->join('address', 'address.address_id', '=', 'contact.address_id')
                   ->where('users.user_type_id',$usertype)
                   ->select('*','users.user_id as main_user_id')
                   ->get();
        return $user_types;
    }

    public static function edit_user($userid,$usertype){
        $singleuser_record= User::join('user_type as usertype', 'usertype.user_type_id', '=', 'users.user_type_id')
                   ->join('contact','users.contact_id','=','contact.contact_id')
                   ->join('tag_bridge','users.tag_bridge_user_id','=','tag_bridge.user_id')
                   ->join('address', 'address.address_id', '=', 'contact.address_id')
                   ->leftJoin('surveyor_type_changing_dates', 'surveyor_type_changing_dates.user_id', '=', 'users.user_id')
                   ->where('users.user_type_id',$usertype)
                   ->where('users.user_id',$userid)
                   ->select('*','users.user_id as main_user_id','address.address_id as address_table_id','tag_bridge.user_id as tag_user_id')
                   ->first();
        return $singleuser_record;
    }

    public static function login_time_user_detect_info(Request $request) {
      /*  $name = split("[ .-]", $string);*/
           $current_time = Carbon::now();
           $user_token = uniqid('unique_user');
           $user_login_time = new UserLoginTime;
           $user_login_time->user_id    = Auth::user()->user_id;
           $user_login_time->user_token = sha1($user_token);
           $user_login_time->login_time = $current_time->toDateTimeString();
           if(Browser::isMobile() == true){
            $user_login_time->is_mobile = true;
           }elseif(Browser::isTablet() == true){
            $user_login_time->is_tablet = true;
           }elseif(Browser::isDesktop() == true){
            $user_login_time->is_desktop = true;
           }
           $user_login_time->browser_name = Browser::browserName();
           $user_login_time->plateform_name = Browser::platformName();
           $user_login_time->ip_address = $request->ip();
           $user_login_time->last_request_url = url()->full();
           $user_login_time->last_request_url_time = $current_time->toDateTimeString();
           $user_login_time->save();
           Session::put('login_time_user_token', $user_login_time->user_token);
           return 'success';
    }

    public static function timie_caliculate_difference_in_milliseconds(){
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

    public static function projects_count(){
       return $projects_count = Project::count();
        
    }

    public static function get_client_full_name($client_id) { 
        $contact_table_record = DB::table('client')->where('client_id',$client_id)->first();
        $full_name= ucfirst(Crypt::decryptString($contact_table_record->name));
        return (isset($full_name) ? $full_name : '');
    } 
    public static function get_client_org_name($client_id) { 
        $contact_table_record = DB::table('client')->where('client_id',$client_id)->first();
        $org_name= ucfirst(Crypt::decryptString($contact_table_record->org_abbrev));
        return (isset($org_name) ? $org_name : '');
    } 
    public static function get_client_type($client_id) { 
        $contact_table_record = DB::table('client')->where('client_id',$client_id)->first();
        $client_type= ucfirst(Crypt::decryptString($contact_table_record->client_type));
        return (isset($client_type) ? $client_type : '');
    }
    public static function get_project_status($status_id) { 
        $project_status_record = DB::table('status')->where('status_id',$status_id)->first();
        $status_name= ucfirst($project_status_record->status);
        return (isset($status_name) ? $status_name : '');
    }
    public static function get_report_frequeny($report_frequency_id) { 
        $report_frequency_record = DB::table('report_freq')->where('report_freq_id',$report_frequency_id)->first();
        $report_frequency_name= ucfirst($report_frequency_record->report_frequency);
        return (isset($report_frequency_name) ? $report_frequency_name : '');
    }
    public static function get_survey_type($survey_type_id) { 
        $survey_type_record = DB::table('survey_type')->where('survey_type_id',$survey_type_id)->first();
        $survey_type_name= ucfirst($survey_type_record->survey_type);
        return (isset($survey_type_name) ? $survey_type_name : '');
    }

    public static function project_related_language($language_id) { 
        $project_language_record = DB::table('language')->where('language_id',$language_id)->first();
        $project_language= ucfirst($project_language_record->language);
        return (isset($project_language) ? $project_language : '');
    } 
    public static function get_client_address($address_id) { 
        $client_address_record = DB::table('address')->where('address_id',$address_id)->first();
        return (isset($client_address_record) ? $client_address_record : '');
    }

    

  
}