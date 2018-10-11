<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Quality extends Model
{
    protected $table = 'quality';
    protected $primaryKey = 'quality_id';
}

