<?php

namespace Modules\RedeemCode\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\RedeemCode\Entities\RedeemCode;
use Modules\RedeemCode\Entities\RedeemCodeClassList;
use Yajra\DataTables\Facades\DataTables;


class RedeemCodeClassListController extends Controller
{
    public function index(Request $request)
    {
        try {
            $data = RedeemCode::where('id', $request->id)->first();
            return view('redeemcode::redeem_code_class_list.index', compact('data'));
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }
    public function getData(Request $request)
    {
        $orderColumnIndex = $request->input('draw') == 1 ? 1 : $request->input('order.0.column');
        $orderDirection = $request->input('draw') == 1 ? 'desc' : $request->input('order.0.dir');
        $columns = $request->input('columns');

        // change order column to id instead of created_at since there is no "created_at" column in the table
        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Mapping for column ordering
        $finalOrderColumn = $orderColumn;

        $data = RedeemCodeClassList::orderBy($finalOrderColumn, $orderDirection)
            ->select('course_class_redeem_code.id', 'course.name', 'course_class.batch')
            ->join('redeem_code', 'redeem_code.id', '=', 'course_class_redeem_code.redeem_code_id')
            ->join('course_class', 'course_class.id', '=', 'course_class_redeem_code.course_class_id')
            ->join('course', 'course.id', '=', 'course_class.course_id')
            ->where('redeem_code_id', $request->id);

        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if ($columnSearchValue == 'active')
                    $data->where('status', '=', 1);
                else
                    $data->where('status', '=', 0);
            } else {
                $data->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($data)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('class_name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . Str::limit(e($row->name), 200)
                    . '</span>';
            })
            ->addColumn('batch', function ($row) {
                return $row->batch;
            })
            ->addColumn('action', function ($row) use ($request) {
                return '<div class="btn-group">
                            <a href="' . route('redeemCode.class.postDelete', ['id' => $row->id, 'redeem_code_id' => $request->id]) . '"class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </div>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['class_name', 'action'])
            ->make(true);
    }

    public function getAdd(Request $request)
    {
        $data = RedeemCode::findOrFail($request->id);

        // get class list that hasn't been added to the redeem code
        $classList = CourseClass::select('course_class.id', 'course.name', 'course_class.batch')
            ->join('course', 'course.id', '=', 'course_class.course_id')
            ->where('course_class.status', 1)
            ->whereNotExists(function ($query) use ($request) {
                $query->select(DB::raw(1))
                    ->from('course_class_redeem_code')
                    ->whereColumn('course_class_redeem_code.course_class_id', 'course_class.id')
                    ->where('course_class_redeem_code.redeem_code_id', $request->id);
            })
            ->get();

        return view('redeemcode::redeem_code_class_list.add', compact(['classList', 'data']));
    }
    public function postAdd(Request $request)
    {
        try {
            foreach ($request->class as $class_id) {
                RedeemCodeClassList::create([
                    'redeem_code_id' => $request->id,
                    'course_class_id' => $class_id,
                    'created_id' => Auth::id(),
                    'updated_id' => Auth::id()
                ]);
            }

            return redirect()->route('redeemCode.class.index', ['id' => $request->id])->with('success', 'Data added successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function postDelete(Request $request)
    {
        try {
            // Attempt to delete the record
            $deleted = RedeemCodeClassList::destroy($request->id);

            // Check if the deletion was successful
            if ($deleted) {
                return redirect()->route('redeemCode.class.index', ['id' => $request->redeem_code_id])->with('success', 'Data deleted successfully!');
            } else {
                return redirect()->route('redeemCode.class.index', ['id' => $request->redeem_code_id])->with('error', 'Data not found. Please try again or contact admin if this problem persists.');
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Error deleting record: ' . $e->getMessage());

            // Return a user-friendly error message
            return redirect()->back()->with('error', 'An error occured while trying to delete the data. Please try again or contact admin if this problem persists.');
        }
    }
}
