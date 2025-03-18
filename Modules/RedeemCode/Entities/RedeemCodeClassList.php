<?php

namespace Modules\RedeemCode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RedeemCodeClassList extends Model
{
    use HasFactory;

    protected $table = 'course_class_redeem_code';

    protected $fillable = [
        'redeem_code_id',
        'course_class_id',
        'created_id',
        'updated_id'
    ];

    protected static function newFactory()
    {
        return \Modules\RedeemCode\Database\factories\RedeemCodeClassListFactory::new();
    }
}
