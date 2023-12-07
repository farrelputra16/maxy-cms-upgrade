<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransOrderConfirm extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_confirm_number',
        'date',
        'amount',
        'image',
        'sender_account_name',
        'sender_account_number',
        'course_id',
        'course_class_id',
        'sender_bank',
        'trans_order_id',
        'm_bank_account_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];


    protected $table = 'trans_order_confirm';
}
