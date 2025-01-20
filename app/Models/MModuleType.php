<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MModuleType extends Model
{
    use HasFactory;

    protected $table = 'm_module_type';

    protected $fillable = [
        'name',
        'icon',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id',
    ];

    public function CourseModule()
    {
        return $this->hasMany(CourseModule::class, 'type', 'id');
    }
}
