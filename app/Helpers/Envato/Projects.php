<?php
//app/Helpers/Envato/User.php
namespace App\Helpers\Envato;
 
use Illuminate\Support\Facades\DB;
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
 
class Projects {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_project(/*$user_id*/) {
    	return 'My Custome helpor projects';
        //$user = DB::table('users')->where('userid', $user_id)->first();
         
      /*  return (isset($user->username) ? $user->username : '');*/
    }
}