<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAcademicPeriod extends Model
{
    use HasFactory;

    protected $table = 'm_academic_period';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function Schedule()
    {
        return $this->hasMany(Schedule::class, 'm_academic_period_id');
    }
}
