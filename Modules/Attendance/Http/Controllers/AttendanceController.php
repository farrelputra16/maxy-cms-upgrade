<?php

namespace Modules\Attendance\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Attendance\Entities\CourseClassAttendance;
use Modules\Attendance\Entities\MemberAttendance;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\Enrollment\Entities\CourseClassMember;
use Yajra\DataTables\Facades\DataTables;

class AttendanceController extends Controller
{
    public function getCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        $attendance_list = CourseClassAttendance::getAttendanceByClassId($request->id);
        $class = CourseClass::getClassDetailByClassId($request->id);

        // auto generate student attendance (preventing error if student enrolls mid class)
        MemberAttendance::generateMemberAttendance($request->id);

        // dd($attendance_list);
        return view('attendance::course_class_attendance.index', [
            'attendance' => $attendance_list,
            'class' => $class,
        ]);
    }
    public function getCourseClassAttendanceData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');
        $class_id = $request->input('id');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id'
        ];
        
        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        // Base query
        $query = DB::table('course_class_attendance as cca')
            ->select(
                'cca.*', 
                'ccmod.priority as day'
            )
            ->join('course_class_module as ccmod', 'ccmod.id', '=', 'cca.course_class_module_id')
            ->join('course_class as cc', 'cc.id', '=', 'ccmod.course_class_id')
            ->where('cc.id', $class_id)
            ->where('ccmod.level', 1);

        // Ordering
        $query->orderBy($finalOrderColumn, $orderDirection);

        // Column-specific filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'id') {
                $query->where('cca.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'name') {
                $query->where('cca.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'day') {
                $query->where('ccmod.priority', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'description') {
                $query->where('cca.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_at') {
                $query->where('cca.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $query->where('cca.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $query->where('cca.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $query->where('cca.updated_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                $query->where('cca.status', '=', stripos($columnSearchValue, 'Non') !== false ? 0 : 1);
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">
                    ' . \Str::limit($row->name, 30) . '
                </span>';
            })
            ->addColumn('day', function ($row) {
                return e($row->day);
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
                    data-parent="Attendance"
                    data-model="CourseClassAttendance">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) use ($request) {
                $class_id = $request->input('id');
                $html = '';

                // Edit button
                $html .= '<a href="' . route('getEditCourseClassAttendance', ['id' => $row->id, 'class_id' => $class_id]) . '" class="btn btn-primary rounded">Ubah</a>';
                
                // View Member Attendance button
                $html .= ' <a href="' . route('getMemberAttendance', ['id' => $row->id, 'class_id' => $class_id]) . '" class="btn btn-outline-primary rounded">Lihat Kehadiran Siswa</a>';

                return $html;
            })
            ->rawColumns(['name', 'day', 'description', 'status', 'action'])
            ->make(true);
    }
    public function getAddCourseClassAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);

        return view('attendance::course_class_attendance.add', [
            'class' => $class
        ]);
    }
    public function postAddCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
           'name' => 'required',
        ]);
        
        try {
            // create new class attendance
            $attendance = new CourseClassAttendance();
            $attendance->name = $request->name;
            $attendance->course_class_module_id = $request->day;
            $attendance->question = '[{"question":"apakah pengajar hadir tepat waktu?","type":"radio","option":["iya","tidak"]},{"question":"apakah materi pembelajaran jelas dan sesuai?","type":"radio","option":["tidak jelas","cukup jelas","jelas","sangat jelas"]},{"question":"apa saran/pendapatmu terhadap pembelajaran di pertemuan ini?","type":"text"}]';
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->created_id = Auth::user()->id;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('success', 'new attendance created successfully');
        } catch (\Exception $e) {
            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('error', 'failed to create new attendance: ' . $e->getMessage());
        }
    }
    public function getEditCourseClassAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);
        $attendance = CourseClassAttendance::find($request->id);

        return view('attendance::course_class_attendance.edit', [
            'attendance' => $attendance,
            'class' => $class
        ]);
    }
    public function postEditCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
         ]);

        try {
            // edit class attendance
            $attendance = CourseClassAttendance::find($request->attendance_id);
            $attendance->name = $request->name;
            $attendance->course_class_module_id = $request->day;
            $attendance->question = '[{"question":"apakah pengajar hadir tepat waktu?","type":"radio","option":["yes","no"]},{"question":"apakah materi pembelajaran jelas dan sesuai?","type":"radio","option":["tidak jelas","cukup jelas","jelas","sangat jelas"]},{"question":"apa saran/pendapatmu terhadap pembelajaran di pertemuan ini?","type":"text"}]';
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->created_id = Auth::user()->id;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('success', 'new attendance updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('error', 'failed to update attendance: ' . $e->getMessage());
        }
    }

    // course class member attendance
    public function getMemberAttendance(Request $request)
    {
        // dd($request->all());
        $attendance = MemberAttendance::getMemberAttendanceByClassAttendanceId($request->class_id, $request->id);
        $class = CourseClass::getClassDetailByClassId($request->class_id);

        // dd($attendance_list);
        return view('attendance::course_class_member_attendance.index', [
            'attendance' => $attendance,
            'class' => $class,
            'class_attendance_id' => $request->id,
        ]);
    }
    public function getMemberAttendanceData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');
        $class_id = $request->input('class_id');
        $class_attendance_id = $request->input('id');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
            'status' => 'ma.status',
        ];
        
        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        // Base query
        $query = DB::table('course_class_member as ccm')
            ->select(
                'ccm.*', 
                'u.name as user_name',
                'ma.id as attendance_id', 
                'ma.feedback', 
                'ma.description as attendance_description', 
                'ma.status as attendance_status'
            )
            ->join('users as u', 'u.id', '=', 'ccm.user_id')
            ->leftJoin('member_attendance as ma', function($join) use ($class_attendance_id) {
                $join->on('ma.user_id', '=', 'ccm.user_id')
                    ->where('ma.course_class_attendance_id', '=', $class_attendance_id);
            })
            ->where('ccm.course_class_id', $class_id);

        // Ordering
        $query->orderBy($finalOrderColumn, $orderDirection);

        // Column-specific filtering
        foreach ($columns as $column) {
            $columnSearchValue = isset($column['search']['value']) ? $column['search']['value'] : null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'id') {
                $query->where('ccm.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'user_name') {
                $query->where('u.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'feedback') {
                $query->where('ma.feedback', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'description') {
                $query->where('ma.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_at') {
                $query->where('ccm.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $query->where('ccm.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $query->where('ccm.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $query->where('ccm.updated_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                $status = 0; // Default status
                $lowerSearchValue = strtolower($columnSearchValue);
                if (strpos('hadir', $lowerSearchValue) === 0) { // Cek jika dimulai dengan 'h' atau 'ha'
                    $status = 1;
                } else if (strpos('izin', $lowerSearchValue) === 0) { // Cek jika dimulai dengan 'i' atau 'iz'
                    $status = 2;
                }
                $query->where('ma.status', '=', $status);
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('user_name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->user_name) . '">
                    ' . \Str::limit($row->user_name, 30) . '
                </span>';
            })
            ->addColumn('feedback', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->feedback ?? '-') . '">
                    ' . \Str::limit($row->feedback ?? '-', 30) . '
                </span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->attendance_description ?? '-')) . '">
                    ' . (!empty($row->attendance_description) ? \Str::limit(strip_tags($row->attendance_description), 30) : '-') . '
                </span>';
            })
            ->addColumn('status', function ($row) {
                $status = isset($row->attendance_status) ? $row->attendance_status : 0;
                
                // Tentukan class status
                $statusClass = 'badge bg-danger'; // Default
                switch ($status) {
                    case 1:
                        $statusClass = 'badge bg-primary';
                        break;
                    case 2:
                        $statusClass = 'badge bg-warning';
                        break;
                }
            
                // Tentukan teks status
                $statusText = 'Tidak Hadir'; // Default
                switch ($status) {
                    case 1:
                        $statusText = 'Hadir';
                        break;
                    case 2:
                        $statusText = 'Izin';
                        break;
                }
            
                // Return button dengan atribut yang sesuai
                return '<button 
                    class="btn btn-status-entities ' . $statusClass . '" 
                    data-id="' . $row->attendance_id . '" 
                    data-status="' . $status . '"
                    data-parent="MemberAttendance"
                    data-model="MemberAttendance">
                    ' . $statusText . '
                </button>';
            })            
            ->addColumn('action', function ($row) use ($request) {
                $class_id = $request->input('class_id');
                $class_attendance_id = $request->input('id');
                
                // If attendance exists, show edit button
                if ($row->attendance_id) {
                    return '<a href="' . route('getEditMemberAttendance', [
                        'id' => $row->attendance_id, 
                        'class_id' => $class_id, 
                        'class_attendance_id' => $class_attendance_id
                    ]) . '" class="btn btn-primary rounded">Ubah</a>';
                }
                
                return '-';
            })
            ->rawColumns(['user_name', 'feedback', 'description', 'status', 'action'])
            ->make(true);
    }
    public function getEditMemberAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);
        $attendance = MemberAttendance::getMemberAttendanceDetailByMemberAttendanceId($request->id);

        return view('attendance::course_class_member_attendance.edit', [
            'attendance' => $attendance,
            'class' => $class,
            'class_attendance_id' => $request->class_attendance_id,
        ]);
    }
    public function postEditMemberAttendance(Request $request)
    {
        // dd($request->all());

        try {
            //code...
            $attendance = MemberAttendance::find($request->attendance_id);
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

            return redirect()->route('getMemberAttendance', ['id' => $request->class_attendance_id, 'class_id' => $request->class_id])->with('success', 'member attendance updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('getMemberAttendance', ['id' => $request->class_attendance_id, 'class_id' => $request->class_id])->with('error', 'failed to update member attendance: ' . $e->getMessage());
        }
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('attendance::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('attendance::create');
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
        return view('attendance::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('attendance::edit');
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
