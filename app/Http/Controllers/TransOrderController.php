<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransOrder;
use App\Models\TransOrderConfirm;
use illuminate\Support\Facades\Auth;
use App\Models\Course;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Models\User;
use App\Models\CoursePackage;
use App\Models\Promotion;
use DB; 

class TransOrderController extends Controller
{
    //
    function getTransOrder(){
        $transOrders = TransOrder::getTransOrder();
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
                'm_promo_id' => $request->m_promo_id,
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
        // return dd($idtransorder);

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

    function postEditTransOrder(Request $request){
        $idTransOrder = $request->id;

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total));
        $trim_total_after_discount = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->total_after_discount));

        $updateData = TransOrder::where('id', $idTransOrder)
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
                'm_promo_id' => $request->m_promo_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);
            if ($updateData){
                return app(HelperController::class)->Positive('getTransOrder');
            } else {
                return app(HelperController::class)->Warning('getTransOrder');
            }
    }










    function getTransOrderConfirm(Request $request){
        $idtransorder = $request->id;

        $transordersconfirm = TransOrderConfirm::where('trans_order_id', $idtransorder)->get();

        // return dd($transorders);

        // $transOrdersConfrim = TransOrderConfirm::getTransOrder();
        return view('trans_order_confirm.index', ['transordersconfirm' => $transordersconfirm , 'idtransorder' => $idtransorder]);
    }

    function getAddTransOrderConfirm(Request $request){
        $idtransorder = $request->id;
        $transorders = TransOrder::find($idtransorder);
        // return dd($idtransorder);

        $m_bank_account = DB::table('m_bank_account')
            ->get();

        $m_bank= DB::table('m_bank')
            ->get();
        // dd($m_bank_account);

        $idcourses = Course::where('id', $transorders->course_id)->get();
        $idcourseclasses = CourseClass::where('id', $transorders->course_class_id)->get();
        $idmembers = User::where('id', $transorders->user_id)->get();
        $idcoursepackages = CoursePackage::all();
        $idpromotions = Promotion::all();

        return view('trans_order_confirm.add', [
            'idcourses' => $idcourses,
            'idcourseclasses' => $idcourseclasses,
            'idmembers' => $idmembers,
            'idcoursepackages' => $idcoursepackages,
            'idpromotions' => $idpromotions,
            'm_bank_account' => $m_bank_account,
            'm_bank' => $m_bank,
            'idtransorder' => $idtransorder
        ]);
    }
    
    public function postAddTransOrderConfirm(Request $request){
        // return dd($request);

        $selectedValue = request('bank_account_id');
        list($bank_account_id, $mBankId) = explode('|', $selectedValue);
        // return dd($bank_account_id);

        $fileName = null;
        if ($request->hasFile('file_image')) {
            // return dd($request);
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/trans_order'), $fileName);
            // return dd($fileName);
        }

        $validate = $request->validate([
            'order_number' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'bank_account_id' => 'required',
        ]);

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->amount));
        
        if($validate){
            $create = TransOrderConfirm::create([
                'order_confirm_number' => $request->order_number,
                'date' => $request->date,
                'image' => $fileName,
                'amount' => (float)$trim_total,
                'sender_account_name' => $request->sender_account_name,
                'sender_account_number' => $request->sender_account_number,
                'course_id' => $request->course_id,
                'course_class_id' => $request->course_class_id,
                'sender_bank' => $mBankId,
                'm_bank_account_id' => $bank_account_id,
                'trans_order_id' => $request->trans_order_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if($create){
                // return app(HelperController::class)->Positive('getTransOrder');
                app(HelperController::class)->Positive('getTransOrderConfirm', $request->trans_order_id);
                return redirect()->route('getTransOrderConfirm', ['id' => $request->trans_order_id]);
            } else {
                // return app(HelperController::class)->Negative('getTransOrder');
                app(HelperController::class)->Negative('getTransOrderConfirm', $request->trans_order_id);
                return redirect()->route('getTransOrderConfirm', ['id' => $request->trans_order_id]);
            }
        }
    }

    function getEditTransOrderConfirm(Request $request){
        $idtransorderconfirm = $request->id;
        
        $transordersconfirm = TransOrderConfirm::find($idtransorderconfirm);

        $idtransorder = $transordersconfirm->trans_order_id;

        $transorders = TransOrder::find($idtransorder);

        // return dd($idtransorder);

        $m_bank_account = DB::table('m_bank_account')
            ->get();

        // $m_bank_now = DB::table('m_bank')
        //     ->select('id', 'name')
        //     ->where('id', $transordersconfirm->sender_bank)
        //     ->first();

        // $m_bank = DB::table('m_bank')
        //     ->where('id', '<>', $m_bank_now->id)
        //     ->get();

        $m_bank_account_now = DB::table('m_bank_account')
            ->select('id', 'account_name', 'account_number', 'm_bank_id')
            ->where('id', $transordersconfirm->m_bank_account_id)
            ->first();

        $m_bank_account = DB::table('m_bank_account')
            ->where('id', '<>', $m_bank_account_now->id)
            ->get();
        // return dd($m_bank_account);

        $idcourses = Course::where('id', $transorders->course_id)->get();
        $idcourseclasses = CourseClass::where('id', $transorders->course_class_id)->get();
        $idmembers = User::where('id', $transorders->user_id)->get();


        return view('trans_order_confirm.edit', [
            '$idtransorder' => $idtransorder,
            'idcourses' => $idcourses,
            'idcourseclasses' => $idcourseclasses,
            'idmembers' => $idmembers,
            'currentData' => $transordersconfirm,
            'm_bank_account' => $m_bank_account,
            'm_bank_account_now' => $m_bank_account_now,
            'idtransorder' => $idtransorder
        ]);
    }

    function postEditTransOrderConfirm(Request $request){
        // dd($request->idtransorder);
        $idTransOrderConfirm = $request->id;

        $selectedValue = request('bank_account_id');
        // dd($idTransOrder);
        list($bank_account_id, $mBankId) = explode('|', $selectedValue);
        
        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/course_img'), $fileName);
        }
        else{
            $fileName = $request->img_keep;
        }

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->amount));

        $updateData = TransOrderConfirm::where('id', $idTransOrderConfirm)
            ->update([
                'order_confirm_number' => $request->order_number,
                'date' => $request->date,
                'image' => $fileName,
                'amount' => (float)$trim_total,
                'sender_account_name' => $request->sender_account_name,
                'sender_account_number' => $request->sender_account_number,
                'sender_bank' => $mBankId,
                'm_bank_account_id' => $bank_account_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
            if ($updateData){
                // return app(HelperController::class)->Positive('getTransOrder');
                app(HelperController::class)->Positive('getTransOrderConfirm', $request->idtransorder);
                return redirect()->route('getTransOrderConfirm', ['id' => $request->idtransorder]);
            } else {
                // return app(HelperController::class)->Warning('getTransOrder');
                app(HelperController::class)->Warning('getTransOrderConfirm', $request->idtransorder);
                return redirect()->route('getTransOrderConfirm', ['id' => $request->idtransorder]);
            }
    }
}
