<?php

namespace Modules\CertificateTemplate\Entities;

use App\Models\MCourseType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CertificateTemplate extends Model
{
    use HasFactory;

    protected $table = 'certificate_template';
    protected $guarded = [];
    protected $casts = [
        'marker_state' => 'json',
    ];

    public function type()
    {
        return $this->belongsTo(MCourseType::class, 'm_course_type_id');
    }

    protected static function newFactory()
    {
        return \Modules\CertificateTemplate\Database\factories\CertificateTemplateFactory::new();
    }
}
