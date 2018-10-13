<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tag extends Model
{
    protected $table = 'tag';
    protected $primaryKey = 'tag_id';
    protected $fillable = ['tag'];
    public $timestamps = false;
}

