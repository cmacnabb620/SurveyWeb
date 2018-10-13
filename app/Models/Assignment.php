<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Assignment extends Model
{
    protected $table = 'assignment';
    protected $primaryKey = 'assignment_id';
}

