<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class CsvData extends Model
{
protected $table = 'csv_data';
protected $fillable = ['csv_filename', 'csv_header', 'csv_data'];
 public $timestamps = false;
}

