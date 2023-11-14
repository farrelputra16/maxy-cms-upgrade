<?php

namespace Modules\TrackandGrade\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClassMemberLog extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\TrackandGrade\Database\factories\CourseClassMemberLogFactory::new();
    }
}
