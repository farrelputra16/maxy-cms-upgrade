<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fake_price',
        'price',
        'discounted_price',
        'short_description',
        'image',
        'preview',
        'target',
        'payment_link',
        'slug',
        'id_m_course_type',
        'id_m_difficulty_type',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
