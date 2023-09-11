<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransOrder;
use illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\User;
use App\Models\CoursePackage;
use App\Models\Promotion;
use DB; 

class TransOrderController extends Controller
{
    //
    function getTransOrder(){
        $transOrders = DB::select('SELECT 
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
            promotion.name AS promotion_name,
            trans_order.forced_at,
            trans_order.forced_comment,
            trans_order.description,
            trans_order.status
            FROM trans_order
            LEFT JOIN course ON trans_order.course_id = course.id
            LEFT JOIN course_class ON trans_order.course_class_id = course_class.id
            LEFT JOIN users ON trans_order.user_id = users.id
            LEFT JOIN course_package ON trans_order.course_package_id = course_package.id
            LEFT JOIN promotion ON trans_order.promotion_id = promotion.id
        ');

        return view('trans_order.index', ['transOrders' => $transOrders]);
    }

    function getAddTransOrder(Request $request){
        $idcourses = Course::all();
        $idcourseclasses = CourseClass::all();
        $idmembers = User::all();
        $idcoursepackages = CoursePackage::all();
        $idpromotions = Promotion::all();

        return view('trans_order.add', [
            'idcourses' => $idcourses,
            'idcourseclasses' => $idcourseclasses,
            'idmembers' => $idmembers,
            'idcoursepackages' => $idcoursepackages,
            'idpromotions' => $idpromotions
        ]);
    }
    
    public function postAddTransOrder(Request $request){
        // return dd($request);
        $validate = $request->validate([
            'order_number' => 'required',
            'date' => 'required',
            'user_id' =>'required',
            'total' => 'required',
            'total_after_discount' => 'required',
            'payment_status' => 'required',
            'course_id' => 'required',
            'course_class_id' =>'required',
            'course_package_id' =>'required',
        ]);

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total));
        $trim_total_after_discount = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total_after_discount));
        
        if($validate){
            $create = TransOrder::create([
                'order_number' => $request->order_number,
                'date' => $request->date,
                'total' => (float)$trim_total,
                'discount' => $request->discount,
                'total_after_discount' => $request->discount ? (float) $trim_total_after_discount : (float) $trim_total,
                'payment_status' => $request->payment_status,
                'course_id' => $request->course_id,
                'course_class_id' => $request->course_class_id,
                'user_id' => $request->user_id,
                'course_package_id' => $request->course_package_id,
                'promotion_id' => $request->promotion_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if($create){
                return app(HelperController::class)->Positive('getTransOrder');
            } else {
                return app(HelperController::class)->Negative('getTransOrder');
            }
        }
    }

    function getEditTransOrder(Request $request){
        $idtransorder = $request->id;
        $transorders = TransOrder::find($idtransorder);

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
            trans_order.promotion_id,
            promotion.name AS promotion_name,
            trans_order.description,
            trans_order.status
            FROM trans_order
            LEFT JOIN course ON trans_order.course_id = course.id
            LEFT JOIN course_class ON trans_order.course_class_id = course_class.id
            LEFT JOIN users ON trans_order.user_id = users.id
            LEFT JOIN course_package ON trans_order.course_package_id = course_package.id
            LEFT JOIN promotion ON trans_order.promotion_id = promotion.id
            WHERE trans_order.id = ?; ',[$idtransorder]))->first();

        $allCourse = Course::where('id', '!=', $currentData->course_id)->get();
        $allCourseClass = CourseClass::where('id', '!=', $currentData->course_class_id)->get();
        $allMember = User::where('id', '!=', $currentData->user_id)->get();
        $allCoursePackage = CoursePackage::where('id', '!=', $currentData->course_package_id)->get();
        $allPromotion = Promotion::where('id', '!=', $currentData->promotion_id)->get();

        return view('trans_order.edit', [
            'transorders' => $transorders,
            'currentData' => $currentData,
            'allCourse' => $allCourse,
            'allCourseClass' => $allCourseClass,
            'allMember' => $allMember,
            'allCoursePackage' => $allCoursePackage,
            'allPromotion' => $allPromotion
        ]);
    }

    function postEditTransOrder(Request $request){
        $idTransOrder = $request->id;

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total));
        $trim_total_after_discount = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total_after_discount));

        $updateData = DB::table('trans_order')
            ->where('id', $idTransOrder)
            ->update([
                'order_number' => $request->order_number,
                'date' => $request->date,
                'total' => (float)$trim_total,
                'discount' => $request->discount,
                'total_after_discount' => $request->discount ? (float) $trim_total_after_discount : (float) $trim_total,
                'payment_status' => $request->payment_status,
                'course_id' => $request->course_id,
                'course_class_id' => $request->course_class_id,
                'user_id' => $request->user_id,
                'course_package_id' => $request->course_package_id,
                'promotion_id' => $request->promotion_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
            if ($updateData){
                return app(HelperController::class)->Positive('getTransOrder');
            } else {
                return app(HelperController::class)->Warning('getTransOrder');
            }
    }
}
