<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CallDispo extends Model
{
    protected $table = 'call_dispo';
    protected $primaryKey = 'call_dispo_id';
}

