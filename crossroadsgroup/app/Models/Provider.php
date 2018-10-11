<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Provider extends Model
{
    protected $table 	  = 'provider';
    protected $primaryKey = 'NPI';
    protected $fillable   = [
        'NPI', 'first_name','last_name','surveys_required','surveys_completed','last_update'
    ];
    public $timestamps    = false;
}

