<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroup extends Model
{
    use HasFactory;

    protected $table = 'access_group';
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function AccessMaster()
    {
        return $this->belongsToMany(AccessMaster::class, 'access_group_detail')->withPivot('access_master_id');
    }
}
