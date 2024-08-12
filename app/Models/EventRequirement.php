<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventRequirement extends Model
{
    use HasFactory;

    protected $table = 'event_requirement';

    protected $fillable = [
        'event_id',
        'name',
        'description',
        'status',
        'is_upload',
        'is_required',
        'created_id',
        'updated_id'
    ];

    public static function getRequirementsByEventId($event_id)
    {
        return DB::table('event_requirement as er')
            ->select('er.*', 'e.name as event_name')
            ->join('event as e', 'er.event_id', 'e.id')
            ->where('event_id', $event_id)
            ->get();
    }

    public function EventParticipantRequirement()
    {
        return $this->hasMany(EventParticipantRequirement::class, 'event_requirement_id');
    }

    public function Event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
