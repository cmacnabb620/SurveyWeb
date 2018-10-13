<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DistType extends Model
{
    protected $table 		= 'dist_types';
    protected $primaryKey 	= 'dist_types_id';
    protected $fillable 	= [
        'dist_types_id', 'dist_type'
    ];
    public $timestamps 	 	= false;
}

