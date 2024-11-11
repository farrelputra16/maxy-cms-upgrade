<?php

namespace Modules\Enrollment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Modules\ClassContentManagement\Entities\CourseClass;
use Illuminate\Support\Facades\DB;

class CourseClassMember extends Model
{
    use HasFactory;

    protected $table = 'course_class_member';

    protected $guarded = [];

    protected $with = ['user', 'courseClass'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courseClass() {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }

    public static function getCourseClassMember($request)
    {
        $idCourse = $request->id;

        if ($idCourse !== null) {
            $courseClassMembers = DB::table('course_class_member')
                ->select(
                    'course_class_member.id AS id',
                    'course_class_member.description AS description',
                    'course_class_member.status AS status',
                    'course_class_member.created_at AS created_at',
                    'course_class_member.created_id AS created_id',
                    'course_class_member.updated_at AS updated_at',
                    'course_class_member.updated_id AS updated_id',
                    'users.id AS user_id',
                    'users.name AS user_name',
                    'course_class.batch AS course_class_batch',
                    'course.name AS course_name',
                )
                ->join('users', 'course_class_member.user_id', '=', 'users.id')
                ->join('course_class', 'course_class_member.course_class_id', '=', 'course_class.id')
                ->join('course', 'course_class.course_id', '=', 'course.id')
                ->leftJoin('user_mentorships', function ($join) {
                    $join->on('course_class_member.user_id', '=', 'user_mentorships.mentor_id')
                        ->where('users.type', '=', 'tutor'); // Hanya ambil jobdesc jika user bertipe tutor
                })
                ->where('course_class_member.course_class_id', $idCourse)
                ->groupBy(
                    'course_class_member.id',
                    'course_class_member.description',
                    'course_class_member.status',
                    'course_class_member.created_at',
                    'course_class_member.created_id',
                    'course_class_member.updated_at',
                    'course_class_member.updated_id',
                    'users.id',
                    'users.name',
                    'course_class.batch',
                    'course.name'
                )
                ->get();
        } else {
            $courseClassMembers = collect(DB::select('SELECT
                course_class_member.id AS id,
                course_class_member.description AS description,
                course_class_member.status AS status,
                course_class_member.created_at AS created_at,
                course_class_member.created_id AS created_id,
                course_class_member.updated_at AS updated_at,
                course_class_member.updated_id AS updated_id,
                users.id AS user_id,
                users.name AS user_name,
                course_class.batch AS course_class_batch,
                course.name AS course_name,
                FROM course_class_member
                JOIN users ON course_class_member.user_id = users.id
                JOIN course_class ON course_class_member.course_class_id = course_class.id
                JOIN course ON course_class.course_id = course.id
                LEFT JOIN user_mentorships ON course_class_member.user_id = user_mentorships.member_id
                    AND users.user_type = "tutor"
                WHERE course_class_member.user_id = users.id
                AND course_class_member.course_class_id = course_class.id
                AND course_class.course_id = course.id
                GROUP BY
                    course_class_member.id,
                    course_class_member.description,
                    course_class_member.status,
                    course_class_member.created_at,
                    course_class_member.created_id,
                    course_class_member.updated_at,
                    course_class_member.updated_id,
                    users.id,
                    users.name,
                    course_class.batch,
                    course.name
            '));
        }
        return $courseClassMembers;
    }

    public static function getCourseClassMemberMbkm($request)
    {
        $idCourse = $request->id;

        if ($idCourse !== null) {
            $courseClassMembers = DB::table('course_class_member')
                ->select(
                    'course_class_member.id AS id',
                    'course_class_member.description AS description',
                    'course_class_member.status AS status',
                    'course_class_member.created_at AS created_at',
                    'course_class_member.created_id AS created_id',
                    'course_class_member.updated_at AS updated_at',
                    'course_class_member.updated_id AS updated_id',
                    'users.id AS user_id',
                    'users.name AS user_name',
                    'course_class.batch AS course_class_batch',
                    'course.name AS course_name',
                    'm_partner.name AS partner_name'
                )
                ->join('users', 'course_class_member.user_id', '=', 'users.id')
                ->join('course_class', 'course_class_member.course_class_id', '=', 'course_class.id')
                ->join('course', 'course_class.course_id', '=', 'course.id')
                ->leftjoin('m_partner', 'course_class_member.m_partner_id', '=', 'm_partner.id')
                ->leftJoin('user_mentorships', function ($join) {
                    $join->on('course_class_member.user_id', '=', 'user_mentorships.mentor_id')
                        ->where('users.type', '=', 'tutor'); // Hanya ambil jobdesc jika user bertipe tutor
                })
                ->where('course_class_member.course_class_id', $idCourse)
                ->groupBy(
                    'course_class_member.id',
                    'course_class_member.description',
                    'course_class_member.status',
                    'course_class_member.created_at',
                    'course_class_member.created_id',
                    'course_class_member.updated_at',
                    'course_class_member.updated_id',
                    'users.id',
                    'users.name',
                    'course_class.batch',
                    'course.name'
                )
                ->get();
        } else {
            $courseClassMembers = collect(DB::select('SELECT
                course_class_member.id AS id,
                course_class_member.description AS description,
                course_class_member.status AS status,
                course_class_member.created_at AS created_at,
                course_class_member.created_id AS created_id,
                course_class_member.updated_at AS updated_at,
                course_class_member.updated_id AS updated_id,
                users.id AS user_id,
                users.name AS user_name,
                course_class.batch AS course_class_batch,
                course.name AS course_name,
                FROM course_class_member
                JOIN users ON course_class_member.user_id = users.id
                JOIN course_class ON course_class_member.course_class_id = course_class.id
                JOIN course ON course_class.course_id = course.id
                LEFT JOIN user_mentorships ON course_class_member.user_id = user_mentorships.member_id
                    AND users.user_type = "tutor"
                WHERE course_class_member.user_id = users.id
                AND course_class_member.course_class_id = course_class.id
                AND course_class.course_id = course.id
                GROUP BY
                    course_class_member.id,
                    course_class_member.description,
                    course_class_member.status,
                    course_class_member.created_at,
                    course_class_member.created_id,
                    course_class_member.updated_at,
                    course_class_member.updated_id,
                    users.id,
                    users.name,
                    course_class.batch,
                    course.name
            '));
        }
        return $courseClassMembers;
    }

    public static function getEditCourseClassMember($request){

        $currentData = collect(DB::select('SELECT
                course_class_member.user_id AS ccm_member_id,
                course_class_member.course_class_id AS ccm_course_class_id,
                course_class_member.description AS ccm_description,
                course_class_member.status AS ccm_status,
                users.name AS user_name,
                course.name AS course_name,
                course_class.batch AS course_class_batch
                FROM course_class_member
                JOIN users
                JOIN course_class
                JOIN course
                WHERE course_class_member.user_id = users.id
                AND course_class_member.course_class_id = course_class.id
                AND course_class_member.id = ?;
            ', [$request->id]));

        return $currentData;
    }

    //new, check existing ccm
    public static function checkExistingCCM($user_id, $course_class_id)
    {
        $result = DB::table('course_class_member')
            ->select('*')
            ->where('user_id', $user_id)
            ->where('course_class_id', $course_class_id)
            ->first();
        return $result;
    }
    public static function getCCMByCourseClassId($course_class_id)
    {
        $result = DB::table('course_class_member as ccm')
            ->select('u.*')
            ->join('users as u', 'u.id', '=', 'ccm.user_id')
            ->where('ccm.status', 1)
            ->where('ccm.course_class_id', $course_class_id)
            ->get();
        return $result;
    }
}
