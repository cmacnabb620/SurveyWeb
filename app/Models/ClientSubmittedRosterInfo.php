<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class ClientSubmittedRosterInfo extends Model
{
protected $table = 'client_submitted_roster_info';
protected $primaryKey = 'id';
protected $fillable = ['roster_filename', 'roster_info', 'project_id','client_id','submitted_date'];
public $timestamps = false;
}

