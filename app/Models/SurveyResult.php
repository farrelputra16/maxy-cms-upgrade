<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    use HasFactory;

    protected $table = 'survey_result';

    public function MSurvey()
    {
        return $this->belongsTo(MSurvey::class, 'survey_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
