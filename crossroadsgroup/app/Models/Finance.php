<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Finance extends Model
{
    protected $table = 'finance';
    protected $primaryKey = 'finance_id';
}

