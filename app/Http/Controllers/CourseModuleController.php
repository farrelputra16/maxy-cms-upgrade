<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModule;
use App\Models\MCourseType;
use App\Models\MSurvey;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Str;
use Yajra\DataTables\Facades\DataTables;

class CourseModuleController extends Controller
{
    // PARENT
    function getCourseModule(Request $request)
    {
        // dd($request->all());
        $course_id = $request->course_id;

        $course_detail = Course::getCourseDetailByCourseId($course_id);
        $parent_modules = CourseModule::getCourseModuleParentByCourseId($course_id, $request->page_type);

        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->where('status', 1)->first();

        $bcMBKM = false;

        if ($mbkmType) {
            if ($course_detail->m_course_type_id == $mbkmType->id) {
                $bcMBKM = true;
            }
        }
        // dd($parent_modules);
        return view('course_module.indexv3', [
            'parent_modules' => $parent_modules,
            'course_detail' => $course_detail,
            'page_type' => $request->page_type,
            'bcMBKM' => $bcMBKM,
        ]);
    }
    function getCourseModuleData(Request $request)
    {
        $course_id = $request->input('id');
        $page_type = $request->input('page_type', 'LMS');

        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');

        // Default order column
        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Base query for course modules
        $parentModules = CourseModule::select(
            'id', 
            'name', 
            'priority', 
            'content', 
            'description', 
            'created_at', 
            'created_id', 
            'updated_at', 
            'updated_id', 
            'status'
        )
        ->where('course_id', $course_id)
        ->where('course_module_parent_id', null)
        ->when($page_type != 'CP', function ($query) {
            return $query->where('type', '!=', 'company_profile');
        })
        ->when($page_type == 'CP', function ($query) {
            return $query->where('type', 'company_profile');
        })
        ->orderBy($orderColumn, $orderDirection);

        // Filter columns
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false) {
                    $parentModules->where('status', '=', 0);
                } else {
                    $parentModules->where('status', '=', 1);
                }
            } else {
                $parentModules->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($parentModules)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('priority', function ($row) {
                return $row->priority;
            })
            ->addColumn('content', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->content)) . '">'
                    . (!empty($row->content) ? \Str::limit(strip_tags($row->content), 30) : '-')
                    . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->description)) . '">'
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
                    data-model="CourseModule">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) use ($page_type, $course_id) {
                $editRoute = route('getEditCourseModule', ['id' => $row->id, 'page_type' => $page_type]);
                $contentRoute = route('getCourseSubModule', ['course_id' => $course_id, 'module_id' => $row->id, 'page_type' => 'LMS_child']);
                
                $actions = '<a href="' . $editRoute . '" class="btn btn-primary rounded">Ubah</a>';
                
                if ($page_type == 'LMS') {
                    $actions .= ' <a href="' . $contentRoute . '" class="btn btn-outline-primary rounded-end">Konten</a>';
                }
                
                return $actions;
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'content', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }
    function getCourseSubModule(Request $request)
    {
        // dd($request->all());
        $course_id = $request->course_id;
        $course_detail = Course::getCourseDetailByCourseId($course_id);

        $module_id = $request->module_id;
        $sub_modules = CourseModule::getCourseModuleChildByParentId($module_id);
        $parent_module_detail = CourseModule::getCourseModuleDetailByModuleId($module_id);

        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->where('status', 1)->first();

        $bcMBKM = false;

        if ($mbkmType) {
            if ($course_detail->m_course_type_id == $mbkmType->id) {
                $bcMBKM = true;
            }
        }

        // dd($sub_modules);
        return view('course_module.child.indexv3', [
            'sub_modules' => $sub_modules,
            'course_detail' => $course_detail,
            'parent_module_detail' => $parent_module_detail,
            'page_type' => $request->page_type,
            'bcMBKM' => $bcMBKM,
        ]);
    }
    function getCourseSubModuleData(Request $request)
    {
        $course_id = $request->input('course_id');
        $module_id = $request->input('id');
        $page_type = $request->input('page_type', 'LMS_child');

        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');

        // Default order column
        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Base query for course sub modules
        $subModules = CourseModule::select(
            'id', 
            'name', 
            'priority', 
            'type',
            'material',
            'content', 
            'description', 
            'created_at', 
            'created_id', 
            'updated_at', 
            'updated_id', 
            'status'
        )
        ->where('course_module_parent_id', $module_id)
        ->orderBy($orderColumn, $orderDirection);

        // Filter columns
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false) {
                    $subModules->where('status', '=', 0);
                } else {
                    $subModules->where('status', '=', 1);
                }
            } else {
                $subModules->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($subModules)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('priority', function ($row) {
                return $row->priority;
            })
            ->addColumn('type', function ($row) {
                return $row->type;
            })
            ->addColumn('material', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->material)) . '">'
                    . (!empty($row->material) ? \Str::limit(strip_tags($row->material), 10) : '-')
                    . '</span>';
            })
            ->addColumn('content', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->content)) . '">'
                    . (!empty($row->content) ? \Str::limit(strip_tags($row->content), 30) : '-')
                    . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e(strip_tags($row->description)) . '">'
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
                    data-model="CourseModule">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                $editRoute = route('getEditChildModule', ['id' => $row->id]);
                
                return '<a href="' . $editRoute . '" class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'material', 'content', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddCourseModule(Request $request)
    {
        $course_id = $request->id;
        $course_detail = Course::getCourseDetailByCourseId($course_id);
        $page_type = $request->page_type;

        return view('course_module.addv3', [
            'course_detail' => $course_detail,
            'page_type' => $page_type,
        ]);
    }

    function postAddCourseModule(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required',
        ]);

        $level = 1;
        $type = '';

        if ($request->page_type == 'LMS') {
            $type = 'parent';
        }
        if ($request->page_type == 'CP') {
            $type = 'company_profile';
        }
        // dd($type);

        $create = CourseModule::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'level' => $level,
            'type' => $type,
            'course_id' => $request->course_id,
            'content' => $request->content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if ($create) {
            session()->flash('parent_module_added', 'Modul berhasil ditambahkan! Silakan tambahkan konten.');
            return redirect()->route('getCourseModule', ['course_id' => $request->course_id, 'page_type' => $request->page_type])->with('success', 'Sukses Menambah Modul');
        } else {
            return redirect()->route('getCourseModule', ['course_id' => $request->course_id, 'page_type' => $request->page_type])->with('error', 'Gagal Menambah Modul, silahkan coba lagi');
        }
    }

    function getEditCourseModule(Request $request)
    {
        // dd($request->all());
        $module_id = $request->id;
        $module_detail = CourseModule::getCourseModuleDetailByModuleId($module_id);
        $course = Course::where('id', $module_detail->course_id)->with('type')->first();

        return view('course_module.editv3', [
            'module_detail' => $module_detail,
            'course' => $course,
            'page_type' => $request->page_type,
        ]);
    }

    function postEditCourseModule(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required',
        ]);
        $course_detail = Course::getCourseDetailByCourseId($request->course_id);
        $update = CourseModule::where('id', $request->id)
            ->update([
                "name" => $request->name,
                "priority" => $request->priority,
                "description" => $request->description,
                "status" => $request->status ? 1 : 0,
                'updated_at' => now(),
                'updated_id' => Auth::guard('web')->user()->id,
            ]);

        if ($update) {
            return redirect()->route('getCourseModule', ['course_id' => $course_detail->id, 'page_type' => $request->page_type])->with('success', 'Sukses Update Module');
        } else {
            return redirect()->route('getCourseModule', ['course_id' => $course_detail->id, 'page_type' => $request->page_type])->with('error', 'Gagal Update Modul, silahkan coba lagi');
        }
    }

    // CHILD
    // function getCourseChildModule(Request $request){
    //     $courseParent = CourseModule::find($request->id);
    //     $courseModuleChild = CourseModule::CourseModuleChild($request);

    //     return view('course_module.child.index', [
    //         'courseParent' => $courseParent,
    //         'courseChildModules' => $courseModuleChild
    //     ]);
    // }

    function getAddCourseChildModule(Request $request)
    {
        // dd($request->all());
        $course_detail = Course::getCourseDetailByCourseId($request->course_id);
        $parent = CourseModule::find($request->id);
        $course_type = MCourseType::find($course_detail->m_course_type_id);
        $quiz = MSurvey::where('type', 1)->get();
        $eval = MSurvey::where('type', 0)->get();
        // dd($course_type);
        return view('course_module.child.addv3', [
            'course_type' => $course_type,
            'parent' => $parent,
            'page_type' => $request->page_type,
            'quiz' => $quiz,
            'eval' => $eval
            // 'allChildHave' => $childModules
        ]);
    }

    public function postAddChildModule(Request $request)
    {
        // dd($request->all());
        // Validasi input yang diperlukan
        if ($request->type == 'materi_pembelajaran') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'priority' => 'required|integer|min:1',
                'type' => 'required',
                'material' => 'required'
            ], [
                'material.required' => 'File materi pembelajaraan harus diisi.',
            ]);
        } else if ($request->type == 'video_pembelajaran') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'priority' => 'required|integer|min:1',
                'type' => 'required',
                'material' => 'required',
                'duration' => 'required',
            ], [
                'material.required' => 'Link video harus diisi.',
                'duration.required' => 'Durasi video harus diisi.',
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'priority' => 'required|integer|min:1',
                'type' => 'required',
            ]);
        }

        $parentModule = CourseModule::find($request->parentId);

        if (isset($request->rapid) && $request->rapid == 1) {
            $create = CourseModule::create([
                'name' => $validated['name'],
                'priority' => $validated['priority'],
                'level' => 2,
                'html' => $request->html,
                'js' => $request->js,
                'course_id' => $parentModule->course_id,
                'course_module_parent_id' => $parentModule->id,
                'type' => 'materi_pembelajaran',
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
        } elseif ($request->type == 'quiz') {
            $material = '';
            $create = CourseModule::create([
                'name' => $validated['name'],
                'priority' => $validated['priority'],
                'level' => 2,
                'course_id' => $parentModule->course_id,
                'course_module_parent_id' => $parentModule->id,
                'type' => $request->type,
                'material' => $material,
                'duration' => $request->duration,
                'content' => $request->quiz_content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
        } elseif ($request->type == 'eval') {
            $material = '';
            $create = CourseModule::create([
                'name' => $validated['name'],
                'priority' => $validated['priority'],
                'level' => 2,
                'course_id' => $parentModule->course_id,
                'course_module_parent_id' => $parentModule->id,
                'type' => $request->type,
                'material' => $material,
                'duration' => $request->duration,
                'content' => $request->eval_content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
        } else {
            if ($request->type == 'materi_pembelajaran' || $request->type == 'assignment') {
                $material = '';
                if ($request->hasFile('material')) {
                    $file = $request->file('material');
                    $material = $file->getClientOriginalName();
                    $destinationPath = public_path('/fe/public/files');
                    if (!File::exists($destinationPath)) {
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $material);
                }
            } else {
                $material = $request->material;
            }

            $create = CourseModule::create([
                'name' => $validated['name'],
                'priority' => $validated['priority'],
                'level' => 2,
                'course_id' => $parentModule->course_id,
                'course_module_parent_id' => $parentModule->id,
                'type' => $request->type,
                'material' => $material,
                'grade_status' => $request->grade_status ? 1 : 0,
                'duration' => $request->duration,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
        }

        if ($create) {
            if ($request->current_page == 'class_management') {
                return redirect()->back()->with('success', 'Sukses Menambah Modul');
            } else {
                return redirect()->route('getCourseSubModule', ['course_id' => $parentModule->course_id, 'module_id' => $parentModule->id, 'page_type' => 'LMS_child'])->with('success', 'Sukses Update Module');
            }
        } else {
            if ($request->current_page == 'class_management') {
                return redirect()->back()->with('error', 'Gagal Menambah Modul, silahkan coba lagi');
            } else {
                return redirect()->route('getCourseSubModule', ['course_id' => $parentModule->course_id, 'module_id' => $parentModule->id, 'page_type' => 'LMS_child'])->with('error', 'Gagal Update Modul, silahkan coba lagi');
            }
        }
    }


    function getEditChildModule(Request $request)
    {
        // dd($request->all());
        $childModule = CourseModule::find($request->id);
        $parentModule = CourseModule::find($childModule->course_module_parent_id);
        $course_detail = Course::getCourseDetailByCourseId($parentModule->course_id);
        $course_type = MCourseType::find($course_detail->m_course_type_id);
        $quiz = MSurvey::where('type', 1)->get();
        $idQuiz = '';
        if ($childModule->type == 'quiz') {
            $idQuiz = Str::afterLast($childModule->content, '/');
        }
        $eval = MSurvey::where('type', 0)->get();
        $idEval = '';
        if ($childModule->type == 'eval') {
            $idEval = Str::afterLast($childModule->content, '/');
        }

        // dd($childModule);
        return view('course_module.child.editv3', [
            'childModule' => $childModule,
            'parentModule' => $parentModule,
            'course_type' => $course_type,
            'quiz' => $quiz,
            'idQuiz' => $idQuiz,
            'eval' => $eval,
            'idEval' => $idEval
        ]);
    }

    function postEditChildModule(Request $request)
    {
        // dd($request->all());
        $module_detail = CourseModule::find($request->id);

        // Validasi input yang diperlukan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer|min:1',
        ]);

        if (isset($request->rapid) & $request->rapid == 1) {
            $update = CourseModule::where('id', '=', $request->id)
                ->update([
                    'name' => $validated['name'],
                    'priority' => $validated['priority'],
                    'html' => $request->html,
                    'js' => $request->js,
                    'type' => $request->type,
                    'content' => $request->content,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        } elseif ($request->type == 'quiz') {
            $update = CourseModule::where('id', '=', $request->id)
                ->update([
                    'name' => $validated['name'],
                    'priority' => $validated['priority'],
                    'html' => $request->html,
                    'js' => $request->js,
                    'type' => $request->type,
                    'content' => $request->quiz_content,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        } elseif ($request->type == 'eval') {
            $update = CourseModule::where('id', '=', $request->id)
                ->update([
                    'name' => $validated['name'],
                    'priority' => $validated['priority'],
                    'html' => $request->html,
                    'js' => $request->js,
                    'type' => $request->type,
                    'content' => $request->eval_content,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        } else {
            if ($request->type == 'materi_pembelajaran' || $request->type == 'assignment') {
                $material = $module_detail->material;
                if ($request->hasFile('material')) {
                    $file = $request->file('material');
                    $material = $file->getClientOriginalName();
                    // $destinationPath = public_path('/uploads/course_module/' . $module_detail->course_module_parent_id);
                    $destinationPath = public_path('/fe/public/files');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $material);
                }
            } else {
                $material = $request->material;
            }
            $update = CourseModule::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'priority' => $request->priority,
                    'type' => $request->type,
                    'material' => $material,
                    'grade_status' => $request->grade_status ? 1 : 0,
                    'duration' => $request->duration,
                    'content' => $request->content,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        }

        if ($update) {
            return redirect()->route('getCourseSubModule', ['course_id' => $module_detail->course_id, 'module_id' => $module_detail->course_module_parent_id, 'page_type' => 'LMS_child'])->with('success', 'Sukses Update Module');
        } else {
            return redirect()->route('getCourseSubModule', ['course_id' => $module_detail->course_id, 'module_id' => $module_detail->course_module_parent_id, 'page_type' => 'LMS_child'])->with('error', 'Gagal Update Modul, silahkan coba lagi');
        }
    }
}
