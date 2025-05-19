<?php

namespace Modules\DonationTracker\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FundAllocation extends Model
{
    use HasFactory;

    protected $table = 'fund_allocation';

    protected $fillable = [
        'user_id',
        'donation_id',
        'value',
        'description',
        'status',
        'created_id',
        'updated_id',
    ];

    protected static function newFactory()
    {
        return \Modules\DonationTracker\Database\factories\FundAllocationFactory::new();
    }
}
