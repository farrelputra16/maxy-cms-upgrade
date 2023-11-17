<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxyTalk extends Model
{
    use HasFactory;

    protected $table = 'maxy_talk';

    protected $fillable = [
        'name',
        'img',
        'start_date',
        'end_date',
        'register_link',
        'priority',
        'users_id',
        'maxy_talk_parent_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id',
    ];
}
