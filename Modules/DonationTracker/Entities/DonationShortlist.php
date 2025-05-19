<?php

namespace Modules\DonationTracker\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonationShortlist extends Model
{
    use HasFactory;

    protected $table = 'sponsor_shortlist';

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\DonationTracker\Database\factories\DonationShortlistFactory::new();
    }
}
