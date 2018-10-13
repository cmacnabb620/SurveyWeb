<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SurveyType extends Model
{
    protected $table 			= 'survey_type';
    protected $primaryKey 		= 'survey_type_id';
    protected $fillable 		= [
        'survey_type_id', 'survey_type','last_update'
    ];
    public $timestamps 			= false;
}

