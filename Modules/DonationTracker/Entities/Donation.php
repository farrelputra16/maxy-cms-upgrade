<?php

namespace Modules\DonationTracker\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donation';

    protected $fillable = [
        'name',
        'donator_id',
        'value',
        'description',
        'status',
        'created_id',
        'updated_id',
    ];

    protected static function newFactory()
    {
        return \Modules\DonationTracker\Database\factories\DonationFactory::new();
    }

    public function donator()
    {
        return $this->belongsTo(User::class, 'donator_id');
    }
    public function fundAllocations()
    {
        return $this->hasMany(FundAllocation::class);
    }
}
