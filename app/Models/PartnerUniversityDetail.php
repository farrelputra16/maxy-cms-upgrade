<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerUniversityDetail extends Model
{
    use HasFactory;

    protected $table = 'partner_university_detail';

    protected $fillable = [
        'name',
        'type',
        'ref',
        'partner_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
