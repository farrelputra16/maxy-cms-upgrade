<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    use HasFactory;
    
    protected $table = 'course_category';

    protected $fillable = [
        'category_id',
        'course_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
