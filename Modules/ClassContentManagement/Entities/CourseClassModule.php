<?php

namespace Modules\ClassContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClassModule extends Model
{
    use HasFactory;

    protected $table ='course_class_module';
    protected $fillable = [
        'start_date',
        'end_date',
        'priority',
        'course_module_id',
        'course_class_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\ClassContentManagement\Database\factories\CourseClassModuleFactory::new();
    }
}
