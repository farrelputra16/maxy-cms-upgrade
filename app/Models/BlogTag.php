<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogTag extends Model
{
    use HasFactory;

    protected $table = 'blog_tag';

    protected $fillable = [
        'id_blog',
        'id_blog_tag',
    ];

    public static function CurrentBlogTags($idBlog)
    {
        $currentBlogTags = DB::table('blog_tag')
            ->join('m_blog_tag', 'blog_tag.m_blog_tag_id', '=', 'm_blog_tag.id')
            ->select('m_blog_tag.id', 'm_blog_tag.name')
            ->where('blog_tag.m_blog_id', '=', $idBlog)
            ->get();

        return $currentBlogTags;
    }
}
