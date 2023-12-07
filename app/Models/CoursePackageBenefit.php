<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePackageBenefit extends Model
{
    use HasFactory;

    protected $table = 'course_package_benefit';

    protected $fillable = [
        'name',
        'course_package_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public static function getCoursePackageBenefit($idCPB = null){  
        // dd($idCPB);
        if($idCPB){
            $coursePackageBenefits = DB::select('
                SELECT
                course_package_benefit.*,
                course_package.name AS course_package_name,
                course_package.price AS course_package_price
                FROM course_package_benefit
                JOIN course_package ON course_package_benefit.course_package_id = course_package.id
                WHERE course_package_benefit.course_package_id = :idCPB
            ', ['idCPB' => $idCPB]);

            // dd($coursePackageBenefits);
        }
        else{
            $coursePackageBenefits = DB::select('SELECT
                course_package_benefit.*,
                course_package.name AS course_package_name,
                course_package.price AS course_package_price
                FROM course_package_benefit
                JOIN course_package
                WHERE course_package_benefit.course_package_id = course_package.id;
            ');
            // dd($coursePackageBenefits);
        }
        

        return $coursePackageBenefits;
    }


    public static function getEditCoursePackageBenefit($request){  
        $idCoursePackageBenefit = $request->id;
        $currentData = collect(DB::select('SELECT course_package.name AS course_package_name, 
            course_package.id AS course_package_id,
            course_package_benefit.id,
            course_package_benefit.name,
            course_package_benefit.description,
            course_package_benefit.status
            FROM course_package_benefit 
            JOIN course_package
            WHERE course_package_benefit.course_package_id = course_package.id
            AND course_package_benefit.id = ?
            ', [$idCoursePackageBenefit]))->first();

        return $currentData;
    }
}
