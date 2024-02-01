<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransOrder;
use illuminate\Support\Facades\Auth;
use App\Models\Course;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Models\User;
use App\Models\CoursePackage;
use App\Models\Promotion;

class TransOrderController extends Controller
{
    function getTransOrder()
    {
        $transOrders = TransOrder::getTransOrder();
        return view('trans_order.index', ['transOrders' => $transOrders]);
    }

    public function showTransorderDetail($id)
    {
        // Call the showTransorderDetail method with the provided ID
        $transOrderDetail = TransOrder::showTransorderDetail($id);
        $transOrderName = TransOrder::select('order_number')->where('id', $id)->first();


        return view('trans_order.detail', ['transOrderDetail' => $transOrderDetail , 'transOrderName' => $transOrderName]);
    }

    function getAddTransOrder(Request $request)
    {
        $idcourses = Course::all();
        $idcourseclasses = CourseClass::all();
        $idmembers = User::all();
        $idcoursepackages = CoursePackage::where('status', 1)->get();
        $idpromotions = Promotion::all();

        return view('trans_order.add', [
            'idcourses' => $idcourses,
            'idcourseclasses' => $idcourseclasses,
            'idmembers' => $idmembers,
            'idcoursepackages' => $idcoursepackages,
            'idpromotions' => $idpromotions
        ]);
    }

    public function postAddTransOrder(Request $request)
    {
        $validate = $request->validate([
            'order_number' => 'required',
            'date' => 'required',
            'user_id' => 'required',
            'total' => 'required',
            'total_after_discount' => 'required',
            'payment_status' => 'required',
            'course_id' => 'required',
            'course_class_id' => 'required',
            'course_package_id' => 'required',
        ]);

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total));
        $trim_total_after_discount = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total_after_discount));

        if ($validate) {
            $create = TransOrder::create([
                'order_number' => $request->order_number,
                'date' => $request->date,
                'total' => (float)$trim_total,
                'discount' => $request->discount,
                'total_after_discount' => $request->discount ? (float)$trim_total_after_discount : (float)$trim_total,
                'payment_status' => $request->payment_status,
                'course_id' => $request->course_id,
                'course_class_id' => $request->course_class_id,
                'user_id' => $request->user_id,
                'course_package_id' => $request->course_package_id,
                'm_promo_id' => $request->m_promo_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create) {
                return app(HelperController::class)->Positive('getTransOrder');
            } else {
                return app(HelperController::class)->Negative('getTransOrder');
            }
        }
    }

    function getEditTransOrder(Request $request)
    {
        $idtransorder = $request->id;
        $transorders = TransOrder::find($idtransorder);

        $currentData = TransOrder::getCurrentDataEDIT($request);

        $allCourse = Course::where('id', '!=', $currentData->course_id)->get();
        $allCourseClass = CourseClass::where('id', '!=', $currentData->course_class_id)->get();
        $allMember = User::where('id', '!=', $currentData->user_id)->get();
        $allCoursePackage = CoursePackage::where('id', '!=', $currentData->course_package_id)->get();
        $allPromotion = Promotion::where('id', '!=', $currentData->m_promo_id)->get();

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

    function postEditTransOrder(Request $request)
    {
        $idTransOrder = $request->id;

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total));
        $trim_total_after_discount = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total_after_discount));

        $updateData = TransOrder::where('id', $idTransOrder)
            ->update([
                'order_number' => $request->order_number,
                'date' => $request->date,
                'total' => (float)$trim_total,
                'discount' => $request->discount,
                'total_after_discount' => $request->discount ? (float)$trim_total_after_discount : (float)$trim_total,
                'payment_status' => $request->payment_status,
                'course_id' => $request->course_id,
                'course_class_id' => $request->course_class_id,
                'user_id' => $request->user_id,
                'course_package_id' => $request->course_package_id,
                'm_promo_id' => $request->m_promo_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);

        if ($updateData) {
            return app(HelperController::class)->Positive('getTransOrder');
        } else {
            return app(HelperController::class)->Warning('getTransOrder');
        }
    }
}
