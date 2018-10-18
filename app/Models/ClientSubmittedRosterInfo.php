<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ClientSubmittedRosterInfo extends Model
{
protected $table = 'client_submitted_roster_info';
protected $primaryKey = 'id';
protected $fillable = ['roster_filename','week_number','week_start_date','week_end_date', 'roster_info', 'project_id','client_id','flag','submitted_date'];
public $timestamps = false;
}

