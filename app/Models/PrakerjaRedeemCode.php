<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerjaRedeemCode extends Model
{
    use HasFactory;

    protected $table = 'prakerja_redeem_code';

    protected $fillable = [
            'redeem_code',
            'course_class_id',
            'course_class_member_id',
            'description',
            'status',       
            'created',
            'created_id',
            'updated',
            'updated_id'
    ];
}
