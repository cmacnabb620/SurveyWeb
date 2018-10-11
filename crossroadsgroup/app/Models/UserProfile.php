<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserProfile extends Model
{
    protected $table = 'user_profile';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id', 'profile_pic'
    ];
    public $timestamps = false;
}
