<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JdAgentPageConf extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'jd_agent_page_conf';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'page_name',
        'slug',
        'user_id',
        'content_setting',
        'testimonial_setting',
        'color_setting',
        'contact_setting',
        'description',
        'status',
        'created_id',
        'updated_id'
    ];
}
