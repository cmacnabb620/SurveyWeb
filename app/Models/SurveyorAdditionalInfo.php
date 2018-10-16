<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SurveyorAdditionalInfo extends Model
{
    protected $table = 'surveyor_additional_info';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'surveyor_id', 'languages'
    ];
    public $timestamps = false;
}

