<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserLoginTime extends Model
{
    protected $table = 'user_login_time';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'login_time','login_time','is_mobile','is_tablet','is_desktop','browser_name','plateform_name','ip_address','last_request_url','last_request_url_time'
    ];
    public $timestamps = true;
}
