<?php

namespace Modules\CertificateTemplateEditor\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ClassContentManagement\Entities\CourseClass;

class CertificateTemplateEditorController extends Controller
{
    public function index(Request $request)
    {
        try {
            $class = CourseClass::findOrFail($request->id);
            $classId = $class->id;
            $existingTemplateData = $class->certificate_template_data;

            return view('certificatetemplateeditor::template_editor.index', compact('classId', 'existingTemplateData'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function save(Request $request)
    {
        try {
            $request->validate([
                'templateData' => 'required|string',
            ]);

            CourseClass::where('id', $request->classId)->update([
                'certificate_template_data' => $request->templateData,
            ]);

            return response()->json(['message' => 'Template saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while trying to save template: ' . $e->getMessage()], 400);
        }
    }

    public function setBackgroundImage(Request $request)
    {
        try {
            if ($request->hasFile('backgroundImage')) {
                $file = $request->file('backgroundImage');

                // Generate a unique filename
                $filename = $request->classId . '.' . $file->getClientOriginalExtension();

                // Save the file to the public/uploads/certificate/background_image directory
                $path = $file->move(public_path('uploads/certificate/' . $request->classId . '/background_image'), $filename);

                // Return the relative path to the image
                return response()->json([
                    'success' => true,
                    'imageUrl' => asset('uploads/certificate/' . $request->classId . '/background_image/' . $filename),
                ]);
            }

            return response()->json(['success' => false, 'message' => 'No file uploaded.'], 400);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error while uploading file: ' . $e->getMessage()], 400);
        }
    }
}
