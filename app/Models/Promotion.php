<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'm_promo';

    protected $fillable = [
        'name',
        'code',
        'start_date',
        'end_date',
        'discount_type',
        'discount',
        'max_discount',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
