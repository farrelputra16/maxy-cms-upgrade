<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePackage extends Model
{
    use HasFactory;

    protected $table = 'course_package';

    protected $fillable = [
        'name',
        'fake_price',
        'price',
        'description',
        'status',
        'created_at',
        'created_id',
        'created_at',
        'updated_id'
    ];
}
