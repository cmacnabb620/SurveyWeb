<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Language extends Model
{
    protected $table = 'language';
    protected $primaryKey = 'language_id';
    protected $fillable 	= [
        'language_id', 'language', 'iso_name','last_update'
    ];
    public $timestamps 		= false;
}

