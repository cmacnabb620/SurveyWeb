<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ReportFreq extends Model
{
    protected $table 			= 'report_freq';
    protected $primaryKey 		= 'report_freq_id';
    protected $fillable 		= [
        'report_freq_id', 'report_frequency','last_update'
    ];
    public $timestamps 			= false;
}

