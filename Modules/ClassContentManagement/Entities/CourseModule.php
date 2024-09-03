<?php

namespace Modules\ClassContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Auth;
use DB;

class CourseModule extends Model
{
    use HasFactory;

    protected $table ='course_module';

    public function CourseClassModule()
    {
        return $this->hasMany(CourseClassModule::class, 'course_module_id');
    }
}
