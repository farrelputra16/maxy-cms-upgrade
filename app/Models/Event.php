<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $table = 'event';

    protected $fillable = [
        'm_event_type_id',
        'name',
        'date_start',
        'date_end',
        'url',
        'is_need_verification',
        'is_public',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function event_type()
    {
        return $this->belongsTo(MEventType::class, 'm_event_type_id');
    }

    public function EventRequirement()
    {
        return $this->hasMany(EventRequirement::class, 'event_id');
    }
}
