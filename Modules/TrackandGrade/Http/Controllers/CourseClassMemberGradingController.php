<?php

namespace Modules\TrackandGrade\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;
use App\Http\Controllers\HelperController;
use App\Models\CourseModule;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\DB;
use App\Models\AccessMaster;
use Illuminate\Support\Facades\Auth;

class CourseClassMemberGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getGrade(Request $request)
    {
        // dd($request->all());

        // check if user have access to manage all class
        $broGotAccessMaster = AccessMaster::getUserAccessMaster();
        $hasManageAllClass = false;

        foreach ($broGotAccessMaster as $access) {
            if ($access->name === 'manage_all_class') {
                $hasManageAllClass = true;
                break;
            }
        }

        // get class list based on user access
        if ($hasManageAllClass) {
            $class_list = DB::table('course_class')
                ->join('course', 'course.id', '=', 'course_class.course_id')
                ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                ->where('course_class.status', 1)
                ->where('course_class.status_ongoing', 1)
                ->get();
        } else {
            $class_list = DB::table('user_mentorships')
                ->leftJoin('course_class', 'user_mentorships.course_class_id', '=', 'course_class.id')
                ->leftJoin('course', 'course_class.course_id', '=', 'course.id')
                ->leftJoin('m_course_type', 'course.m_course_type_id', '=', 'm_course_type.id')
                ->where('course_class.status', 1)
                ->where('course_class.status_ongoing', 1)
                ->where('user_mentorships.mentor_id', Auth::user()->id)
                ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                ->distinct()
                ->get();


            // DB::table('course_class')
            //     ->join('course', 'course.id', '=', 'course_class.course_id')
            //     ->join('course_class_member', 'course_class.id', '=', 'course_class_member.course_class_id')
            //     ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
            //     ->where('course_class.status', 1)
            //     ->where('course_class.status_ongoing', 1)
            //     ->where('course_class_member.user_id', Auth::user()->id)
            //     ->get();
        }

        // if class has been picked
        // if ($request->has('class_id')) {
        //     $data = CourseClass::getAssignmentModulesByClassId($request->class_id);
        // }

        return view('trackandgrade::course_class_member_grading.index', [
            // 'data' => isset($data) ? $data : [],
            'class_list' => $class_list,
            'class_id' => $request->class_id,
        ]);
    }

    public function getGradeData(Request $request)
    {
        $class_id = $request->input('class_id');
        $draw = $request->input('draw');
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);
        $searchValue = $request->input('search.value');
        $columns = $request->input('columns');
        
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');

        if (!$class_id) {
            return response()->json([
                'draw' => $draw,
                'recordsTotal' => 0, 
                'recordsFiltered' => 0,
                'data' => []
            ]);
        }

        $data = CourseClass::getAssignmentModulesByClassId($class_id);
        $processedData = [];
        $filteredData = [];
        $data_index = 0;

        foreach ($data as $item) {
            foreach ($item->member_list as $key => $member) {
                $data_index++;
                
                // Get status dengan text untuk sorting dan searching
                $statusBadge = $this->getStatusBadge($item, $member);
                $statusText = $statusBadge['text'];
                
                $action = $this->getActionButton($member, $item);

                $rowData = [
                    'no' => str_pad($data_index, 2, '0', STR_PAD_LEFT),
                    'id' => isset($member->submission) ? str_pad($member->submission->id, 2, '0', STR_PAD_LEFT) : '-',
                    'module' => \Str::limit($item->module_name, 30),
                    'module_full' => $item->module_name,
                    'day' => isset($item->parent->priority) ? str_pad($item->parent->priority, 2, '0', STR_PAD_LEFT) : '-',
                    'student_name' => $member->user_name,
                    'file' => $member->submission->submitted_file ?? '-',
                    'submission_time' => $member->submission->submitted_at ?? '-',
                    'grade' => $member->submission->grade ?? '-',
                    'updated_at' => $member->submission->updated_at ?? '-',
                    'student_comment' => $member->submission && $member->submission->comment 
                        ? \Str::limit(strip_tags($member->submission->comment), 30) 
                        : '-',
                    'student_comment_full' => $member->submission ? strip_tags($member->submission->comment) : '-',
                    'tutor_comment' => $member->submission && $member->submission->tutor_comment 
                        ? \Str::limit(strip_tags($member->submission->tutor_comment), 30) 
                        : '-',
                    'tutor_comment_full' => $member->submission ? strip_tags($member->submission->tutor_comment) : '-',
                    'status' => [
                        'display' => $statusBadge,  // untuk tampilan
                        'sort' => $statusText       // untuk sorting
                    ],
                    'action' => $action
                ];

                // Global search
                $matchesGlobalSearch = empty($searchValue) || $this->rowMatchesSearch($rowData, $searchValue);

                // Individual column search
                $matchesColumnSearch = $this->rowMatchesColumnSearch($rowData, $columns);

                if ($matchesGlobalSearch && $matchesColumnSearch) {
                    $filteredData[] = $rowData;
                }
            }
        }

        // Sorting
        if ($orderColumnIndex !== null) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
            // Jangan sort jika kolom yang dipilih adalah 'no'
            if ($orderColumn !== 'no') {
                usort($filteredData, function($a, $b) use ($orderColumn, $orderDirection) {
                    if ($orderColumn === 'status') {
                        $valueA = $a['status']['sort'];
                        $valueB = $b['status']['sort'];
                    } else {
                        $valueA = $this->getSortValue($a, $orderColumn);
                        $valueB = $this->getSortValue($b, $orderColumn);
                    }
                    
                    $valueA = (string)$valueA;
                    $valueB = (string)$valueB;
                    
                    return $orderDirection === 'asc' 
                        ? strcmp($valueA, $valueB) 
                        : strcmp($valueB, $valueA);
                });
            }
        }

        $paginatedData = array_slice($filteredData, $start, $length);

        // Format final output
        // Update nomor berdasarkan pagination
        foreach ($paginatedData as $index => &$row) {
            $row['no'] = str_pad($start + $index + 1, 2, '0', STR_PAD_LEFT);
            $row['status'] = $row['status']['display'];
            unset($row['original_index']); // Hapus index asli sebelum output
        }

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => count($data),
            'recordsFiltered' => count($filteredData),
            'data' => $paginatedData
        ]);
    }

    // Metode tambahan untuk pencarian global
    // Update metode pencarian global untuk handle status
    private function rowMatchesSearch($row, $search)
    {
        $search = strtolower($search);

        $searchableColumns = [
            'no', 'id', 'module', 'day', 'student_name', 
            'file', 'submission_time', 'grade', 'updated_at', 
            'student_comment', 'tutor_comment'
        ];

        // Check regular columns
        foreach ($searchableColumns as $column) {
            $value = strtolower($row[$column] ?? '');
            if (strpos($value, $search) !== false) {
                return true;
            }
        }

        // Check status
        if (isset($row['status']['sort'])) {
            $statusValue = strtolower($row['status']['sort']);
            if (strpos($statusValue, $search) !== false) {
                return true;
            }
        }

        return false;
    }

    // Metode tambahan untuk pencarian per kolom
    private function rowMatchesColumnSearch($row, $columns)
    {
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            if (empty($columnSearchValue)) {
                continue;
            }

            if ($columnName === 'status') {
                $value = strtolower($row['status']['sort']);
            } else {
                $value = strtolower($row[$columnName] ?? '');
            }

            $searchValue = strtolower($columnSearchValue);

            if (strpos($value, $searchValue) === false) {
                return false;
            }
        }

        return true;
    }

    // Metode untuk mendapatkan nilai sorting
    private function getSortValue($row, $column)
    {
        if ($column === 'status') {
            return $row['status']['sort'];
        }
        return $row[$column] ?? '';
    }

    // Tambahkan metode untuk mendapatkan status
    private function getStatusBadge($item, $member)
    {
        if (!isset($member->submission)) {
            return [
                'text' => 'Belum Mengumpulkan',
                'class' => 'bg-danger'
            ];
        }

        if (!$item->module_grade_status) {
            return [
                'text' => 'Tidak Memerlukan Nilai',
                'class' => 'bg-primary'
            ];
        }

        return $member->submission->grade 
            ? [
                'text' => 'Sudah Dinilai',
                'class' => 'bg-success'
            ]
            : [
                'text' => 'Menunggu Penilaian',
                'class' => 'bg-warning'
            ];
    }

    // Tambahkan metode untuk mendapatkan tombol aksi
    private function getActionButton($member, $item)
    {
        if (!$member->submission) {
            return '-';
        }

        $route = route('getEditGrade', ['id' => $member->submission->id]);
        $buttonText = $item->module_grade_status ? 'Nilai Tugas' : 'Lihat Tugas';

        return '<a href="' . $route . '" class="btn btn-primary rounded">' . $buttonText . '</a>';
    }

    // function getGradeCCMH(Request $request)
    // {
    //     $courseNameValue = $request->input('course_name');
    //     $dayValue = $request->input('day');

    //     if ($courseNameValue == 'all') {
    //         // jika course all, day all
    //         if ($dayValue == 'all') {
    //             $ccmh = CourseClassMemberGrading::distinct()->get();
    //             // jika course all, select day spesifik
    //         } else {
    //             $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule', function ($query) use ($dayValue) {
    //                 $query->where('day', $dayValue);
    //             })
    //                 ->distinct()
    //                 ->get();
    //         }
    //     } else { // jika course spesifik
    //         if ($dayValue == 'all') {
    //             // jika course spesifik, day all
    //             $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule.course', function ($query) use ($courseNameValue) {
    //                 $query->where('name', $courseNameValue);
    //             })
    //                 ->distinct()
    //                 ->get();
    //         } else { // jika course spesifik, day spesifik
    //             $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule.course', function ($query) use ($courseNameValue) {
    //                 $query->where('name', $courseNameValue);
    //             })
    //                 ->whereHas('courseClassModule.courseModule', function ($query) use ($dayValue) {
    //                     $query->where('day', $dayValue);
    //                 })
    //                 ->distinct()
    //                 ->get();
    //         }
    //     }

    //     $courseNames = Course::select('name')->get();

    //     $day = CourseModule::select('day')
    //         ->whereNotNull('day')
    //         ->where('day', '!=', '')
    //         ->groupBy('day')
    //         ->get();

    //     return view('trackandgrade::course_class_member_grading.index', compact('ccmh', 'courseNames', 'day', 'courseNameValue', 'dayValue'));
    // }

    function getEditGrade(Request $request)
    {
        // dd($request->all());

        $data = CourseClassMemberGrading::getSubmissionDetailById($request->id);
        $module = CourseClassModule::where('id', $data->course_class_module_id)->with('CourseModule')->first();

        $class_id = Str::snake(Str::lower($data->class_id));
        $user_name = Str::snake(Str::lower($data->user_name));
        $module_name = Str::snake(Str::lower($data->module_name));

        $data->submission_url = 'uploads/course_class_member_grading/' . $class_id . '/' . $user_name . '/' . $module_name . '/' . $data->submitted_file;

        return view('trackandgrade::course_class_member_grading.edit', compact('data', 'module'));
    }

    function postEditGrade(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'grade' => 'nullable|integer|min:0|max:100',
        ]);

        try {
            $data = CourseClassMemberGrading::find($request->id);

            $data->grade = $request->grade;
            $data->tutor_comment = $request->tutor_comment;
            $data->graded_at = Carbon::now();

            $data->save();

            return redirect()->route('getGrade', ['class_id' => $request->class_id])->with('success', 'data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }

    function addCCMH(Request $request, CourseClassMemberGrading $courseClassMemberGrading)
    {
        $user_id = $request->input('user_id');
        $module = $request->input('module');
        $user_name = $request->input('user_name');

        return view('course_class_member_grading.add', compact('courseClassMemberGrading', 'user_id', 'module', 'user_name'));
    }

    function postAddCCMH(Request $request, CourseClassMemberGrading $courseClassMemberGrading)
    {
        $waktuSaatIni = Carbon::now();
        $waktuSaatIni->setTimezone('Asia/Jakarta');
        // Mengambil jam dalam zona waktu yang telah diatur di .env
        $jamDiZonaWaktuAnda = $waktuSaatIni->format('Y-m-d H:i:s');
        $updateData = $courseClassMemberGrading
            ->insert([
                'grade' => $request->grade,
                'graded_at' => $jamDiZonaWaktuAnda,
                'tutor_comment' => $request->tutor_comment
            ]);

        if ($updateData) {
            return app(HelperController::class)->Positive('getCCMHGrade');
        } else {
            return app(HelperController::class)->Warning('getCCMHGrade');
        }
    }

    function postEditCCMH(Request $request)
    {
        // dd($request->all());

        $waktuSaatIni = Carbon::now();
        $waktuSaatIni->setTimezone('Asia/Jakarta');

        // Mengambil jam dalam zona waktu yang telah diatur di .env
        $jamDiZonaWaktuAnda = $waktuSaatIni->format('Y-m-d H:i:s');

        $updateData = CourseClassMemberGrading::where('id', $request->id)
            ->update([
                'grade' => $request->grade,
                'graded_at' => $jamDiZonaWaktuAnda,
                'tutor_comment' => $request->tutor_comment
            ]);

        if ($updateData) {
            return app(HelperController::class)->Positive('getCCMHGrade', ['class_id' => $request->class_id]);
        } else {
            return app(HelperController::class)->Warning('getCCMHGrade');
        }
    }
}
