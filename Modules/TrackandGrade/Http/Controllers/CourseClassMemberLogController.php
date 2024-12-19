<?php

namespace Modules\TrackandGrade\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\TrackandGrade\Entities\CourseClassMemberLog;
use App\Http\Controllers\HelperController;
use App\Models\CourseClassMemberHistory;
use App\Models\CourseModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\AccessMaster;
use Yajra\DataTables\Facades\DataTables;

// use DataTables;

class CourseClassMemberLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCCMH(Request $request)
    {
        $requestedUserId = $request->input('user_id');
        if ($requestedUserId !== null && $requestedUserId !== '') {
            return view('trackandgrade::course_class_member_log.index3', [ 'user_id' => $requestedUserId ]);
        }
        return view('trackandgrade::course_class_member_log.index3');
    }

    // public function getCCMH(Request $request)
    // {
    //     return view('trackandgrade::course_class_member_log.index');
    // }

    public function getCCMHData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        // Get user access master
        $broGotAccessMaster = AccessMaster::getUserAccessMaster();
        $hasManageAllClass = false;

        foreach ($broGotAccessMaster as $access) {
            if ($access->name === 'manage_all_class') {
                $hasManageAllClass = true;
                break;
            }
        }

        // Order column mapping
        $orderColumnMapping = [
            'user_name' => 'users.name', // Add this line
            'history' => 'users.name',
            'course_type' => 'course.name',
            'log_type' => 'course_class_member_log.log_type',
            'created_at' => 'course_class_member_log.created_at'
        ];

        // Base query
        $query = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
            ->leftJoin('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
            ->leftJoin('course_module', 'course_module.id', '=', 'course_class_module.course_module_id')
            ->leftJoin('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
            ->leftJoin('course', 'course.id', '=', 'course_class.course_id');

        // Add condition for non-admin users
        if (!$hasManageAllClass) {
            $query->leftJoin('course_class_member', 'course_class_member.course_class_id', '=', 'course_class.id')
                ->where('course_class_member.user_id', Auth::user()->id);
        }

        // Select columns
        $query->select([
            'course_class_member_log.*',
            'users.name as user_name',
            'course_module.type as course_type',
            'course_module.day as day',
            'course_module.name as course_module_name',
            'course.name as course_name',
            'course_class.batch as batch'
        ]);

        // Determine order column
        $orderColumn = 'created_at';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumnName = $columns[$orderColumnIndex]['data'];
            $orderColumn = $orderColumnMapping[$orderColumnName] ?? $orderColumn;
        }

        $requestedUserId = $request->input('id');
        if ($requestedUserId !== null && $requestedUserId !== '') {
            $query->where('users.id', '=', $requestedUserId);
        }

        // Global search
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('users.name', 'like', "%{$searchValue}%")
                ->orWhere('course.name', 'like', "%{$searchValue}%")
                ->orWhere('course_module.name', 'like', "%{$searchValue}%")
                ->orWhere('course_class_member_log.log_type', 'like', "%{$searchValue}%");
            });
        }

        // Column-specific search
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            if (empty($columnSearchValue) || in_array($columnName, ['action'])) {
                continue;
            }

            switch ($columnName) {
                case 'user_name':
                    $query->where('users.name', 'like', "%{$columnSearchValue}%");
                    break;
                case 'history':
                    $query->where(function ($q) use ($columnSearchValue) {
                        $q->where('users.name', 'like', "%{$columnSearchValue}%")
                          ->orWhere('course.name', 'like', "%{$columnSearchValue}%")
                          ->orWhere('course_module.name', 'like', "%{$columnSearchValue}%")
                          ->orWhere('course_class.batch', 'like', "%{$columnSearchValue}%");
                    });
                    break;
                case 'course_type':
                    $query->where(function ($q) use ($columnSearchValue) {
                        $q->where('course.name', 'like', "%{$columnSearchValue}%")
                            ->orWhere('course_class.batch', 'like', "%{$columnSearchValue}%");
                    });
                    break;
                case 'log_type':
                    $query->where('course_class_member_log.log_type', 'like', "%{$columnSearchValue}%");
                    break;
                case 'created_at':
                    $query->where('course_class_member_log.created_at', 'like', "%{$columnSearchValue}%");
                    break;
            }
        }

        if (!$orderColumnIndex) {
            $query->orderBy('course_class_member_log.created_at', 'desc');
        } else {
            // Order the query
            $query->orderBy($orderColumn, $orderDirection);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('user_name', function ($row) {
                return $row->user_name; // Return the user name
            })
            ->addColumn('history', function ($row) {
                // Your existing logic for generating history text
                $historyText = '';
                if ($row->status_log == 1) {
                    if (in_array($row->course_type, ['pretest', 'postest', 'unjukketerampilan'])) {
                        $historyText = "{$row->user_name} di kelas {$row->course_name} - Batch {$row->batch} Mendapatkan Paket Soal {$row->paket_soal} Mengerjakan Module yaitu {$row->course_module_name} - Day {$row->day}";
                    } elseif ($row->course_type == 'assignment') {
                        $historyText = "{$row->user_name} di kelas {$row->course_name} - Batch {$row->batch} Mengumpulkan(submit) Tugas Module yaitu {$row->course_module_name} - Day {$row->day}";
                    }
                } elseif ($row->status_log == 2) {
                    if ($row->log_type == 'profile') {
                        $historyText = "{$row->user_name} Membuka Profilenya";
                    } else {
                        $historyText = "{$row->user_name} di kelas {$row->course_name} - Batch {$row->batch}, Membuka Module yaitu {$row->course_module_name} - Day {$row->day}";
                    }
                } elseif ($row->status_log == 3) {
                    $historyText = "{$row->user_name} Mengubah Profilenya";
                } elseif ($row->status_log == 4) {
                    if ($row->log_type == 'profile') {
                        $historyText = "{$row->user_name} Mengubah Foto Profilenya";
                    } else {
                        $historyText = "{$row->user_name} di kelas {$row->course_name} - Batch {$row->batch}, Menghapus(unsubmit) Tugas Modulenya yaitu {$row->course_module_name} - Day {$row->day}";
                    }
                }

                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($historyText)) . '">'
                    . (!empty($historyText) ? \Str::limit(strip_tags($historyText), 50) : '-')
                    . '</span>';
            })
            ->addColumn('course_type', function ($row) {
                return $row->course_name ? "{$row->course_name} - Batch {$row->batch}" : '';
            })
            ->addColumn('log_type', function ($row) {
                return $row->log_type ?? '';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->rawColumns(['history', 'course_type'])
            ->make(true);
    }

    function getnameCCMH(Request $request)
    {

        $courseNameValue = $request->input('course_name');
        $userNameValue = $request->input('user_name');
        if ($courseNameValue == 'all') {
            if ($userNameValue == 'all') { // jika course all, member all
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->distinct()
                    ->get();
            } else { // jika course all, select member spesifik
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->where('users.name', $userNameValue)
                    ->distinct()
                    ->get();
            }
        } else { // jika course spesifik
            if ($userNameValue == 'all') { // jika course spesifik, member all
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->where('course.name', $courseNameValue)
                    ->distinct()
                    ->get();
            } else { // jika course spesifik, member spesifik
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->where('course.name', $courseNameValue)
                    ->where('users.name', $userNameValue)
                    ->distinct()
                    ->get();
            }
        }
        // return dd($ccmh);
        $course_name = Course::select('name')
            ->get();
        $user_name = User::where('access_group_id', 2)
            ->pluck('name');

        return view('trackandgrade::course_class_member_log.index', ['ccmh' => $ccmh, 'course_name' => $course_name, 'user_name' => $user_name, 'courseNameValue' => $courseNameValue, 'userNameValue' => $userNameValue]);
    }
    public function index()
    {
        return view('trackandgrade::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('trackandgrade::create');
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
        return view('trackandgrade::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('trackandgrade::edit');
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
