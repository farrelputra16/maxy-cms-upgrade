<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'm_partner';

    protected $fillable = [
        'name',
        'type',
        'url',
        'address',
        'phone',
        'email',
        'contact_person',
        'logo',
        'description',
        'status',
        'status_highlight',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function Partnership()
    {
        return $this->hasMany(Partnership::class, 'id')->where('status', 1);
    }

    public function MPartnerType()
    {
        return $this->belongsTo(MPartnerType::class, 'type')->where('status', 1);
    }
}
