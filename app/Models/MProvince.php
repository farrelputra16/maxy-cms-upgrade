<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProvince extends Model
{
    use HasFactory;

    protected $table = 'm_province';
    protected $fillable = [
        'name',
        'keterangan',
        'created',
        'created_id',
        'updated',
        'updated_id'
    ];
}
