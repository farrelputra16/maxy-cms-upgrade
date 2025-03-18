<?php

namespace Modules\RedeemCode\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RedeemCode extends Model
{
    use HasFactory;

    protected $table = 'redeem_code';

    protected $fillable = [
        'name',
        'code',
        'quota',
        'expired_date',
        'type',
        'description',
        'status',
        'created_id',
        'updated_id',
    ];

    protected static function newFactory()
    {
        return \Modules\RedeemCode\Database\factories\RedeemCodeFactory::new();
    }
}
