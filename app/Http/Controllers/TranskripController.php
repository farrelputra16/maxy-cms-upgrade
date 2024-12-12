<?php

namespace App\Http\Controllers;

use App\Models\Transkrip;
use Illuminate\Http\Request;

use DB;
use illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TranskripController extends Controller
{
    function getTranskrip()
    {
        $data = Transkrip::with(['User', 'CourseClass', 'MScore', 'CourseClass.Schedule.MAcademicPeriod'])->get();
        return view('transkrip.indexv3', compact('data'));
    }
    function getTranskripData(Request $request){
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $transkrip = Transkrip::with([
            'User:id,name',
            'CourseClass:id,slug',
            'CourseClass.Schedule:id,course_class_id,m_academic_period_id',
            'CourseClass.Schedule.MAcademicPeriod:id,name',
            'MScore:id,name'
        ])
            ->select('id', 'user_id', 'course_class_id', 'm_score_id', 'created_at', 'created_id', 'updated_at', 'updated_id')
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
                    $transkrip->where('status', '=', 0);
                else
                    $transkrip->where('status', '=', 1);
            } else if ($columnName == 'name'){
                $transkrip->whereHas('User', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else if ($columnName == 'academic_period'){
                $transkrip->whereHas('CourseClass.Schedule.MAcademicPeriod', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else if ($columnName == 'slug'){
                $transkrip->whereHas('CourseClass', function ($query) use ($columnSearchValue) {
                    $query->where('slug', 'like', "%{$columnSearchValue}%");
                });
            } else if ($columnName == 'score'){
                $transkrip->whereHas('MScore', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else {
                $transkrip->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($transkrip)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->User->name), 30)
                    . '</span>';
            })
            ->addColumn('academic_period', function ($row) {
                if (!empty($row->CourseClass) && 
                    !empty($row->CourseClass->Schedule) && 
                    !empty($row->CourseClass->Schedule->first()->MAcademicPeriod)) {
                    return \Str::limit($row->CourseClass->Schedule->first()->MAcademicPeriod->name, 30);
                }
                return '-';
            })            
            ->addColumn('slug', function ($row) {
                return !empty($row->CourseClass->slug) ? \Str::limit($row->CourseClass->slug, 30) : '-';
            })
            ->addColumn('score', function ($row) {
                return !empty($row->MScore->name) ? \Str::limit($row->MScore->name, 30) : '-';
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
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name']) // Allow HTML rendering
            ->make(true);
    }
}
