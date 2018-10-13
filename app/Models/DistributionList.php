<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class DistributionList extends Model
{
    protected $table = 'distribution_list';
    protected $primaryKey = 'dist_list_id';
}

