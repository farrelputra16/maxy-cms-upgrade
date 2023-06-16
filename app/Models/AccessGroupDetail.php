<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessGroupDetail extends Model
{
    use HasFactory;

    protected $table = 'access_group_detail';

    protected $fillable = [
        'id_access_group',
        'id_access_master',
        'priority',
    ];
}
