<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemCode extends Model
{
    use HasFactory;

    protected $table = 'redeem_code';
    protected $guarded = [];
    protected $with = ['userCreated', 'userUpdated'];

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'created_id', 'id');
    }

    public function userUpdated()
    {
        return $this->belongsTo(User::class, 'updated_id', 'id');
    }
}
