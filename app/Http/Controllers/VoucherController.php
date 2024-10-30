<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use DB;
use illuminate\Support\Facades\Auth;

class VoucherController extends Controller
{
    function getVoucher(){
        $voucher = Promotion::all();
        // return dd($voucher);
        return view('voucher.indexv3', ['voucher' => $voucher]);
    }

    function getAddVoucher(){
        $voucher = Promotion::all();
        return view('voucher.addv3', [
            'voucher' => $voucher
        ]);
    }

    function postAddVoucher(Request $request){
        // return dd($request);
        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'start_date' =>'required',
            'end_date' => 'required',
            'discount_type' => 'required',
            'discount' => 'required',
            'maxdiscount' => 'required',
        ]);

        if($validate){
            $create = Promotion::create([
                'name' => $request->name,
                'code' => $request->code,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'discount_type' => $request->discount_type,
                'discount' => $request->discount,
                'max_discount' => $request->maxdiscount,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if($create){
                return app(HelperController::class)->Positive('getVoucher');
            } else {
                return app(HelperController::class)->Negative('getVoucher');
            }
        }
    }

    function getEditVoucher(Request $request){
        $voucher = Promotion::all();

        $idvoucher = $request->id;

        $currentData = Promotion::select(
            'id', 'name', 'code', 'start_date', 'end_date', 'discount_type',
            'discount', 'max_discount', 'description', 'status'
        )
            ->where('id', $idvoucher)
            ->first();

        $allPromotion = Promotion::where('id', '!=', $currentData->id)->get();
        // return dd($allPromotion);
        return view('voucher.editv3', [
            'voucher' => $voucher,
            'currentData' => $currentData,
            'allPromotion' => $allPromotion
        ]);
    }

    function postEditVoucher(Request $request){
        $idvoucher = $request->id;

        $validate = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'start_date' =>'required',
            'end_date' => 'required',
            'discount_type' => 'required',
            'discount' => 'required',
            'max_discount' => 'required',
        ]);

        if($validate){
            $updateData = Promotion::where('id', $idvoucher)
            ->update([
                'name' => $request->name,
                'code' => $request->code,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'discount_type' => $request->discount_type,
                'discount' => $request->discount,
                'max_discount' => $request->max_discount,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);
            if ($updateData){
                return app(HelperController::class)->Positive('getVoucher');
            } else {
                return app(HelperController::class)->Warning('getVoucher');
            }
        }
    }
}
