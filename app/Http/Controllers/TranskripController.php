<?php

namespace App\Http\Controllers;

use App\Models\CourseClass;
use App\Models\MScore;
use App\Models\Schedule;
use App\Models\Transkrip;
use App\Models\User;
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
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
            'name' => 'name',
            'course_class' => 'CourseClass.slug',
            'academic_period' => 'academic_period',
            'score' => 'score',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'created_by' => 'created_id',
            'updated_by' => 'updated_id',
        ];

        $transkrip = Transkrip::with([
            'User:id,name',
            'CourseClass:id,slug',
            'CourseClass.Schedule:id,course_class_id,m_academic_period_id',
            'CourseClass.Schedule.MAcademicPeriod:id,name',
            'MScore:id,name'
        ])
        ->select('transkrip.*');

        // Custom ordering logic
        if ($orderColumn === 'name') {
            $transkrip->orderBy(
                User::select('name')
                    ->whereColumn('users.id', 'transkrip.user_id')
                    ->limit(1),
                $orderDirection
            );
        } elseif ($orderColumn === 'score') {
            $transkrip->orderBy(
                MScore::select('name')
                    ->whereColumn('m_score.id', 'transkrip.m_score_id')
                    ->limit(1),
                $orderDirection
            );
        } else if ($orderColumn === 'slug') {
            $transkrip->orderBy(
                CourseClass::select('slug')
                    ->whereColumn('course_class.id', 'transkrip.course_class_id')
                    ->limit(1),
                $orderDirection
            );
        } elseif ($orderColumn === 'academic_period') {
            $transkrip->orderBy(
                Schedule::select('m_academic_period.name')
                    ->join('m_academic_period', 'schedule.m_academic_period_id', '=', 'm_academic_period.id')
                    ->whereColumn('schedule.course_class_id', 'transkrip.course_class_id')
                    ->limit(1),
                $orderDirection
            );
        } else {
            $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;
            $transkrip->orderBy($finalOrderColumn, $orderDirection);
        }

        // Filter kolom (existing code remains the same)
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if ($columnSearchValue == 'active')
                    $transkrip->where('status', '=', 1);
                else
                    $transkrip->where('status', '=', 0);
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
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->User->name) . '">'
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
            ->rawColumns(['name'])
            ->make(true);
    }
}
