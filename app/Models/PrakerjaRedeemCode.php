<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PrakerjaRedeemCode extends Model
{
    use HasFactory;

    protected $table = 'prakerja_redeem_code';

    protected $fillable = [
            'redeem_code',
            'course_class_id',
            'course_class_member_id',
            'description',
            'status',       
            'created',
            'created_id',
            'updated',
            'updated_id'
    ];

    public static function getRedeemCode(){
        $redeemcode = collect(DB::select('
            SELECT 
                prakerja_redeem_code.id AS id,
                prakerja_redeem_code.redeem_code AS redeem_code,
                course_class.id AS cc_id,
                prakerja_redeem_code.description AS description,
                prakerja_redeem_code.status AS status,
                users.name AS user_name,
                prakerja_redeem_code.created_at AS created_at,
                prakerja_redeem_code.created_id AS created_id,
                prakerja_redeem_code.updated_id AS updated_id,
                prakerja_redeem_code.updated_at AS updated_at
            FROM 
                prakerja_redeem_code
            JOIN 
                course_class_member ON prakerja_redeem_code.course_class_member_id = course_class_member.id
            JOIN 
                users ON course_class_member.user_id = users.id
            JOIN 
                course_class ON course_class_member.course_class_id = course_class.id
        '));
    
        return $redeemcode;
    }
    
}
