<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProgrammingLanguage extends Model
{
    use HasFactory;

    protected $table = 'm_programming_language';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
