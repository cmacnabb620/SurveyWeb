<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'first_name', 'last_name', 'email','title','phone','phone2','DOB','client_id','address_id','last_update'
    ];
    public $timestamps = false;
}

