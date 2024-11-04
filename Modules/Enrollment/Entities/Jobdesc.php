<?php

namespace Modules\Enrollment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Modules\ClassContentManagement\Entities\CourseClass;
use DB;

class Jobdesc extends Model
{
    use HasFactory;
    protected $table = 'jobdesc';

    protected $guarded = [];
}