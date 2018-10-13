<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'address_id';
    protected $fillable = [
        'address', 'address2', 'district','city','postal_code','country','state','phone','last_update'
    ];
    public $timestamps = false;
}

