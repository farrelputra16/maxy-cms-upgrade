<?php

namespace Modules\Form\Http\Controllers;

use App\Models\CourseModule;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    public function getCMForm(Request $request)
    {
        // dd($request->all());
        $module_detail = CourseModule::getCourseModuleDetailByModuleId($request->id);
        $module_detail->parent_detail =CourseModule::getCourseModuleDetailByModuleId($module_detail->course_module_parent_id);
        $question_list = CourseModule::getCourseModuleChildByParentId($request->id);

        // dd($question_list);
        return view('form::course_module.index', [
            'module_detail' => $module_detail,
            'question_list' => $question_list,
        ]);
    }
    public function getEditCMForm(Request $request)
    {
        // dd($request->all());
        $form = CourseModule::find($request->id);

        // dd($form);
        return view('form::course_module.edit', ['form' => $form, 'parent_id' => $request->parent_id]);
    }
    public function postEditCMForm(Request $request)
    {
        // dd($request->all());
        $material = $request->option1; // material dipakai untuk kunci jawaban form
        $content = $request->option1.';;'.$request->option2.';;'.$request->option3.';;'.$request->option4; // content dipakai untuk menyimpan pilihan jawaban
        $update = CourseModule::where('id', $request->form_id)
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
            return redirect()->route('getCMForm', ['id' => $request->parent_id])->with('success', 'Sukses Menambah Form');
        } else {
            return redirect()->route('getCMForm', ['id' => $request->parent_id])->with('error', 'Gagal Menambah Form, silahkan coba lagi');
        }
    }
    public function getAddCMForm(Request $request)
    {
        $form = CourseModule::getCourseModuleDetailByModuleId($request->id);

        // dd($form);
        return view('form::course_module.add',[
            'form' => $form,
        ]);
    }
    public function postAddCMForm(Request $request)
    {
        // dd($request->all());
        $create = CourseModule::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'level' => 3,
            'course_module_parent_id' => $request->parent_id,
            'course_id' => $request->course_id,
            'type' => 'form',
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if($create){
            return redirect()->route('getCMForm', ['id' => $request->parent_id])->with('success', 'Sukses Menambah Form');
        } else {
            return redirect()->route('getCourseSubModule', ['id' => $request->parent_id])->with('error', 'Gagal Menambah Form, silahkan coba lagi');
        }
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('form::index');
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('form::create');
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
        return view('form::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('form::edit');
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
