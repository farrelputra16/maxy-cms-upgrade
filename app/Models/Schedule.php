<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $table = 'schedule';

    protected $fillable = [
        'course_class_id',
        'academic_period',
        'day',
        'location',
        'category',
        'date_start',
        'date_end',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function CourseClass()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }
}
