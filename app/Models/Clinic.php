<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Clinic extends Model
{
    protected $table = 'clinic';
    protected $primaryKey = 'clinic_id';
}

