<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransOrder;
use illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\CourseClass;
use App\Models\Member;
use App\Models\CoursePackage;
use App\Models\Promotion;
use DB; 

class TransOrderController extends Controller
{
    //
    function getTransOrder(){
        $transorder = TransOrder::all();
        return view('transorder.index', ['transorder' => $transorder]);
    }

    function getAddTransOrder(Request $request){
        $idcourses = Course::all();
        $idcourseclasses = CourseClass::all();
        $idmembers = Member::all();
        $idcoursepackages = CoursePackage::all();
        $idpromotions = Promotion::all();

        return view('transorder.add', [
            'idcourses' => $idcourses,
            'idcourseclasses' => $idcourseclasses,
            'idmembers' => $idmembers,
            'idcoursepackages' => $idcoursepackages,
            'idpromotions' => $idpromotions
        ]);
    }
    
    public function postAddTransOrder(Request $request){
        $validate = $request->validate([
            'order_number' => 'required',
            'date' => 'required',
            'total' => 'required',
            'total_after_discount' => 'required',
            'payment_status' => 'required',
            'id_course' => 'required',
            'id_course_class' =>'required',
            'id_member' =>'required',
            'id_course_package' =>'required',
            'id_promotion' =>'required'
        ]);
        
        if($validate){
            $create = TransOrder::create([
                'order_number' => $request->order_number,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'total_after_discount' => $request->total_after_discount,
                'payment_status' => $request->payment_status,
                'id_course' => $request->id_course,
                'id_course_class' => $request->id_course_class,
                'id_member' => $request->id_member,
                'id_course_package' => $request->id_course_package,
                'id_promotion' => $request->id_promotion,
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
        trans_order.id_course, 
        trans_order.id_course_class, 
        trans_order.id_member, 
        trans_order.id_course_package, 
        trans_order.id_promotion, 
        trans_order.description
        FROM trans_order
        JOIN course ON trans_order.id_course = course.id
        JOIN course_class ON trans_order.id_course_class = course_class.id
        JOIN member ON trans_order.id_member = member.id
        JOIN course_package ON trans_order.id_course_package = course_package.id
        JOIN promotion ON trans_order.id_promotion = promotion.id
        WHERE trans_order.id = ?; ',[$idtransorder]));

        $idcourses = Course::where('id', '!=', $currentData->value('id_course'))->get();
        $idcourseclasses = CourseClass::where('id', '!=', $currentData->value('id_course_class'))->get();
        $idmembers = Member::where('id', '!=', $currentData->value('id_member'))->get();
        $idcoursepackages = CoursePackage::where('id', '!=', $currentData->value('id_course_package'))->get();
        $idpromotions = Promotion::where('id', '!=', $currentData->value('id_promotion'))->get();

        return view('transorder.edit', [
            'transorders' => $transorders,
            'currentData' => $currentData,
            'idcourses' => $idcourses,
            'idcourseclasses' => $idcourseclasses,
            'idmembers' => $idmembers,
            'idcoursepackages' => $idcoursepackages,
            'idpromotions' => $idpromotions
        ]);
    }

    function postEditTransOrder(Request $request){
        $idTransOrder = $request->id;

        $updateData = DB::table('trans_order')
            ->where('id', $idTransOrder)
            ->update([
                'order_number' => $request->order_number,
                'date' => $request->date,
                'total' => $request->total,
                'discount' => $request->discount,
                'total_after_discount' => $request->total_after_discount,
                'payment_status' => $request->payment_status,
                'id_course' => $request->id_course,
                'id_course_class' => $request->id_course_class,
                'id_member' => $request->id_member,
                'id_course_package' => $request->id_course_package,
                'id_promotion' => $request->id_promotion,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
            if ($updateData){
                return app(HelperController::class)->Positive('getTransOrder');
            } else {
                return app(HelperController::class)->Negative('getTransOrder');
            }

    }
}
