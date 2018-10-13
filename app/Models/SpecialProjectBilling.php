<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class SpecialProjectBilling extends Model
{
    protected $table = 'special_project_billing';
    protected $primaryKey = 'special_project_id';
}

