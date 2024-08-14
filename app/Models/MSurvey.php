<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSurvey extends Model
{
    use HasFactory;

    protected $table = 'm_survey';

    protected $fillable = [
        'name',
        'expired_date',
        'survey',
        'type',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    // public function Proposal()
    // {
    //     return $this->hasMany(Proposal::class, 'id')->where('status', 1);
    // }
}
