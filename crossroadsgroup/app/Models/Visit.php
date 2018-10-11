<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Visit extends Model
{
    protected $table = 'visit';
    protected $primaryKey = 'visit_id';
    protected $fillable = [
        'visit_id', 'visit_date', 'visitcol','clinic_id','provider_id', 'specialty_id', 'patient_id'
            ];
    public $timestamps = false;
}

