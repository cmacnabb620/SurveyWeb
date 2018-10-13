<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Status extends Model
{
    protected $table 			= 'status';
    protected $primaryKey 		= 'status_id';
    protected $fillable 		= [
        'status_id', 'status'
    ];
    public $timestamps 			= false;
}

