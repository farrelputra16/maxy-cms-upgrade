<?php

namespace Modules\TrackandGrade\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClassMemberLog extends Model
{
    use HasFactory;

    protected $table = 'course_class_member_log';
    
    protected static function newFactory()
    {
        return \Modules\TrackandGrade\Database\factories\CourseClassMemberLogFactory::new();
    }

    public function getFormattedLogAttribute()
{
    // Logika untuk menggabungkan data
    if ($this->status_log == 1) {
        if ($this->course_type == 'pretest' || $this->course_type == 'postest' || $this->course_type == 'unjukketerampilan') {
            return "{$this->user_name} di kelas {$this->course_name} - Batch {$this->batch} Mendapatkan Paket Soal {$this->paket_soal} Mengerjakan Module yaitu {$this->course_module_name} - Day {$this->day}";
        } elseif ($this->course_type == 'assignment') {
            return "{$this->user_name} di kelas {$this->course_name} - Batch {$this->batch} Mengumpulkan(submit) Tugas Module yaitu {$this->course_module_name} - Day {$this->day}";
        }
    } elseif ($this->status_log == 2) {
        if ($this->log_type == 'profile') {
            return "{$this->user_name} Membuka Profilenya";
        } else {
            return "{$this->user_name} di kelas {$this->course_name} - Batch {$this->batch}, Membuka Module yaitu {$this->course_module_name} - Day {$this->day}";
        }
    } elseif ($this->status_log == 3) {
        return "{$this->user_name} Mengubah Profilenya";
    } elseif ($this->status_log == 4) {
        if ($this->log_type == 'profile') {
            return "{$this->user_name} Mengubah Foto Profilenya";
        } else {
            return "{$this->user_name} di kelas {$this->course_name} - Batch {$this->batch}, Menghapus(unsubmit) Tugas Modulenya yaitu {$this->course_module_name} - Day {$this->day}";
        }
    } else {
        return "";
    }
}
}
