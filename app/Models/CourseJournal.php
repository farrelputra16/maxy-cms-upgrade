<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use illuminate\Support\Facades\Auth;

class CourseJournal extends Model
{
    use HasFactory;

    protected $table = 'course_journal';

    protected $fillable = [
        'user_id',
        'course_class_module_id',
        'course_journal_parent_id',
        'level',
        'priority',
        'description',
        'created_id',
        'updated_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id')->where('status', 1);
    }

    // public function CourseJournalBimbingan()
    // {
    //     return $this->hasMany(CourseJournalBimbingan::class, 'id')->where('status', 1);
    // }
}
