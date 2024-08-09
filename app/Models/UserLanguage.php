<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    use HasFactory;

    public $table = 'user_language';

    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function MLanguage()
    {
        return $this->belongsTo(MLanguage::class, 'm_language_id');
    }
}
