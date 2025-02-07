<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSkill extends Model
{
    use HasFactory;

    protected $table = 'm_skill';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skill', 'm_skill_id', 'user_id');
    }
}
