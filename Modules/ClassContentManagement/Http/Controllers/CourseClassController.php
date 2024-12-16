<?php

namespace Modules\ClassContentManagement\Http\Controllers;

use App\Models\CourseJournal;
use App\Models\UserMentorship;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Auth;
use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;
use Modules\TrackandGrade\Entities\CourseClassMemberLog;
use Modules\Enrollment\Entities\CourseClassMember;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\AccessMaster;
use App\Models\MClassType;
use App\Models\Transkrip;
use App\Models\MScore;
use App\Models\TransOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Modules\Attendance\Entities\CourseClassAttendance;
use Modules\Attendance\Entities\MemberAttendance;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class CourseClassController extends Controller
{
    function generateAttendanceAllClass()
    {
        try {
            //code...
            $broGotAccessMaster = AccessMaster::getUserAccessMaster();
            $hasManageAllClass = false;

            foreach ($broGotAccessMaster as $access) {
                if ($access->name === 'manage_all_class') {
                    $hasManageAllClass = true;
                    break;
                }
            }

            if ($hasManageAllClass) {
                $classList = CourseClass::getAllCourseClass();
            } else {
                $classList = CourseClass::getAllCourseClassbyMentor();
            }
            // dd($classList);

            foreach ($classList as $key => $value) {
                // auto generate student attendance (preventing error if student enrolls mid class)
                MemberAttendance::generateMemberAttendance($value->id);
            }
            return redirect()->route('getCourseClass')->with('success', 'missing student attendances generated successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'failed to generate missing student attendances, ' . $e->getMessage());
        }
    }

    function getCourseClassScoring(Request $request)
    {
        // dd($request->all());
        $classes = CourseClassModule::with(['CourseClass', 'CourseModule'])
            ->where('course_class_id', $request->id)
            ->whereHas('CourseModule', function ($query) {
                $query->where('type', 'assignment')
                    ->where('grade_status', 1);
            })
            ->orderBy('course_class_module.id')
            ->get();

        if ($classes->isEmpty()) {
            return redirect()->route('getCourseClass')->with('error', 'Kelas ini belum memiliki tugas yang akan dinilai');
        }

        // $coba = CourseClassModule::with(['CourseClass', 'CourseModule'])
        // ->where('course_class_id', $request->id)
        // ->get();
        // dd($coba->toArray());

        return view('classcontentmanagement::course_class.scoring', [
            'classes' => $classes,
            'id' => $request->id,
        ]);
    }

    public function postCourseClassScoring(Request $request)
    {
        //dd($request->all());
        try {
            // Mengubah nilai kosong atau null pada attendance menjadi 0
            $attendance = $request->attendance ?? 0;

            // Update attendance percentage
            $updateData = CourseClass::where('id', $request->id)
                ->update([
                    'percentage' => $attendance,
                ]);

            $data = $request->all();

            // Ubah nilai kosong atau null pada setiap module percentage menjadi 0
            foreach ($data as $id => $percentage) {
                if (!is_numeric($id)) {
                    continue;
                }
                // Ubah nilai kosong menjadi 0
                $percentage = $percentage ?? 0;

                CourseClassModule::where('id', $id)->update(['percentage' => $percentage]);
            }

            $members = CourseClassMember::where('course_class_id', $request->id)->get();
            foreach ($members as $member) {
                $data = Transkrip::where('user_id', $member->user_id)
                    ->where('course_class_id', $request->id)
                    ->first();

                $attendance_percentage = CourseClass::where('id', $request->id)->value('percentage') ?? 0;

                $courseClassId = $request->id;
                $absentCount = MemberAttendance::where('user_id', $member->user_id)
                    ->whereNull('attended_at')
                    ->whereHas('CourseClassAttendance', function ($query) use ($courseClassId) {
                        $query->whereHas('CourseClassModule', function ($query) use ($courseClassId) {
                            $query->where('course_class_id', $courseClassId);
                        });
                    })
                    ->count();

                $totalCount = MemberAttendance::where('user_id', $member->user_id)
                    ->whereHas('CourseClassAttendance', function ($query) use ($courseClassId) {
                        $query->whereHas('CourseClassModule', function ($query) use ($courseClassId) {
                            $query->where('course_class_id', $courseClassId);
                        });
                    })
                    ->count();

                $attendance_score = $totalCount > 0 ? ($absentCount / $totalCount) * 100 : 0;
                $score = $attendance_score * $attendance_percentage / 100;

                $course_module_percentage = CourseClassModule::with(['CourseClass', 'CourseModule'])
                    ->where('course_class_id', $request->id)
                    ->whereHas('CourseModule', function ($query) {
                        $query->where('type', 'assignment');
                    })
                    ->orderBy('course_class_module.id')
                    ->get();

                foreach ($course_module_percentage as $item) {
                    // Ubah nilai kosong menjadi 0 jika grade null
                    $item->grade = CourseClassMemberGrading::where('course_class_module_id', $item->id)
                        ->where('user_id', $member->user_id)
                        ->value('grade') ?? 0;

                    $score += $item->grade * $item->percentage / 100;
                }

                $score = ceil($score);
                $score = min($score, 100); // Pastikan nilai maksimum adalah 100
                $score_id = MScore::where('range_start', '<=', $score)->where('range_end', '>=', $score)->first();

                if ($score_id == null) {
                    dd($score, $score_id, $data);
                }

                if ($data) {
                    $data->update(['m_score_id' => $score_id->id, 'updated_id' => Auth::user()->id]);
                } else {
                    $create = Transkrip::create([
                        'user_id' => $member->user_id,
                        'course_class_id' => $request->id,
                        'm_score_id' => $score_id->id,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id
                    ]);
                }
            }

            return app(HelperController::class)->Positive('getCourseClass');
        } catch (Exception $e) {
            dd($e);
            return app(HelperController::class)->Warning('getCourseClass');
        }
    }

    function getCourseClass()
    {
        // $broGotAccessMaster = AccessMaster::getUserAccessMaster();
        // $hasManageAllClass = false;

        // foreach ($broGotAccessMaster as $access) {
        //     if ($access->name === 'manage_all_class') {
        //         $hasManageAllClass = true;
        //         break;
        //     }
        // }

        // if ($hasManageAllClass) {
        //     $courseList = CourseClass::getAllCourseClass();
        // } else {
        //     $courseList = CourseClass::getAllCourseClassbyMentor();
        // }

        // $batchTitle = $courseList->isNotEmpty() ? $courseList[0]->batch : 'No Batch Available';

        return view('classcontentmanagement::course_class.indexv3', [
            // 'course_list' => $courseList,
            // 'batch_title' => $batchTitle
        ]);

        // $courseList = CourseClass::getAllCourseClass();
        // dd($courseList);
        // return view('classcontentmanagement::course_class.index', ['course_list' => $courseList]);
    }

    public function getCourseClassData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Mapping kolom untuk pengurutan yang benar
        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
            'course_name' => 'course.name',
            'type' => 'm_course_type.name',
            'class_type' => 'm_class_type.name',
            'status_ongoing' => 'course_class.status_ongoing',
            'start_date' => 'course_class.start_date',
            'end_date' => 'course_class.end_date',
            'quota' => 'course_class.quota',
            'credits' => 'course_class.credits',
            'duration' => 'course_class.duration',
            'created_at' => 'course_class.created_at',
            'updated_at' => 'course_class.updated_at',
            'status' => 'course_class.status'
        ];

        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        // Determine if user has manage_all_class access
        $broGotAccessMaster = AccessMaster::getUserAccessMaster();
        $hasManageAllClass = $broGotAccessMaster->contains('name', 'manage_all_class');

        // Base query
        $query = CourseClass::select(
            'course_class.*', 
            'course.name as course_name', 
            'course.slug as course_slug', 
            'm_course_type.name as type', 
            'm_course_type.slug as type_slug', 
            'm_class_type.name as class_type'
        )
        ->join('course', 'course.id', '=', 'course_class.course_id')
        ->join('m_course_type', 'm_course_type.id', '=', 'course.m_course_type_id')
        ->join('m_class_type', 'm_class_type.id', '=', 'course_class.m_class_type_id');

        // If user doesn't have manage_all_class, filter by mentor
        if (!$hasManageAllClass) {
            $query->join('user_mentorships', 'user_mentorships.course_class_id', '=', 'course_class.id')
                ->where('user_mentorships.mentor_id', Auth::user()->id);
        }

        $query->orderBy($finalOrderColumn, $orderDirection);

        // Column-specific filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action', 'krs_url', 'status_ongoing'])) {
                continue;
            } else if ($columnName == 'course_name') {
                $query->where('course.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'type') {
                $query->where('m_course_type.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'class_type') {
                $query->where('m_class_type.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                $query->where('course_class.status', '=', stripos($columnSearchValue, 'Non') !== false ? 0 : 1);
            } else if ($columnName == 'description') {
                $query->where('course_class.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'content') {
                $query->where('course_class.content', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'credits') {
                $query->where('course_class.credits', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'duration') {
                $query->where('course_class.duration', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'id') {
                $query->where('course_class.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_at') {
                $query->where('course_class.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $query->where('course_class.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $query->where('course_class.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $query->where('course_class.updated_id', 'like', "%{$columnSearchValue}%");
            } else {
                $query->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('course_name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->course_name) . '">'
                    . \Str::limit(e($row->course_name . ' Kelas Paralel ' . $row->batch), 30)
                    . '</span>';
            })
            ->addColumn('type', function ($row) {
                return \Str::limit($row->type, 30);
            })
            ->addColumn('class_type', function ($row) {
                return \Str::limit($row->class_type, 30);
            })
            ->addColumn('status_ongoing', function ($row) {
                $statusLabels = [
                    0 => ['text' => 'Belum Dimulai', 'class' => 'bg-secondary'],
                    1 => ['text' => 'Sedang Berlangsung', 'class' => 'bg-success'],
                    2 => ['text' => 'Sudah Selesai', 'class' => 'bg-primary']
                ];
                $status = $statusLabels[$row->status_ongoing] ?? ['text' => 'Status Tidak Diketahui', 'class' => 'bg-danger'];
                
                return "<span class='badge {$status['class']}' style='pointer-events: none;'>{$status['text']}</span>";
            })
            ->addColumn('start_date', function ($row) {
                return !empty($row->start_date) ? \Str::limit($row->start_date, 30) : '-';
            })
            ->addColumn('end_date', function ($row) {
                return !empty($row->end_date) ? \Str::limit($row->end_date, 30) : '-';
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
                    data-model="CourseClass">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                $actions = [
                    '<a href="' . route('getEditCourseClass', ['id' => $row->id]) . '" class="btn btn-primary btn-sm">Ubah</a>',
                    '<a href="' . route('getCourseClassModule', ['id' => $row->id]) . '" class="btn btn-info btn-sm">Modul</a>',
                    '<a href="' . route('getCourseClassMember', ['id' => $row->id]) . '" class="btn btn-info btn-sm">Mahasiswa</a>',
                    '<a href="' . route('getCourseClassAttendance', ['id' => $row->id]) . '" class="btn btn-outline-primary btn-sm">Absensi</a>',
                    '<a href="' . route('getCourseClassScoring', ['id' => $row->id]) . '" class="btn btn-outline-primary btn-sm">Penilaian</a>'
                ];

                // Conditionally add delete button based on user session
                if (Session::has('access_master') && 
                    Session::get('access_master')->contains('access_master_name', 'course_class_delete')) {
                    $actions[] = '
                    <form id="delete-course-class-form-' . $row->id . '" 
                        action="' . route('deleteCourseClass', ['id' => $row->id]) . '" 
                        method="POST" class="d-inline-block"
                        data-course-name="' . $row->course_name . '">
                        ' . method_field('DELETE') . '
                        ' . csrf_field() . '
                        <button type="button" class="btn btn-sm btn-danger delete-course-class-btn">Hapus</button>
                    </form>';
                }

                return implode(' ', $actions);
            })
            ->orderColumn('id', 'course_class.id $1')
            ->rawColumns(['course_name', 'status_ongoing', 'status', 'action'])
            ->make(true);
    }
    function getAddCourseClass()
    {
        $allCourses = Course::all();
        $allClassType = MClassType::where('status', 1)->get();

        return view('classcontentmanagement::course_class.addv3', [
            'allCourses' => $allCourses,
            'allClassType' => $allClassType
        ]);
    }

    function getDuplicateCourseClass()
    {
        $classes = CourseClass::all();
        $allClassType = MClassType::where('status', 1)->get();
        $classList = [];

        foreach ($classes as $c) {
            $classDetail = CourseClass::getClassDetailByClassId($c->id);
            $classList[] = $classDetail;
        }

        // $courseList = Course::all();

        return view('classcontentmanagement::course_class.duplicatev3', [
            // 'course_list' => $courseList,
            'class_list' => $classList,
            'allClassType' => $allClassType
        ]);
    }

    public function postAddCourseClass(Request $request)
    {
        // Validasi input termasuk slug
        $validated = $request->validate([
            'batch' => 'required',
            'slug' => 'required|unique:course_class,slug', // Pastikan slug unik
            'class_type_id' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'quota' => 'required|integer|gte:1',
            'ongoing' => 'required',
            'semester' => 'required|numeric|min:1',
            'credits' => 'required',
            'duration' => 'required'
        ]);
        // dd($request->all());

        // Jika validasi berhasil
        if ($validated) {
            // Input data ke database
            $create = CourseClass::create([
                'batch' => $request->batch,
                'slug' => $request->slug, // Slug disimpan di database
                'credits' => $request->credits,
                'duration' => $request->duration,
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'course_id' => $request->course_id,
                'm_class_type_id' => $request->class_type_id,
                'announcement' => $request->announcement,
                'semester' => $request->semester,
                'content' => $request->content,
                'description' => $request->description,
                'status_ongoing' => $request->ongoing,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            // Redirect atau feedback berdasarkan hasil create
            if ($create) {
                session()->flash('class_added', 'Kelas berhasil ditambahkan! Silakan tambahkan modul kelas.');
                return app(HelperController::class)->Positive('getCourseClass');
            }
        }
    }


    public function postDuplicateCourseClass(Request $request)
    {
        $validated = $request->validate([
            'class_type_id' => 'required',
            'ongoing' => 'required',
        ]);

        if ($validated) {
            $courseClass = CourseClass::with('course')->where('id', $request->course_class_id)->first();
            $courseClass->slug = $courseClass->course->name . '-' . $request->batch;
            $courseClass->batch = $request->batch;
            $courseClass->semester = $request->semester;
            $courseClass->m_class_type_id = $request->class_type_id;
            if ($request->ongoing != null) {
                $courseClass->status_ongoing = $request->ongoing;
            }
            // $courseClass->course_id = $request->course_id;
            
            // insert course class yang telah diubah
            $newCourseClass = $courseClass->replicate();
            
            // Memeriksa jika start_date tidak valid dan menggantinya dengan tanggal hari ini
            if ($newCourseClass->start_date == '0000-00-00') {
                $currentDate = date('Y-m-d');
                $newCourseClass->start_date = $currentDate;
            }
            // Memeriksa jika end_date tidak valid dan menggantinya dengan tanggal hari ini
            if ($newCourseClass->end_date == '0000-00-00') {
                $currentDate = date('Y-m-d');
                $newCourseClass->end_date = $currentDate;
            }
            // mengubah status dari class baru
            if ($request->status == null) {
                $newCourseClass->status = 0;
            } else {
                $newCourseClass->status = 1;
            }
    
            $newCourseClass->save();
    
            // mengambil id course class yang barusan dibuat
            $lastCourseClassId = CourseClass::orderBy('id', 'desc')->first();
    
            // mengambil id course class module yang ingin di duplicate
            $courseClassModule = CourseClassModule::where('course_class_id', $request->course_class_id)->get();
    
            // Duplicate setiap course class module
            foreach ($courseClassModule as $module) {
                $newModule = $module->replicate();
                $newModule->course_class_id = $lastCourseClassId->id;
    
                // Memeriksa jika start_date tidak valid dan menggantinya dengan waktu hari ini
                if ($newModule->start_date == '0000-00-00 00:00:00') {
                    $newModule->start_date = now();
                }
                // Memeriksa jika end_date tidak valid dan menggantinya dengan waktu hari ini
                if ($newModule->end_date == '0000-00-00 00:00:00') {
                    $newModule->end_date = now();
                }
    
                $newModule->save();
            }
    
            return app(HelperController::class)->Positive('getCourseClass');
        }
    }

    function getEditCourseClass(Request $request)
    {
        $courseClassId = $request->id;
        $courseClassDetail = CourseClass::getClassDetailByClassId($courseClassId);

        $courseList = Course::get();
        $classTypeList = MClassType::where('status', 1)->get();

        return view('classcontentmanagement::course_class.editv3', [
            'course_class_detail' => $courseClassDetail,
            'course_list' => $courseList,
            'class_type_list' => $classTypeList
        ]);
    }

    public function postEditCourseClass(Request $request)
    {
        // Validasi input termasuk slug
        $validated = $request->validate([
            'batch' => 'required',
            'slug' => 'required|unique:course_class,slug,' . $request->id, // Slug unik kecuali milik sendiri
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'quota' => 'required|integer|gte:1',
            'ongoing' => 'required',
            'semester' => 'required|numeric|min:1',
            'credits' => 'required',
            'duration' => 'required'
        ]);

        // dd($request->announcement);

        // Update data course class
        $courseClassId = $request->id;

        $updateData = CourseClass::where('id', $courseClassId)
            ->update([
                'batch' => $request->batch,
                'slug' => $request->slug, // Slug disimpan di database
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'credits' => $request->credits,
                'duration' => $request->duration,
                'course_id' => $request->course_id,
                'm_class_type_id' => $request->class_type_id,
                'announcement' => $request->announcement,
                'semester' => $request->semester,
                'content' => $request->content,
                'status_ongoing' => $request->ongoing ? $request->ongoing : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);

        // Redirect atau feedback berdasarkan hasil update
        if ($updateData) {
            return app(HelperController::class)->Positive('getCourseClass');
        } else {
            return app(HelperController::class)->Warning('getCourseClass');
        }
    }


    public function deleteCourseClass(Request $request)
    {
        // Cari kelas berdasarkan ID
        $courseClassId = $request->id;
        $courseClass = CourseClass::find($courseClassId);

        if (!$courseClass) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan.');
        }

        try {
            // Cari semua modul yang terkait dengan kelas
            $courseClassModules = CourseClassModule::where('course_class_id', $courseClassId)->get();

            foreach ($courseClassModules as $module) {
                 // 1. Hapus course_journal yang terkait dengan module terlebih dahulu
                $courseJournals = CourseJournal::where('course_class_module_id', $module->id)->get();
                foreach ($courseJournals as $journal) {
                    $journal->delete(); // Hapus setiap jurnal terkait
                }

                // 1. Hapus file submission
                $gradings = CourseClassMemberGrading::where('course_class_module_id', $module->id)->get();

                foreach ($gradings as $grading) {
                    if ($grading->submitted_file) {
                        // Hapus file dari storage
                        $folderPath = public_path("uploads/"."course_class_member_grading/"."$courseClass->id");
                        $this->deleteFolderRecursive($folderPath);
                    }
                }
                // Hapus user_mentorships yang terkait dengan course_class
                UserMentorship::where('course_class_id', $courseClassId)->delete();

                // Hapus data grading dari database
                CourseClassMemberGrading::where('course_class_module_id', $module->id)->delete();

                // 2. Hapus log terkait modul
                CourseClassMemberLog::where('course_class_module_id', $module->id)->delete();

                // 3. Hapus data attendance
                CourseClassAttendance::where('course_class_module_id', $module->id)->delete();
            }

            // Hapus data modul dari database
            CourseClassModule::where('course_class_id', $courseClassId)->delete();

            // Hapus anggota kelas
            CourseClassMember::where('course_class_id', $courseClassId)->delete();

            // Hapus transaksi yang terkait dengan kelas
            TransOrder::where('course_class_id', $courseClassId)->delete();

            // Hapus kelas itu sendiri
            $courseClass->delete();

            return redirect()->back()->with('success', 'Kelas telah berhasil dihapus.');
        } catch (\Exception $e) {
            // Log error jika terjadi masalah
            \Log::error('Error saat menghapus kelas: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Fungsi untuk menghasilkan path folder berdasarkan nama kelas, nama pengguna, dan nama modul.
     */
    // private function generateFolder($courseClassId, $userName, $moduleName)
    // {
    //     $courseClassId = Str::snake(Str::lower($courseClassId));
    //     $userName = Str::snake(Str::lower($userName));
    //     $moduleName = Str::snake(Str::lower($moduleName));

    //     return "course_class_member_grading/$courseClassId/$userName/$moduleName";
    // }

    private function deleteFolderRecursive($folderPath)
    {
        if (is_dir($folderPath)) {
            // Ambil semua file dan folder di dalam folder
            Log::debug("Memeriksa folder: $folderPath");
            $files = array_diff(scandir($folderPath), array('.', '..'));

            // Hapus setiap file dan subfolder
            foreach ($files as $file) {
                $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
                if (is_dir($filePath)) {
                    // Jika itu adalah folder, hapus secara rekursif
                    $this->deleteFolderRecursive($filePath);
                } else {
                    Log::debug("Menghapus file: $filePath");
                    // Jika itu adalah file, hapus file
                    unlink($filePath);
                }
            }

            // Setelah semua file dan subfolder dihapus, hapus folder itu sendiri
            Log::debug("Menghapus folder: $folderPath");
            rmdir($folderPath);
        }
    }
}
