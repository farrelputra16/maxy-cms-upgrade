<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Partnership;
use App\Models\MPartnershipType;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class PartnershipController extends Controller
{
    function getPartnership()
    {
        $partnerships = Partnership::with(['Partner', 'MPartnershipType'])->get();

        return view('partnership.indexv3', [
            'partnerships' => $partnerships
        ]);

    }

    function getAddPartnership()
    {
        $partners = Partner::where('status', 1)->get();
        $partnership_types = MPartnershipType::where('status', 1)->get();

        return view('partnership.addv3', [
            'partners' => $partners,
            'partnership_types' => $partnership_types,
        ]);
    }

    function postAddPartnership(Request $request)
    {
        // return dd($request);
        $validated = $request->validate([
            'partner' => 'required',
            'date_start' => 'required|date|after_or_equal:today',
            'date_end' => 'required|date|after_or_equal:tomorrow',
            'file' => 'required',
        ]);

        if ($validated) {
            $file = '';
            $create = Partnership::create([
                'm_partner_id' => $request->partner,
                'm_partnership_type_id' => $request->partnership_type,
                'file' => $file,
                'date_start' => date('Y-m-d', strtotime($request->date_start)),
                'date_end' => date('Y-m-d', strtotime($request->date_end)),
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create) {
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $file_name = $create->id;
                    $destinationPath = public_path('/uploads/partnership');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $file_name);
                }
                $updateData = Partnership::where('id', $create->id)->update(['file' => $file_name]);
                if ($updateData) {
                    return app(HelperController::class)->Positive('getPartnership');
                } else {
                    return app(HelperController::class)->Warning('getPartnership');
                }
            }
            return app(HelperController::class)->Negative('getPartnership');
        } else
            return redirect()->back()->withErrors($validated)->withInput();
    }

    function getEditPartnership(Request $request)
    {

        $idpartnership = $request->id;
        $partnership = Partnership::find($idpartnership);
        $partners = Partner::where('status', 1)->get();
        $partnership_types = MPartnershipType::where('status', 1)->get();

        return view('partnership.editv3', [
            'partnership' => $partnership,
            'partners' => $partners,
            'partnership_types' => $partnership_types,
        ]);
    }

    function postEditPartnership(Request $request)
    {
        $idpartnership = $request->id;

        $validated = $request->validate([
            'partner' => 'required',
            'date_start' => 'required|date|after_or_equal:today',
            'date_end' => 'required|date|after_or_equal:tomorrow',
        ]);

        if ($validated) {
            $partnership = Partnership::findOrFail($idpartnership);

            // Update database fields
            $partnership->update([
                'm_partner_id' => $request->partner,
                'm_partnership_type_id' => $request->partnership_type,
                'date_start' => date('Y-m-d', strtotime($request->date_start)),
                'date_end' => date('Y-m-d', strtotime($request->date_end)),
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'updated_id' => Auth::user()->id,
            ]);

            // Check if a new file is uploaded
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $file_name = $idpartnership . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/partnership');

                // Delete the old file if it exists
                if (File::exists($destinationPath . '/' . $partnership->file)) {
                    File::delete($destinationPath . '/' . $partnership->file);
                }

                // Save the new file
                $file->move($destinationPath, $file_name);

                // Update the file path in the database
                $partnership->file = $file_name;
                $partnership->save();
            }

            return app(HelperController::class)->Positive('getPartnership');
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }
}
