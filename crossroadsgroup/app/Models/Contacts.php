<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Contacts extends Model
{
    protected $table = 'contactss';
    protected $fillable = [
        'id','first_name', 'last_name', 'email'
    ];
    public $timestamps = false;
}

