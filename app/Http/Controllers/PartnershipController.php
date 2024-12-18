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
use Yajra\DataTables\Facades\DataTables;

class PartnershipController extends Controller
{
    function getPartnership()
    {
        // $partnerships = Partnership::with(['Partner', 'MPartnershipType'])->get();

        return view('partnership.indexv3');

    }

    function getPartnershipData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
            'date_start' => 'date_start',
            'date_end' => 'date_end',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];

        $partnership = Partnership::with(['Partner:id,name', 'MPartnershipType:id,name'])
            ->select('partnership.*');

        // Custom ordering logic
        if ($orderColumn === 'name') {
            $partnership->orderBy(
                Partner::select('name')
                    ->whereColumn('m_partner.id', 'partnership.m_partner_id')
                    ->limit(1), 
                $orderDirection
            );
        } elseif ($orderColumn === 'type') {
            $partnership->orderBy(
                MPartnershipType::select('name')
                    ->whereColumn('m_partnership_type.id', 'partnership.m_partnership_type_id')
                    ->limit(1), 
                $orderDirection
            );
        } else {
            // Gunakan mapping untuk menentukan kolom pengurutan
            $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;
            $partnership->orderBy($finalOrderColumn, $orderDirection);
        }

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action', 'image', 'short_desc'])) {
                continue;
            } else if ($columnName == 'name') {
                $partnership->whereHas('Partner', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else if($columnName == 'type') {
                $partnership->whereHas('MPartnershipType', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $partnership->where('status', '=', 0);
                else
                    $partnership->where('status', '=', 1);
            } else {
                $partnership->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($partnership)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->Partner->name), 30)
                    . '</span>';
            })
            ->addColumn('type', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->MPartnershipType->name), 30)
                    . '</span>';
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . asset('uploads/partnership/' . $row->file) . '" alt="Image" style="max-width: 200px; max-height: 150px;">';
            })
            ->addColumn('date_start', function ($row) {
                return $row->date_start;
            })
            ->addColumn('date_end', function ($row) {
                return $row->date_end;
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->description)) . '">' 
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button 
                    class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '" 
                    data-id="' . $row->id . '" 
                    data-status="' . $row->status . '"
                    data-model="Partnership">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditPartnership', ['id' => $row->id]) . '" 
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'type', 'image', 'short_desc', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
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
