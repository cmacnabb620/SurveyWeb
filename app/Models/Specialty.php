<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Specialty extends Model
{
    protected $table = 'specialty';
    protected $primaryKey = 'specialty_id';
    protected $fillable   = [
        'specialty_id', 'specialty_name','surveys_required'
    ];
    public $timestamps    = false;
}

