<?php

namespace Modules\Quiz\Http\Controllers;

use App\Models\CourseModule;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getCMQuiz(Request $request)
    {
        // dd($request->all());
        $module_detail = CourseModule::getCourseModuleDetailByModuleId($request->id);
        $module_detail->parent_detail =CourseModule::getCourseModuleDetailByModuleId($module_detail->course_module_parent_id);
        $question_list = CourseModule::getCourseModuleChildByParentId($request->id);

        // dd($module_detail);
        return view('quiz::course_module.index', [
            'module_detail' => $module_detail,
            'question_list' => $question_list,
        ]);
    }
    public function getEditCMQuiz(Request $request)
    {
        // dd($request->all());
        $quiz = CourseModule::find($request->id);

        // dd($quiz);
        return view('quiz::course_module.edit', ['quiz' => $quiz, 'parent_id' => $request->parent_id]);
    }
    public function postEditCMQuiz(Request $request)
    {
        // dd($request->all());
        $material = $request->option1; // material dipakai untuk kunci jawaban quiz
        $content = $request->option1.';;'.$request->option2.';;'.$request->option3.';;'.$request->option4; // content dipakai untuk menyimpan pilihan jawaban
        $update = CourseModule::where('id', $request->quiz_id)
        ->update([
            'name' => $request->name,
            'priority' => $request->priority,
            'material' => $material,
            'content' => $content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'updated_id' => Auth::user()->id
        ]);

        if($update){
            return redirect()->route('getCMQuiz', ['id' => $request->parent_id])->with('success', 'Sukses Menambah Quiz');
        } else {
            return redirect()->route('getCMQuiz', ['id' => $request->parent_id])->with('error', 'Gagal Menambah Quiz, silahkan coba lagi');
        }
    }
    public function getAddCMQuiz(Request $request)
    {
        $quiz = CourseModule::getCourseModuleDetailByModuleId($request->id);

        // dd($quiz);
        return view('quiz::course_module.add',[
            'quiz' => $quiz,
        ]);
    }
    public function postAddCMQuiz(Request $request)
    {
        // dd($request->all());
        $material = $request->option1; // material dipakai untuk kunci jawaban quiz
        $content = $request->option1.';;'.$request->option2.';;'.$request->option3.';;'.$request->option4; // content dipakai untuk menyimpan pilihan jawaban
        $create = CourseModule::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'level' => 3,
            'course_module_parent_id' => $request->parent_id,
            'course_id' => $request->course_id,
            'type' => 'quiz',
            'material' => $material,
            'content' => $content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if($create){
            return redirect()->route('getCMQuiz', ['id' => $request->parent_id])->with('success', 'Sukses Menambah Quiz');
        } else {
            return redirect()->route('getCourseSubModule', ['id' => $request->parent_id])->with('error', 'Gagal Menambah Quiz, silahkan coba lagi');
        }
    }
    public function getCCModQuiz()
    {
        return view('quiz::course_class_module.index');
    }
    public function index()
    {
        return view('quiz::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('quiz::create');
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
        return view('quiz::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('quiz::edit');
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
