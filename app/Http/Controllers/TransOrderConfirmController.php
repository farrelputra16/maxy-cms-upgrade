<?php

namespace App\Http\Controllers;

use App\Models\CoursePackage;
use App\Models\MBank;
use App\Models\MBankAccount;
use App\Models\Promotion;
use App\Models\TransOrder;
use App\Models\TransOrderConfirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransOrderConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function getTransOrderConfirm(Request $request)
    {
        $transOrderId = $request->id;
        $transOrderConfirms = TransOrderConfirm::where('trans_order_id', $transOrderId)->get();

        return view('trans_order_confirm.index', compact('transOrderConfirms', 'transOrderId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function getAddTransOrderConfirm(Request $request)
    {
        $transOrder = TransOrder::find($request->id);
        $bankAccounts = MBankAccount::all();
        $banks = MBank::all();
        $coursePackages = CoursePackage::all();
        $promotions = Promotion::all();

        return view('trans_order_confirm.add', [
            'coursePackages' => $coursePackages,
            'promotions' => $promotions,
            'bankAccounts' => $bankAccounts,
            'banks' => $banks,
            'transOrder' => $transOrder,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddTransOrderConfirm(Request $request)
    {
        $bankAccount = MBankAccount::find($request->m_bank_account_id);

        $fileName = null;

        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/trans_order'), $fileName);
        }

        $validate = $request->validate([
            'date' => 'required',
            'amount' => 'required|numeric',
            'm_bank_account_id' => 'required',
        ]);

        $trim_total = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->amount));

        if ($validate) {
            $create = TransOrderConfirm::create([
                'order_confirm_number' => $request->order_number,
                'date' => $request->date,
                'image' => $fileName,
                'amount' => (float)$trim_total,
                'sender_account_name' => $request->sender_account_name,
                'sender_account_number' => $request->sender_account_number,
                'm_bank_account_id' => $request->m_bank_account_id,
                'trans_order_id' => $request->trans_order_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->id(),
                'updated_id' => auth()->id()
            ]);

            if ($create) {
                app(HelperController::class)->Positive('getTransOrderConfirm', $request->trans_order_id);
                return redirect()->route('getTransOrderConfirm', ['id' => $request->trans_order_id]);
            } else {
                app(HelperController::class)->Negative('getTransOrderConfirm', $request->trans_order_id);
                return redirect()->route('getTransOrderConfirm', ['id' => $request->trans_order_id]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TransOrderConfirm $transOrderConfirm
     * @return \Illuminate\Http\Response
     */
    public function show(TransOrderConfirm $transOrderConfirm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TransOrderConfirm $transOrderConfirm
     * @return \Illuminate\Http\Response
     */
    public function getEditTransOrderConfirm(TransOrderConfirm $transOrderConfirm)
    {
        $bankAccounts = MBankAccount::all();

        $m_bank_account_now = DB::table('m_bank_account')
            ->select('id', 'account_name', 'account_number', 'm_bank_id')
            ->where('id', $transOrderConfirm->m_bank_account_id)
            ->first();

        $m_bank_account = DB::table('m_bank_account')
            ->where('id', '<>', $m_bank_account_now->id)
            ->get();

//        $idcourses = Course::where('id', $transorders->course_id)->get();
//        $idcourseclasses = CourseClass::where('id', $transorders->course_class_id)->get();
//        $idmembers = User::where('id', $transorders->user_id)->get();
//
//        return view('trans_order_confirm.edit', [
//            '$idtransorder' => $idtransorder,
//            'idcourses' => $idcourses,
//            'idcourseclasses' => $idcourseclasses,
//            'idmembers' => $idmembers,
//            'currentData' => $transordersconfirm,
//            'm_bank_account' => $m_bank_account,
//            'm_bank_account_now' => $m_bank_account_now,
//            'idtransorder' => $idtransorder
//        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TransOrderConfirm $transOrderConfirm
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEditTransOrderConfirm(Request $request, TransOrderConfirm $transOrderConfirm)
    {
        $idTransOrderConfirm = $request->id;
        $selectedValue = request('bank_account_id');
        list($bank_account_id, $mBankId) = explode('|', $selectedValue);

        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/course_img'), $fileName);
        } else {
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
                'm_bank_account_id' => $request->m_bank_account_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->id(),
                'updated_id' => auth()->id()
            ]);

        if ($updateData) {
            app(HelperController::class)->Positive('getTransOrderConfirm', $request->idtransorder);
            return redirect()->route('getTransOrderConfirm', ['id' => $request->idtransorder]);
        } else {
            app(HelperController::class)->Warning('getTransOrderConfirm', $request->idtransorder);
            return redirect()->route('getTransOrderConfirm', ['id' => $request->idtransorder]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TransOrderConfirm $transOrderConfirm
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransOrderConfirm $transOrderConfirm)
    {
        //
    }
}
