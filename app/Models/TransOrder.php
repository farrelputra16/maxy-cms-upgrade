<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransOrder extends Model
{
    use HasFactory;

    protected $table = 'trans_order';

    protected $fillable = [
        'order_number',
        'date',
        'total',
        'discount',
        'total_after_discount',
        'payment_status',
        'course_id',
        'course_class_id',
        'user_id',
        'course_package_id',
        'm_promo_id',
        'forced_at',
        'forced_comment',
        'user_forced_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    protected $with = ['user', 'course', 'courseClass', 'coursePackage', 'promo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public function coursePackage()
    {
        return $this->belongsTo(CoursePackage::class);
    }

    public function promo()
    {
        return $this->belongsTo(MPromo::class, 'm_promo_id');
    }

    public static function getTransOrder()
    {
        $transOrders = DB::select('SELECT
            trans_order.id,
            trans_order.order_number,
            trans_order.date,
            trans_order.total,
            trans_order.discount,
            trans_order.total_after_discount,
            trans_order.payment_status,
            course.name AS course_name,
            -- course_class.batch AS course_class_batch,
            users.name AS users_name,
            course_package.name AS course_package_name,
            m_promo.name AS promotion_name,
            -- trans_order.forced_at,
            trans_order.forced_comment,
            trans_order.description,
            trans_order.status
            FROM trans_order
            LEFT JOIN course ON trans_order.course_id = course.id
            LEFT JOIN course_class ON trans_order.course_class_id = course_class.id
            LEFT JOIN users ON trans_order.user_id = users.id
            LEFT JOIN course_package ON trans_order.course_package_id = course_package.id
            LEFT JOIN m_promo ON trans_order.m_promo_id = m_promo.id
        ');

        return $transOrders;
    }

    public static function getCurrentDataEDIT($request)
    {
        $idtransorder = $request->id;
        $currentData = collect(DB::select('SELECT
            trans_order.id,
            trans_order.order_number,
            trans_order.date AS dates,
            trans_order.total,
            trans_order.discount,
            trans_order.total_after_discount,
            trans_order.payment_status,
            trans_order.course_id,
            course.name AS course_name,
            trans_order.course_class_id,
            course_class.batch AS course_class_batch,
            trans_order.user_id,
            users.name AS member_name,
            trans_order.course_package_id,
            course_package.name AS course_package_name,
            trans_order.m_promo_id,
            m_promo.name AS promotion_name,
            trans_order.description,
            trans_order.status
            FROM trans_order
            LEFT JOIN course ON trans_order.course_id = course.id
            LEFT JOIN course_class ON trans_order.course_class_id = course_class.id
            LEFT JOIN users ON trans_order.user_id = users.id
            LEFT JOIN course_package ON trans_order.course_package_id = course_package.id
            LEFT JOIN m_promo ON trans_order.m_promo_id = m_promo.id
            WHERE trans_order.id = ?; ', [$idtransorder]))->first();

        return $currentData;
    }

    public static function showTransorderDetail($id)
    {
        $transOrderDetail = collect(DB::select('SELECT
            trans_order.id,
            trans_order.order_number,
            trans_order.date,
            trans_order.total,
            trans_order.discount,
            trans_order.total_after_discount,
            trans_order.payment_status,
            course.name AS course_name,
            course_class.batch AS course_class_batch,
            users.name AS users_name,
            course_package.name AS course_package_name,
            m_promo.name AS promotion_name,
            trans_order.forced_at,
            trans_order.forced_comment,
            trans_order.description,
            trans_order.status
            FROM trans_order
            LEFT JOIN course ON trans_order.course_id = course.id
            LEFT JOIN course_class ON trans_order.course_class_id = course_class.id
            LEFT JOIN users ON trans_order.user_id = users.id
            LEFT JOIN course_package ON trans_order.course_package_id = course_package.id
            LEFT JOIN m_promo ON trans_order.m_promo_id = m_promo.id
            WHERE trans_order.id = ?; ', [$id]))->first();

        return $transOrderDetail;
    }


}
