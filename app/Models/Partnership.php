<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;
    
    protected $table = 'partnership';

    protected $fillable = [
        'm_partner_id',
        'm_partnership_type_id',
        'file',
        'date_start',
        'date_end',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function MPartnershipType()
    {
        return $this->belongsTo(MPartnershipType::class, 'm_partnership_type_id');
    }

    public function Partner()
    {
        return $this->belongsTo(Partner::class, 'm_partner_id');
    }
}
