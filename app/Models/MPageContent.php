<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPageContent extends Model
{
    use HasFactory;

    protected $table = 'm_page_content';

    protected $fillable = [
        'page_id',
        'section_name',
        'content',
        'status',
        'order',
        'image',
        'created_id',
        'updated_id',
    ];
}
