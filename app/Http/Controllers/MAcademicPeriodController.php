<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MAcademicPeriod;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MAcademicPeriodController extends Controller
{
    function getAcademicPeriod(){
        // $MAcademicPeriod = MAcademicPeriod::all();
        return view('m_academic_period.indexv3');
    }

    function getMAcademicPeriodData(Request $request){
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $mAcademicPeriod = MAcademicPeriod::select('id', 'date_start', 'date_end', 'name', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($orderColumn, $orderDirection);

        // global search datatable
        // if (!empty($searchValue)) {
        //     $partners->where(function ($q) use ($searchValue, $columns) {
        //         foreach ($columns as $column) {
        //             $columnName = $column['data'];

        //             if (in_array($columnName, ['DT_RowIndex', 'action'])) {
        //                 continue;
        //             } else if ($columnName === 'm_partner_type') {
        //                 $q->orWhereHas('MPartnerType', function ($query) use ($searchValue) {
        //                     $query->where('name', 'like', "%{$searchValue}%");
        //                 });
        //             } else {
        //                 $q->orWhere($columnName, 'like', "%{$searchValue}%");
        //             }
        //         }
        //     });
        // }

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $mAcademicPeriod->where('status', '=', 0);
                else
                    $mAcademicPeriod->where('status', '=', 1);
            } else {
                $mAcademicPeriod->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($mAcademicPeriod)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->description)) . '">' 
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('date_start', function ($row) {
                return $row->date_start;
            })
            ->addColumn('date_end', function ($row) {
                return $row->date_end;
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
                    data-model="MAcademicPeriod">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditAcademicPeriod', ['id' => $row->id, 'access' => 'm_academic_period_update']) . '" 
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'slug', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddAcademicPeriod(){
        return view('m_academic_period.addv3');
    }

    function postAddAcademicPeriod(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'date_start' => 'required|date|after_or_equal:today',
            'date_end' => 'required|date|after_or_equal:tomorrow',
        ]);

        if ($validate){
            $create = MAcademicPeriod::create([
                'name' => $request->name,
                'date_start' => date('Y-m-d', strtotime($request->date_start)),
                'date_end' => date('Y-m-d', strtotime($request->date_end)),
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getAcademicPeriod');
            }
                return app(HelperController::class)->Negative('getAcademicPeriod');
        }
    }

    function getEditAcademicPeriod(Request $request){
        $currentData = MAcademicPeriod::find($request->id);
        return view('m_academic_period.editv3', ['currentData' => $currentData]);
    }

    function postEditAcademicPeriod(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'date_start' => 'required|date|after_or_equal:today',
            'date_end' => 'required|date|after_or_equal:tomorrow',
        ]);

        if($validate){
            $update = MAcademicPeriod::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'date_start' => date('Y-m-d', strtotime($request->date_start)),
                    'date_end' => date('Y-m-d', strtotime($request->date_end)),
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getAcademicPeriod');
            } else {
                return app(HelperController::class)->Warning('getAcademicPeriod');
            }
        }
    }
}
