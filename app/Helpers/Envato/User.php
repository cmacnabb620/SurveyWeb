<?php
//app/Helpers/Envato/User.php
namespace App\Helpers\Envato;
 
use Illuminate\Support\Facades\DB;

class User {
    /**
     * @param int $user_id User-id
     * 
     * @return string
     */
    public static function get_username($user_id) {
        $user = DB::table('users')->where('user_id', $user_id)->first(); 
        return (isset($user->username) ? $user->username : '');
    }

    public static function user_check($user_type_id) {
        $user_type = DB::table('user_type')->where('user_type_id', $user_type_id)->first(); 
        return (isset($user_type->user_type_id) ? $user_type->user_type_id : '');
    }

    public static function random_username($string) {
      /*  $name = split("[ .-]", $string);*/
       return substr(str_replace(' ','',strtolower($string)), 0, 5).rand(1,100000000);
    }
}