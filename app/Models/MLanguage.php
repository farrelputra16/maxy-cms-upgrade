<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MLanguage extends Model
{
    use HasFactory;

    protected $table = 'm_language';

    public function UserLanguage()
    {
        return $this->hasMany(UserLanguage::class, 'm_language_id');
    }
}
