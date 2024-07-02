<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $guarded = [];
    protected $with = ['user', 'tutor', 'courseClassModule'];

    protected $fillable = [
        'user_id',
        'attendance_type',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['attendance_type']), function ($q) use ($filters) {
            $q->where('attendance_type', $filters['attendance_type']);
        });

        return $query;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id')->where('type', 'tutor');
    }

    public function courseClassModule()
    {
        return $this->belongsTo(\Modules\ClassContentManagement\Entities\CourseClassModule::class);
    }
    
}
