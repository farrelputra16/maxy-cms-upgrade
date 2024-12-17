<?php

namespace Modules\ClassContentManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Models\Course;
use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Http\Controllers\HelperController;


use App\Models\CourseModule;
use App\Models\CourseJournal;
use App\Models\MSurvey;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;


class CourseClassModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCourseClassParentModule(Request $request)
    {
        $course_class_id = $request->id;

        // Ambil detail kelas berdasarkan class_id
    $class_detail = CourseClass::where('id', $course_class_id)->first();

    if (!$class_detail) {
        abort(404, 'Class not found');
    }

    // Ambil detail course berdasarkan course_id yang ada di class_detail
    $course_detail = Course::find($class_detail->course_id);

    if (!$course_detail) {
        abort(404, 'Course not found');
    }

    // Ambil nama batch dari course_detail
    $batch_number = $class_detail->batch; // Ambil nama batch langsung dari kolom course

    // Ambil module berdasarkan class_id
    $courseClassModules = CourseClassModule::getClassModuleParentByClassId($course_class_id);

        return view('classcontentmanagement::course_class_module.indexv3', [
            'courseclassmodules' => $courseClassModules,
            'course_class_id' => $course_class_id,
            'course_detail' => $course_detail,
            'class_detail' => $class_detail,
            'batch_number' => $batch_number, // Mengirim detail batch ke view
        ]);
    }

    function getCourseClassParentModuleData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');
        $course_class_id = $request->input('id');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Mapping kolom untuk pengurutan yang benar
        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
            'course_module_name' => 'cm.name',
            'priority' => 'course_class_module.priority',
            'start_date' => 'course_class_module.start_date',
            'end_date' => 'course_class_module.end_date',
            'status' => 'course_class_module.status',
            'created_at' => 'course_class_module.created_at',
            'updated_at' => 'course_class_module.updated_at'
        ];

        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;
        

        // Base query
        $query = DB::table('course_class_module')
            ->select(
                'course_class_module.*',
                'cm.name AS course_module_name',
                'cc.batch AS course_class_batch',
                'cm.course_module_parent_id as parent_id',
                'c.name AS course_name'
            )
            ->join('course_module as cm', 'cm.id', '=', 'course_class_module.course_module_id')
            ->join('course_class as cc', 'cc.id', '=', 'course_class_module.course_class_id')
            ->join('course as c', 'c.id', '=', 'cm.course_id')
            ->where('course_class_module.course_class_id', $course_class_id)
            ->where('course_class_module.level', 1);

        // Ordering
        $query->orderBy($finalOrderColumn, $orderDirection);

        // Column-specific filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'id') {
                $query->where('course_class_module.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'course_module_name') {
                $query->where('cm.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'priority') {
                $query->where('course_class_module.priority', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'start_date') {
                $query->where('course_class_module.start_date', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'end_date') {
                $query->where('course_class_module.end_date', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'description') {
                $query->where('course_class_module.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                $query->where('course_class_module.status', '=', stripos($columnSearchValue, 'Non') !== false ? 0 : 1);
            } else if ($columnName == 'created_at') {
                $query->where('course_class_module.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $query->where('course_class_module.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $query->where('course_class_module.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $query->where('course_class_module.updated_id', 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('course_module_name', function ($row) {
                return '<span class="batch" scope="row">' . e($row->course_module_name) . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->description)) . '">
                    ' . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') . '
                </span>';
            })
            ->addColumn('status', function ($row) {
                return '<button 
                    class="btn btn-status-entities ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '" 
                    data-id="' . $row->id . '" 
                    data-status="' . $row->status . '"
                    data-parent="ClassContentManagement"
                    data-model="CourseClassModule">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('getEditCourseClassModule', ['id' => $row->id]) . '" class="btn btn-primary rounded">Ubah</a>
                    <a href="' . route('getCourseClassChildModule', ['id' => $row->id]) . '" class="btn btn-outline-primary rounded">Atur Konten</a>
                ';
            })
            ->rawColumns(['course_module_name', 'description', 'status', 'action'])
            ->make(true);
    }


    function getAddCourseClassModule(Request $request)
    {
        $course_class_id = $request->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllParentCourseModuleByCourseId($course_detail->id);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        // dd($classDetail);

        return view('classcontentmanagement::course_class_module.addv3', [
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    public function postAddCourseClassModule(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'course_module_id' => 'required|not_in:0',
            'priority' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ], [
            'course_module_id.not_in' => 'You must select a valid course module.',
        ]);

        $create = CourseClassModule::create([
            'start_date' => $request->start,
            'end_date' => $request->end,
            'priority' => $request->priority,
            'level' => 1,
            'course_module_id' => $request->course_module_id,
            'course_class_id' => $request->course_class_id,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if ($create) {
            session()->flash('class_module_added', 'Modul kelas berhasil ditambahkan! Silakan tambahkan konten.');
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Sukses Menambahkan Modul');
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Gagal Menambahkan Modul, silahkan coba lagi');
        }
    }

    function getEditCourseClassModule(Request $request)
    {
        // dd($request->all());
        $course_class_module_id = $request->id;
        $class_module_detail = CourseClassModule::getClassModuleDetail($course_class_module_id);
        $course_class_detail = CourseClass::getClassDetailByClassModuleId($course_class_module_id);

        $course_class_id = $course_class_detail->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllParentCourseModuleByCourseId($course_detail->id);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        // dd($course_class_id);
        return view('classcontentmanagement::course_class_module.editv3', [
            'course_class_module' => $class_module_detail,
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    function postEditCourseClassModule(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'level' => 'required',
            'priority' => 'required'
        ]);

        $course_class_module_id = $request->id;

        $updateData = CourseClassModule::where('id', $course_class_module_id)
            ->update([
                'start_date' => $request->start,
                'end_date' => $request->end,
                'priority' => $request->priority,
                'level' => $request->level,
                'course_module_id' => $request->coursemodulesid,
                'course_class_id' => $request->course_class_id,

                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);
        // dd($updateData);

        if ($updateData) {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Update Module Success');
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Failed to Update Module, please try again    ');
        }
    }

    // CHILD
    function getCourseClassChildModule(Request $request)
    {
        $ccmod_parent = CourseClassModule::find($request->id);
        $ccmod_parent->detail = CourseModule::find($ccmod_parent->course_module_id);
        // dd($ccmod_parent);
        $child_modules = CourseModule::getCourseModuleChildByParentId($ccmod_parent->course_module_id);
        $child_ccmod = CourseClassModule::getClassModuleChildByClassId($ccmod_parent->course_class_id);
        $child_list = [];
        foreach ($child_modules as $cm) {
            foreach ($child_ccmod as $ccmod) {
                if ($ccmod->course_module_id == $cm->id) {
                    $ccmod->type = $cm->type;
                    $child_list[] = $ccmod;
                }
            }
        }
        // dd($child_list);

        $class_detail = CourseClass::getClassDetailByClassModuleId($ccmod_parent->id);
        $course_detail = CourseClass::getCourseDetailByClassId($class_detail->id);

        // dd($module_detail);
        return view('classcontentmanagement::course_class_module.child.indexv3', [
            'child_modules' => $child_list,
            // 'course_class_id' => $ccmod_parent->detail->course_class_id,
            'course_detail' => $course_detail,
            'parent_module' => $ccmod_parent,
        ]);
    }

    function getCourseClassChildModuleData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');
        $parent_id = $request->input('id');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $ccmod_parent = CourseClassModule::find($parent_id);
        $ccmod_parent->detail = CourseModule::find($ccmod_parent->course_module_id);

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];
        
        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        // Base query
        $query = DB::table('course_class_module')
            ->select(
                'course_class_module.*',
                'cm.name AS course_module_name',
                'cc.batch AS course_class_batch',
                'cm.course_module_parent_id as parent_id',
                'c.name AS course_name',
                'cm.content AS course_module_content',
                'cm.material AS course_module_material',
                'cm.type AS type'
            )
            ->join('course_module as cm', 'cm.id', '=', 'course_class_module.course_module_id')
            ->join('course_class as cc', 'cc.id', '=', 'course_class_module.course_class_id')
            ->join('course as c', 'c.id', '=', 'cm.course_id')
            ->where('course_class_module.course_class_id', $ccmod_parent->course_class_id)
            ->where('course_class_module.level', 2)
            ->where('cm.course_module_parent_id', $ccmod_parent->course_module_id);

        // Ordering
        $query->orderBy($finalOrderColumn, $orderDirection);

        // Column-specific filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'id') {
                $query->where('course_class_module.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'course_module_name') {
                $query->where('cm.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'type') {
                $query->where('cm.type', 'like', "%{$columnSearchValue}%"); 
            } else if ($columnName == 'priority') {
                $query->where('course_class_module.priority', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'start_date') {
                $query->where('course_class_module.start_date', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'end_date') {
                $query->where('course_class_module.end_date', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'description') {
                $query->where('course_class_module.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                $query->where('course_class_module.status', '=', stripos($columnSearchValue, 'Non') !== false ? 0 : 1);
            } else if ($columnName == 'created_at') {
                $query->where('course_class_module.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $query->where('course_class_module.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $query->where('course_class_module.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $query->where('course_class_module.updated_id', 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('course_module_name', function ($row) {
                return '<span class="batch" scope="row">' . e($row->course_module_name) . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->description)) . '">
                    ' . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') . '
                </span>';
            })
            ->addColumn('status', function ($row) {
                return '<button 
                    class="btn btn-status-entities ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '" 
                    data-id="' . $row->id . '" 
                    data-status="' . $row->status . '"
                    data-parent="ClassContentManagement"
                    data-model="CourseClassModule">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('getEditCourseClassChildModule', ['id' => $row->id]) . '" class="btn btn-primary rounded">Ubah</a>
                    <a href="' . route('getJournalCourseClassChildModule', ['id' => $row->id]) . '" class="btn btn-outline-primary rounded">Kelola Jurnal</a>
                ';
            })
            ->rawColumns(['course_module_name', 'description', 'status', 'action'])
            ->make(true);
    }

    function getAddCourseClassChildModule(Request $request)
    {
        // dd($request->all()); // dapat course_class_module_id parent nya
        $parent_ccmod_detail = CourseClassModule::with('CourseModule')->find($request->id);
        $parent_cm_detail = CourseModule::getCourseModuleDetailByModuleId($parent_ccmod_detail->course_module_id);
        $class_detail = CourseClass::getClassDetailByClassId($parent_ccmod_detail->course_class_id);
        $child_cm_list = CourseModule::getCourseModuleChildByParentId($parent_cm_detail->id);
        // dd($child_cm_list);

        $quiz = MSurvey::where('type', 1)->get();
        $eval = MSurvey::where('type', 0)->get();
        // dd($parent_ccmod_detail, $parent_cm_detail, $class_detail, $child_cm_list);

        return view('classcontentmanagement::course_class_module.child.addv3', [
            'child_cm_list' => $child_cm_list,
            'class_detail' => $class_detail,
            'parent_ccmod_detail' => $parent_ccmod_detail,
            'parent_cm_detail' => $parent_cm_detail,
            'quiz' => $quiz,
            'eval' => $eval,
        ]);
    }

    function postAddCourseClassChildModule(Request $request)
    {
        // dd($request->all()); // dapat course_class_module_id parent nya
        $validated = $request->validate([
            'course_module_id' => 'required|not_in:0',
            'priority' => 'required|numeric|min:0',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
        ], [
            'course_module_id.not_in' => 'You must select a valid course module.',
        ]);

        $create = CourseClassModule::create([
            'start_date' => $request->start,
            'end_date' => $request->end,
            'priority' => $request->priority,
            'level' => 2,
            'course_module_id' => $request->course_module_id,
            'course_class_id' => $request->course_class_id,
            'content' => $request->class_content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if ($create) {
            return redirect()->route('getCourseClassChildModule', ['id' => $request->ccmod_parent_id])->with('success', 'Sukses Menambahkan Modul');
        } else {
            return redirect()->route('getCourseClassChildModule', ['id' => $request->ccmod_parent_id])->with('failed', 'Gagal Menambahkan Modul, silahkan coba lagi');
        }
    }

    function getCourseModuleContent($id)
    {
        $module = CourseModule::find($id);
        return response()->json($module);
    }

    function getEditCourseClassChildModule(Request $request)
    {
        // dd($request->all());
        $parent_ccmod_detail = CourseClassModule::find($request->parent_id);
        $parent_cm_detail = CourseModule::getCourseModuleDetailByModuleId($parent_ccmod_detail->course_module_id);

        $child_ccmod_detail = CourseClassModule::find($request->id);
        $child_cm_detail = CourseModule::getCourseModuleDetailByModuleId($child_ccmod_detail->course_module_id);

        $class_detail = CourseClass::getClassDetailByClassId($parent_ccmod_detail->course_class_id);
        $child_cm_list = CourseModule::getCourseModuleChildByParentId($parent_cm_detail->id);

        $child_detail = CourseClassModule::find($request->id);

        // dd($child_cm_detail);
        return view('classcontentmanagement::course_class_module.child.editv3', [
            'child_cm_list' => $child_cm_list,
            'class_detail' => $class_detail,
            'parent_ccmod_detail' => $parent_ccmod_detail,
            'child_cm_detail' => $child_cm_detail,
            'child_detail' => $child_detail,
        ]);
    }
    function getJournalCourseClassChildModule(Request $request)
    {
        $ccmod_parent = CourseClassModule::find($request->id);
        $ccmod_parent->detail = CourseModule::find($ccmod_parent->course_module_id);
        $ccmod_child_parent = CourseClassModule::where('course_module_id', $ccmod_parent->detail->course_module_parent_id)
            ->where('course_class_id', $ccmod_parent->course_class_id)
            ->first();
        $users = CourseJournal::with('User')
            ->where('course_class_module_id', $request->id)
            ->whereNull('course_journal_parent_id')
            ->where('priority', 1)
            ->get();

        // dd($users);
        return view('classcontentmanagement::course_class_module.child.journal.indexv3', [
            'users' => $users,
            'parent_module' => $ccmod_parent,
            'child_parent_module' => $ccmod_child_parent,
        ]);
    }
    function getJournalCourseClassChildModuleData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');
        $parent_id = $request->input('id');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];
        
        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        // Base query
        $query = DB::table('course_journal')
            ->select(
                'course_journal.*',
                'users.name AS user_name'
            )
            ->join('users', 'users.id', '=', 'course_journal.user_id')
            ->where('course_journal.course_class_module_id', $parent_id)
            ->whereNull('course_journal.course_journal_parent_id')
            ->where('course_journal.priority', 1);

        // Ordering
        $query->orderBy($finalOrderColumn, $orderDirection);

        // Column-specific filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'id') {
                $query->where('course_journal.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'user_name') {
                $query->where('users.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'description') {
                $query->where('course_journal.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_at') {
                $query->where('course_journal.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $query->where('course_journal.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $query->where('course_journal.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $query->where('course_journal.updated_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                $query->where('course_journal.status', '=', stripos($columnSearchValue, 'Non') !== false ? 0 : 1);
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('user_name', function ($row) {
                return '<span class="batch" scope="row">' . e($row->user_name) . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->description)) . '">
                    ' . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') . '
                </span>';
            })
            ->addColumn('action', function ($row) {
                $html = '';

                // Check for access using Session
                if (Session::has('access_master') && 
                    Session::get('access_master')->contains('access_master_name', 'course_class_module_journal_create')) {
                    $html .= '<a href="' . route('getAddJournalCourseClassChildModule', [
                        'id' => $row->id, 
                        'user_id' => $row->user_id, 
                        'course_class_module_id' => $row->course_class_module_id
                    ]) . '" class="btn btn-primary rounded">Balas</a>';
                }

                $html .= $row->status == 1 
                    ? ' <button type="button" class="btn btn-danger hide-button" data-id="' . $row->id . '" data-course_class_module_id="' . $row->course_class_module_id . '">Sembunyikan</button>'
                    : ' <button type="button" class="btn btn-success hide-button" data-id="' . $row->id . '" data-course_class_module_id="' . $row->course_class_module_id . '">Tunjukkan</button>';

                $html .= $row->acceptable == 1
                    ? ' <form action="' . route('postRejectJournalCourseClassChildModule', ['id' => $row->id, 'course_class_module_id' => $row->course_class_module_id]) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        <button type="submit" class="btn btn-danger">Tolak</button>
                    </form>'
                    : ' <form action="' . route('postRejectJournalCourseClassChildModule', ['id' => $row->id, 'course_class_module_id' => $row->course_class_module_id]) . '" method="POST" style="display:inline;">
                        ' . csrf_field() . '
                        <button type="submit" class="btn btn-success">Terima</button>
                    </form>';

                return $html;
            })
            ->rawColumns(['user_name', 'description', 'status', 'action'])
            ->make(true);
    }
    function getAddJournalCourseClassChildModule(Request $request)
    {
        // dd($request->all());
        $ccmod_parent = CourseClassModule::find($request->course_class_module_id);
        $ccmod_parent->detail = CourseModule::find($ccmod_parent->course_module_id);
        $ccmod_child_parent = CourseClassModule::where('course_module_id', $ccmod_parent->detail->course_module_parent_id)
            ->where('course_class_id', $ccmod_parent->course_class_id)
            ->first();
        // $comments = CourseJournal::where('course_class_module_id', $request->course_class_module_id)
        //     ->where('user_id', $request->user_id)
        //     ->whereNull('course_journal_parent_id')
        //     ->orderBy('level', 'ASC')
        //     ->get();
        // foreach($comments as $comment) {
        //     $comment->diff = Carbon::parse($comment->created_at)->diffForHumans();
        //     $comment->child = CourseJournal::with('User')
        //         ->where('course_class_module_id', $request->course_class_module_id)
        //         ->where('course_journal_parent_id', $comment->id)
        //         ->orderBy('priority', 'ASC')
        //         ->get();
        //     foreach ($comment->child as $child) {
        //         $child->diff = Carbon::parse($child->created_at)->diffForHumans();
        //     }
        // }
        $comment = CourseJournal::find($request->id);
        $comment->diff = Carbon::parse($comment->created_at)->diffForHumans();
        $comment->child = CourseJournal::with('User')
            ->where('course_class_module_id', $request->course_class_module_id)
            ->where('course_journal_parent_id', $comment->id)
            ->orderBy('priority', 'ASC')
            ->get();
        foreach ($comment->child as $child) {
            $child->diff = Carbon::parse($child->created_at)->diffForHumans();
        }
        return view('classcontentmanagement::course_class_module.child.journal.addv3', [
            'comment' => $comment,
            'parent_module' => $ccmod_parent,
            'child_parent_module' => $ccmod_child_parent,
            'course_journal_parent_id' => $request->id,
        ]);
    }
    function postAddJournalCourseClassChildModule(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
        ], [
            'description.required' => 'Komentar harus diisi',
        ]);
        // dd($request->all());
        // $level = CourseJournal::find()
        //     ->where('user_id', $request->user_id)
        //     ->whereNull('course_journal_parent_id')
        //     ->count();
        $level = CourseJournal::find($request->course_journal_parent_id);

        // $priority = CourseJournal::where('course_class_module_id', $request->course_class_module_id)
        //     ->where('user_id', Auth::user()->wh)
        //     ->where('level', $level)
        //     ->count();
        $priority = CourseJournal::where('course_journal_parent_id', $request->course_journal_parent_id)
            ->count();

        $create = CourseJournal::create([
            'user_id' => Auth::user()->id,
            'course_class_module_id' => $request->course_class_module_id,
            'course_journal_parent_id' => $request->course_journal_parent_id,
            'level' => $level->level,
            'priority' => $priority + 2,
            'description' => $request->description,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if ($create) {
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('success', 'Sukses');
        } else {
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('failed', 'Gagal, silahkan coba lagi');
        }
    }
    function postRejectJournalCourseClassChildModule(Request $request)
    {
        // dd($request->all());
        $journal = CourseJournal::findOrFail($request->id);
        $journal->acceptable = ($journal->acceptable == 0) ? 1 : 0;
        $journal->updated_id = auth()->user()->id;
        $update = $journal->save();

        if ($update) {
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('success', 'Sukses');
        } else {
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('failed', 'Gagal, silahkan coba lagi');
        }
    }
    function postDeleteJournalCourseClassChildModule(Request $request)
    {
        // dd($request->all());
        $journal = CourseJournal::findOrFail($request->id);
        $journal->status = ($journal->status == 0) ? 1 : 0;
        ;
        $journal->updated_id = auth()->user()->id;
        $update = $journal->save();

        if ($update) {
            return response()->json(['success' => true, 'message' => 'Success']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal, silahkan coba lagi']);
        }
    }
    function postEditCourseClassChildModule(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'start' => 'required',
            'end' => 'required',
            'priority' => 'required',
        ]);

        $update = CourseClassModule::where('id', $request->id)
            ->update([
                'start_date' => $request->start,
                'end_date' => $request->end,
                'priority' => $request->priority,
                'course_module_id' => $request->course_module_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);

        $updateContent = CourseModule::where('id', $request->course_module_id)
            ->update([
                'content' => $request->content,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);

        if ($update && $updateContent) {
            return redirect()->route('getCourseClassChildModule', ['id' => $request->ccmod_parent_id])->with('success', 'Sukses Mengubah Modul');
        } else {
            return redirect()->route('getCourseClassChildModule', ['id' => $request->ccmod_parent_id])->with('failed', 'Gagal Mengubah Modul, silahkan coba lagi');
        }
    }


    public function index()
    {
        return view('classcontentmanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('classcontentmanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('classcontentmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('classcontentmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
