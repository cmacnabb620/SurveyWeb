<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ProjectBridge extends Model
{
    protected $table = 'project_bridge';
    protected $primaryKey = 'questionnaire_id';
}

