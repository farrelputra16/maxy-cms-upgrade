<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use illuminate\Support\Facades\Auth;

class Proposal extends Model
{
    use HasFactory;

    protected $table = 'proposal';

    protected $fillable = [
        'm_proposal_status_id',
        'proposal_grade',
        'description',
        'status',
        'updated_at',
        'updated_id'
    ];

    public function MProposalStatus()
    {
        return $this->belongsTo(MProposalStatus::class, 'm_proposal_status_id')->where('status', 1);
    }

    public function MProposalType()
    {
        return $this->belongsTo(MProposalType::class, 'm_proposal_type_id')->where('status', 1);
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'student_id')->where('status', 1);
    }

    public function ProposalBimbingan()
    {
        return $this->hasMany(ProposalBimbingan::class, 'id')->where('status', 1);
    }
}
