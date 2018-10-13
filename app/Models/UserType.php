<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserType extends Model
{
    protected $table = 'user_type';
    protected $primaryKey = 'user_type_id';
    public $timestamps  = false ;
    protected $fillable   = [   
                              'user_type_id',
                              'user_type_desc',
                              'last_update'
                            ];
}

