<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $table = 'm_general';

    protected $fillable = [
            'name',
            'value',
            'description',
            'status',
            'created_at',
            'updated_at',
            'created_id',
            'updated_id'
    ];
}
