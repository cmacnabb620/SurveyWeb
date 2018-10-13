<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Call extends Model
{
    protected $table = 'call';
    protected $primaryKey = 'call_id';
}

