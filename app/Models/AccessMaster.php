<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessMaster extends Model
{
    use HasFactory;

    protected $table = 'access_master';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function AccessGroups()
    {
        return $this->belongsToMany(AccessGroup::class, 'access_group_detail')->withPivot('id_access_group');
    }
}
