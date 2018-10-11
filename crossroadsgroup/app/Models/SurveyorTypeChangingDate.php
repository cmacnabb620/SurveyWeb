<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SurveyorTypeChangingDate extends Model
{
    protected $table = 'surveyor_type_changing_dates';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id', 'prospective_date','trainee_date','active_date','inactive_date'
    ];
    public $timestamps = false;
}
