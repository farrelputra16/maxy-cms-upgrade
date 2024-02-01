<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBankAccount extends Model
{
    use HasFactory;

    protected $table = 'm_bank_account';

    public function bank()
    {
        return $this->belongsTo(MBank::class, 'm_bank_id');
    }
}
