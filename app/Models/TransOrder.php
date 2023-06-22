<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransOrder extends Model
{
    use HasFactory;

    protected $table = 'trans_order';

    protected $fillable = [
        'order_number',
        'date',
        'total',
        'discount',
        'total_after_discount',
        'payment_status',
        'course_id',
        'course_class_id',
        'member_id',
        'course_package_id',
        'promotion_id',
        'forced_at',
        'forced_comment',
        'user_forced_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
