<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCourseType extends Model
{
    use HasFactory;

    protected $table = 'm_course_type';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function Course()
    {
        return $this->hasMany(Course::class, 'm_course_type_id');
    }
}
