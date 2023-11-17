<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePackageBenefit extends Model
{
    use HasFactory;

    protected $table = 'course_package_benefit';

    protected $fillable = [
        'name',
        'course_package_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
