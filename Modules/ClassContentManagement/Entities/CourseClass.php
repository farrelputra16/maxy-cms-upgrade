<?php

namespace Modules\ClassContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClass extends Model
{
    use HasFactory;

    protected $table = 'course_class';

    protected $fillable = [
        'batch',
        'start_date',
        'end_date',
        'quota',
        'course_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\ClassContentManagement\Database\factories\CourseClassFactory::new();
    }
}
