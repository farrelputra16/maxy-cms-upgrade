<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBlogTag extends Model
{
    use HasFactory;

    protected $table = 'm_blog_tag';

    protected $fillable = [
        'name',
    ];

    public function blogs()
    {
        return $this->belongsToMany(MBlog::class, 'blog_tag', 'm_blog_tag_id', 'm_blog_id');
    }
}
