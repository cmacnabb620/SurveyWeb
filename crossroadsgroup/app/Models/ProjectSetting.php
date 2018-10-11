<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ProjectSetting extends Model
{
    protected $table = 'project_settings';
    protected $primaryKey = 'questionnaire_id';
}

