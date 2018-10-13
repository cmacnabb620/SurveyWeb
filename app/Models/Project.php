<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Project extends Model
{
    protected $table 		= 'project';
    protected $primaryKey 	= 'project_id';
    protected $fillable 	= [
        'project_id', 'project_name','project_manager_id','client_id','language_id','survey_type_id','report_freq_id','project_status','last_update'
    ];
    public $timestamps 		= false;
}

