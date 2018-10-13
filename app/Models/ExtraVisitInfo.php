<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ExtraVisitInfo extends Model
{
    protected $table = 'extra_visit_info';
    protected $primaryKey = 'extra_visit_info_id';
    protected $fillable = [
        'extra_visit_info_id', 'visit_id', 'field','answer'
    ];
    public $timestamps = false;
}

