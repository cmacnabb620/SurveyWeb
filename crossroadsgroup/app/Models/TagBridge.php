<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class TagBridge extends Model
{
    protected $table = 'tag_bridge';
    protected $primaryKey = 'user_id';
    protected $fillable = ['tag_id','tag_tag_id'];
    public $timestamps = false;
}

