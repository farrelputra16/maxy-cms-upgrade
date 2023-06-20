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
        'id_course',
        'id_course_class',
        'id_member',
        'id_course_package',
        'id_promotion',
        'forced_at',
        'forced_comment',
        'id_user_forced',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
}
