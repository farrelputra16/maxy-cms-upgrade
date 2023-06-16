<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDifficultyType extends Model
{
    use HasFactory;

    protected $table = 'm_difficulty_type';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
