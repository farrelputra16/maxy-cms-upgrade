<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';
    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'id_m_course_type', 
        'id_m_difficulty_type',
        'fake_price',
        'price',
        'discounted_price',
        'short_description',
        'image',
        'preview',
        'target',
        'payment_link',
        'status',
        'created_id',
        'updated_id',
        'discounted_price'
    ];

}