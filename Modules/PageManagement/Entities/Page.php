<?php

namespace Modules\PageManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    use HasFactory;

    protected $table = 'm_page';

    protected $fillable = [
        'name',
        'route_name',
        'slug',
        'title',
        'favicon_url',
        'gtm_header',
        'gtm_body',
        'ga_id',
        'custom_css',
        'header_code',
        'footer_code',
        'social_image_url',
        'additional_script',
        'description',
        'status',
        'created_id',
        'updated_id',
    ];

    protected static function newFactory()
    {
        return \Modules\PageManagement\Database\factories\PageFactory::new();
    }

    public static function getPages(){
        return DB::table('m_page')->get();
    }
    public static function getPageDetailById($id){
        return DB::table('m_page')->where('id', $id)->first();
    }
}
