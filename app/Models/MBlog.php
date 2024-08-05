<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBlog extends Model
{
    use HasFactory;

    protected $table = 'm_blog';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'cover_img',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id',
    ];

    public function tags()
    {
        return $this->belongsToMany(MBlogTag::class, 'blog_tag', 'm_blog_id', 'm_blog_tag_id');
    }
}
