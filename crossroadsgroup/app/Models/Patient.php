<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Patient extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'patient_id';
}

