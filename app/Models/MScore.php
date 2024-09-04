<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MScore extends Model
{
    use HasFactory;

    protected $table = 'm_score';

    protected $fillable = [
        'name',
        'range_start',
        'range_end',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function Transkrip()
    {
        return $this->hasMany(Transkrip::class, 'm_score_id');
    }
}
