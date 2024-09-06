<?php

namespace Modules\ClassContentManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Http\Controllers\HelperController;


use App\Models\CourseModule;
use App\Models\CourseJournal;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class CourseClassModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCourseClassParentModule(Request $request){
        $course_class_id = $request->id;
        $class_detail = CourseClass::getClassDetailByClassId($course_class_id);
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);

        $courseClassModules = CourseClassModule::getClassModuleParentByClassId($course_class_id);
        // dd($courseClassModules);

        return view('classcontentmanagement::course_class_module.index', [
            'courseclassmodules' => $courseClassModules,
            'course_class_id' => $course_class_id,
            'course_detail' => $course_detail,
            'class_detail' => $class_detail,
        ]);
    }

    function getAddCourseClassModule(Request $request){
        $course_class_id = $request->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllParentCourseModuleByCourseId($course_detail->id);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        // dd($classDetail);
        
        return view('classcontentmanagement::course_class_module.add', [
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    public function postAddCourseClassModule(Request $request){
        // dd($request->all());
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

        if ($create){
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Sukses Menambahkan Modul');
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Gagal Menambahkan Modul, silahkan coba lagi');
        }
    }

    function getEditCourseClassModule(Request $request){
        // dd($request->all());
        $course_class_module_id = $request->id;
        $class_module_detail = CourseClassModule::getClassModuleDetail($course_class_module_id);
        $course_class_detail = CourseClass::getClassDetailByClassModuleId($course_class_module_id);
        
        $course_class_id = $course_class_detail->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllParentCourseModuleByCourseId($course_detail->id);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        // dd($course_class_id);
        return view('classcontentmanagement::course_class_module.edit', [
            'course_class_module' => $class_module_detail,
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    function postEditCourseClassModule(Request $request){
        // dd($request->all());
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

        if ($updateData){
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Update Module Success');
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Failed to Update Module, please try again    ');
        }
    }

    // CHILD
    function getCourseClassChildModule(Request $request){
        $ccmod_parent = CourseClassModule::find($request->id);
        $ccmod_parent->detail = CourseModule::find($ccmod_parent->course_module_id);
        // dd($ccmod_parent);
        $child_modules = CourseModule::getCourseModuleChildByParentId($ccmod_parent->course_module_id);
        $child_ccmod = CourseClassModule::getClassModuleChildByClassId($ccmod_parent->course_class_id);
        $child_list = [];
        foreach($child_modules as $cm){
            foreach($child_ccmod as $ccmod){
                if($ccmod->course_module_id == $cm->id){
                    $ccmod->type = $cm->type;
                    $child_list[] = $ccmod;
                }
            }
        }
        // dd($child_list);

        $class_detail = CourseClass::getClassDetailByClassModuleId($ccmod_parent->id);
        $course_detail = CourseClass::getCourseDetailByClassId($class_detail->id);

        // dd($module_detail);
        return view('classcontentmanagement::course_class_module.child.index', [
            'child_modules' => $child_list,
            // 'course_class_id' => $ccmod_parent->detail->course_class_id,
            'course_detail' => $course_detail,
            'parent_module' => $ccmod_parent,
        ]);
    }
    function getAddCourseClassChildModule(Request $request){
        // dd($request->all()); // dapat course_class_module_id parent nya
        $parent_ccmod_detail = CourseClassModule::find($request->id);
        $parent_cm_detail = CourseModule::getCourseModuleDetailByModuleId($parent_ccmod_detail->course_module_id);
        $class_detail = CourseClass::getClassDetailByClassId($parent_ccmod_detail->course_class_id);
        $child_cm_list = CourseModule::getCourseModuleChildByParentId($parent_cm_detail->id);
        // dd($child_cm_list);

        return view('classcontentmanagement::course_class_module.child.add', [
            'child_cm_list' => $child_cm_list,
            'class_detail' => $class_detail,
            'parent_ccmod_detail' => $parent_ccmod_detail,
        ]);
    }
    function postAddCourseClassChildModule(Request $request){
        // dd($request->all()); // dapat course_class_module_id parent nya

        $create = CourseClassModule::create([
            'start_date' => $request->start,
            'end_date' => $request->end,
            'priority' => $request->priority,
            'level' => 2,
            'course_module_id' => $request->course_module_id,
            'course_class_id' => $request->course_class_id,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);
        
        if ($create){
            return redirect()->route('getCourseClassChildModule', ['id' => $request->ccmod_parent_id])->with('success', 'Sukses Menambahkan Modul');
        } else {
            return redirect()->route('getCourseClassChildModule', ['id' => $request->ccmod_parent_id])->with('failed', 'Gagal Menambahkan Modul, silahkan coba lagi');
        }
    }
    function getEditCourseClassChildModule(Request $request){
        // dd($request->all());
        $parent_ccmod_detail = CourseClassModule::find($request->parent_id);
        $parent_cm_detail = CourseModule::getCourseModuleDetailByModuleId($parent_ccmod_detail->course_module_id);

        $child_ccmod_detail = CourseClassModule::find($request->id);
        $child_cm_detail = CourseModule::getCourseModuleDetailByModuleId($child_ccmod_detail->course_module_id);

        $class_detail = CourseClass::getClassDetailByClassId($parent_ccmod_detail->course_class_id);
        $child_cm_list = CourseModule::getCourseModuleChildByParentId($parent_cm_detail->id);

        $child_detail = CourseClassModule::find($request->id);
        
        // dd($child_cm_detail);
        return view('classcontentmanagement::course_class_module.child.edit', [
            'child_cm_list' => $child_cm_list,
            'class_detail' => $class_detail,
            'parent_ccmod_detail' => $parent_ccmod_detail,
            'child_cm_detail' => $child_cm_detail,
            'child_detail' => $child_detail,
        ]);
    }
    function getJournalCourseClassChildModule(Request $request){
        $ccmod_parent = CourseClassModule::find($request->id);
        $ccmod_parent->detail = CourseModule::find($ccmod_parent->course_module_id);
        $users = CourseJournal::with('User')
            ->where('course_class_module_id', $request->id)
            ->whereNull('course_journal_parent_id')
            ->where('priority', 1)
            ->get();
        
        // dd($users);
        return view('classcontentmanagement::course_class_module.child.journal.index', [
            'users' => $users,
            'parent_module' => $ccmod_parent,
        ]);
    }
    function getAddJournalCourseClassChildModule(Request $request){
        // dd($request->all());
        $ccmod_parent = CourseClassModule::find($request->course_class_module_id);
        $ccmod_parent->detail = CourseModule::find($ccmod_parent->course_module_id);
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
        return view('classcontentmanagement::course_class_module.child.journal.add', [
            'comment' => $comment,
            'parent_module' => $ccmod_parent,
            'course_journal_parent_id' =>$request->id,
        ]);
    }
    function postAddJournalCourseClassChildModule(Request $request){
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
            'priority' => $priority+2,
            'description' => $request->description,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);
        
        if ($create){
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('success', 'Sukses');
        } else {
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('failed', 'Gagal, silahkan coba lagi');
        }
    }
    function postRejectJournalCourseClassChildModule(Request $request){
        // dd($request->all());        
        $journal = CourseJournal::findOrFail($request->id);
        // Toggle the status: if it's 0, set it to 1; if it's 1, set it to 0
        $journal->status = ($journal->status == 0) ? 1 : 0;
        $journal->updated_id = auth()->user()->id;
        $update = $journal->save();
        
        if ($update){
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('success', 'Sukses');
        } else {
            return redirect()->route('getJournalCourseClassChildModule', ['id' => $request->course_class_module_id])->with('failed', 'Gagal, silahkan coba lagi');
        }
    }
    function postEditCourseClassChildModule(Request $request){
        // dd($request->all());

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

        if ($update){
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
