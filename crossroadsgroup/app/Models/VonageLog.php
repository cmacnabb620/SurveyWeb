<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class VonageLog extends Model
{
    protected $table = 'vonage_log';
    protected $primaryKey = 'vonage_log_id';
}

