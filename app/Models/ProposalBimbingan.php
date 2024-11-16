<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use illuminate\Support\Facades\Auth;

class ProposalBimbingan extends Model
{
    use HasFactory;

    protected $table = 'proposal_bimbingan';

    protected $fillable = [
        'proposal_id',
        'user_id',
        'm_proposal_status_id',
        'level',
        'priority',
        'description',
        'status',
        'created_id',
        'updated_id'
    ];

    public function MProposalBimbinganStatus()
    {
        return $this->belongsTo(MProposalBimbinganStatus::class, 'm_proposal_status_id')->where('status', 1);
    }

    public function MProposalBimbinganType()
    {
        return $this->belongsTo(MProposalBimbinganType::class, 'm_proposal_type_id')->where('status', 1);
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id')->where('status', 1);
    }

    public function ProposalBimbinganBimbingan()
    {
        return $this->hasMany(ProposalBimbinganBimbingan::class, 'id')->where('status', 1);
    }
}
