<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventParticipantRequirement extends Model
{
    use HasFactory;

    protected $table = 'event_participant_requirement';

    public function EventRequirement()
    {
        return $this->belongsTo(EventRequirement::class, 'event_requirement_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
