<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPartnerType extends Model
{
    use HasFactory;

    protected $table = 'm_partner_type';

    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function Partner()
    {
        return $this->hasMany(Partner::class, 'id')->where('status', 1);
    }
}
