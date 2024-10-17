<?php

namespace App\Http\Controllers;

use App\Models\RedeemCode;
use Illuminate\Http\Request;

use DB;
use illuminate\Support\Facades\Auth;

class RedeemCodeController extends Controller
{
    function getRedeemCode()
    {
        $redeemCodes = RedeemCode::all();
        return view('redeem_code.indexv3', compact('redeemCodes'));
    }


    function getAddRedeemCode()
    {
        $RedeemCode = RedeemCode::all();
        return view('redeem_code.addv3', [
            'RedeemCode' => $RedeemCode
        ]);
    }

    function postAddRedeemCode(Request $request)
    {
        // return dd($request);
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'quota' => 'required',
            'type' => 'required',
            'expired_date' => 'required',
        ]);

        if ($validate) {
            $create = RedeemCode::create([
                'name' => $request->name,
                'code' => $request->code,
                'quota' => $request->quota,
                'type' => $request->type,
                'expired_date' => $request->expired_date,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
            if ($create) {
                return app(HelperController::class)->Positive('getRedeemCode');
            } else {
                return app(HelperController::class)->Negative('getRedeemCode');
            }
        }
    }

    function getEditRedeemCode(Request $request)
    {

        $current_course_class_redeem_code = DB::table('course_class_redeem_code')
            ->join('redeem_code', 'course_class_redeem_code.redeem_code_id', '=', 'redeem_code.id')
            ->join('course_class', 'course_class_redeem_code.course_class_id', '=', 'course_class.id')
            ->join('course', 'course_class.course_id', '=', 'course.id')
            ->where('redeem_code.id', '=', $request->id)
            ->select('course_class.id', 'course.name', 'course_class.batch')
            ->get();

        $excludedIds = $current_course_class_redeem_code->pluck('id')->toArray();

        $allcourse_class_redeem_code = DB::table('course_class')
            ->join('course', 'course_class.course_id', '=', 'course.id')
            ->whereNotIn('course_class.id', $excludedIds)
            ->where('course_class.status', '=', 1)
            ->select('course_class.id', 'course.name', 'course_class.batch')
            ->get();


        $currentData = RedeemCode::where('id', '=', $request->id)->first();

        // dd($current_course_class_redeem_code);
        return view('redeem_code.editv3', [
            'currentData' => $currentData,
            'current_course_class_redeem_code' => $current_course_class_redeem_code,
            'allcourse_class_redeem_code' => $allcourse_class_redeem_code
        ]);
    }

    function postEditRedeemCode(Request $request)
    {
        // Validasi input
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'quota' => 'required',
            'type' => 'required',
            'expired_date' => 'required',
        ]);

        if ($validate) {
            // Update data redeem code
            $updateData = RedeemCode::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'code' => $request->code,
                    'quota' => $request->quota,
                    'type' => $request->type,
                    'expired_date' => $request->expired_date,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id
                ]);

            // Jika pembaruan berhasil
            if ($updateData) {
                // Jika ada access_master_old dan access_master_available
                if ($request->access_master_old && $request->access_master_available) {
                    $removeUpdate = RedeemCode::RemoveUpdate($request);
                    $insertUpdate = RedeemCode::InsertUpdate($request);

                    if ($insertUpdate && $removeUpdate) {
                        return app(HelperController::class)->Positive('getRedeemCode');
                    } else {
                        return app(HelperController::class)->Negative('getRedeemCode');
                    }
                }
                // Jika hanya ada access_master_old
                else if ($request->access_master_old) {
                    $removeUpdate = RedeemCode::RemoveUpdate($request);

                    if ($removeUpdate) {
                        return app(HelperController::class)->Positive('getRedeemCode');
                    } else {
                        return app(HelperController::class)->Negative('getRedeemCode');
                    }
                }
                // Jika hanya ada access_master_available
                else if ($request->access_master_available) {
                    $insertUpdate = RedeemCode::InsertUpdate($request);

                    if ($insertUpdate) {
                        return app(HelperController::class)->Positive('getRedeemCode');
                    } else {
                        return app(HelperController::class)->Negative('getRedeemCode');
                    }
                }
                // Jika tidak ada access_master_old maupun access_master_available
                else {
                    return app(HelperController::class)->Positive('getRedeemCode');
                }
            } else {
                return app(HelperController::class)->Warning('getRedeemCode');
            }
        }
    }

}
