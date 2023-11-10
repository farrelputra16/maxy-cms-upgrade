<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    
    protected $table = 'user_testimonial';

    protected $fillable = [
        'stars',
        'role',
        'status_highlight',
        'user_id',
        'course_id',
        'course_class_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
