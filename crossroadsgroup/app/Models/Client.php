<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Client extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'client_id';
    protected $fillable 		= [
        'client_id', 'name','org_abbrev','address_id','client_type','client_status','last_update'
    ];
    public $timestamps 			= false;
}

