@extends('layout.main-v3')

@section('title', 'Add New Submodule')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ $course_type->slug == 'mbkm' ? route('getCourseMBKM') : route('getCourse') }}">{{ $course_type->slug == 'mbkm' ? 'MBKM' : 'Course' }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $parent->course_id, 'page_type' => 'LMS']) }}">
                                {{ $parent->course_name }}</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseSubModule', ['course_id' => $parent->course_id, 'module_id' => $parent->id, 'page_type' => 'LMS_child']) }}">{{ $parent->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">Add New Submodule</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Awal Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Tambah Sub Modul Mata Kuliah Baru</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menambahkan sub modul mata kuliah pada mata kuliah yang ada. Isi
                        data-data
                        dengan lengkap dan pastikan informasinya akurat agar pengalaman belajar peserta mata kuliah
                        maksimal.
                    </p>

                    <form id="addChildModule"
                        action="{{ route('postAddChildModule', ['parentId' => $parent->id, 'page_type' => $page_type]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-parent-module" class="col-md-2 col-form-label">Parent Module</label>
                            <div class="col-md-10">
                                <input id="input-parent-module" class="form-control" type="text"
                                    value="{{ $parent->name }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-module-name" class="col-md-2 col-form-label">
                                Module Name <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input id="input-module-name" class="form-control" type="text" name="name"
                                    placeholder="Enter the name of the module..." value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-priority" class="col-md-2 col-form-label">
                                Priority <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input id="input-priority" class="form-control" type="number" name="priority"
                                    min="1" placeholder="Enter the recommended order of the module (1, 2, 3)"
                                    value="{{ old('priority') ? old('priority') : ($highestPriority ? $highestPriority->priority + 1 : 1) }}"
                                    required>
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Start Material -->
                        <hr>
                        <div class="mb-3 row">
                            <label for="input-type" class="col-md-2 col-form-label">Module Type <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select id="input-type" name="type" class="form-control select2" id="input-type"
                                    onchange="updateMaterialInput(this.value)">
                                    @foreach ($type as $item)
                                        @if ($item->name != 'parent')
                                            <option value="{{ $item->id }}"
                                                {{ old('type') == $item->id ? 'selected' : '' }}>
                                                {{ $item->description }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="material" class="mb-3 row">
                            <!-- Generate Material Input Fields via JavaScript -->

                        </div>

                        <div class="row mb-3">
                            <label for="input-duration" class="col-md-2 col-form-label">
                                Lesson Duration <span class="text-secondary"><small>(in minutes)</small></span>
                            </label>
                            <div class="col-md-10">
                                <input id="input-duration" class="form-control" type="number" name="duration"
                                    value="{{ old('duration') }}">
                            </div>
                        </div>

                        <hr>
                        <!-- End Material -->

                        <div class="mb-3 row">
                            <label for="elm1" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content" placeholder="This text will be displayed as the introduction of the module...">
                                    {{ old('content') }}
                                </textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Admin Notes</label>
                            <div class="col-md-10">
                                <input id="input-description" class="form-control" type="text" name="description"
                                    placeholder="These notes won't be shown to students, but mentors and admins can see them..."
                                    value="{{ old('description') }}">
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="input-grade-status">Require Grading</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0 me-3" type="checkbox" id="input-grade-status"
                                    name="grade_status" {{ old('grade_status') ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this ON if this module needs to be graded"></i>
                                </span>
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="input-status">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0 me-3" type="checkbox" id="input-status"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to archieve the data instead of publishing it"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addChildModule">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div> <!-- akhir col -->
    </div> <!-- akhir row -->
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var typeSelector = document.getElementById('input-type');
            var material = document.getElementById('material');
            var duration = document.getElementById('duration');
            var contentDiv = document.getElementById('content');
            var quizContentDiv = document.getElementById('quiz-content');
            var evalContentDiv = document.getElementById('eval-content');

            // Check Module Type on Page Load
            updateMaterialInput(typeSelector.value);
        });

        // Function for Updating Material Input Fields
        function updateMaterialInput(moduleType) {
            if (moduleType == 4) { // File Material (pdf, ppt, etc)
                material.innerHTML = `
                <label for="formFile" class="col-md-2 col-form-label" >Lesson File</label>
                <div class="col-md-10">
                    <input class="form-control" type="file" id="formFile" name="material">
                </div>
            `;
            } else if (moduleType == 3) { // Video Material (YouTube Link)
                material.innerHTML = `
                <label for="input-material" class="col-md-2 col-form-label" >Video URL</label>
                <div class="col-md-10">
                    <input id="input-material" class="form-control" type="text" name="material" placeholder="https://..." value="{{ old('material') }}">
                </div>
            `;
            } else if (moduleType == 5) { // Assignment
                material.innerHTML = `
                <label for="formFile" class="col-md-2 col-form-label" >Assignment File</label>
                <div class="col-md-10">
                    <input class="form-control" type="file" id="formFile" name="material">
                </div>
            `;
            } else if (moduleType == 6) { // Quiz
                material.innerHTML = `
                <label for="quiz_content" class="col-md-2 col-form-label" >Select Quiz</label>
                <div class="col-md-10">
                    <select class="form-control select2" name="material" id="quiz_content" data-placeholder="Choose..." required>
                    @foreach ($quiz as $item)
                        <option value="{{ env('APP_URL_FRONTEND') . '/lms/survey/' . $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                    </select>
                </div>
                `;

                // Reinitialize select2 for dynamic fields
                $('#quiz_content').select2({
                    placeholder: "Choose...",
                });
            } else if (moduleType == 7) { // Evaluation Survey
                material.innerHTML = `
                <label for="eval_content" class="col-md-2 col-form-label" >Select Evaluation Survey</label>
                <div class="col-md-10">
                    <select class="form-control select2" name="material" id="eval_content" required>
                    @foreach ($eval as $item)
                        <option value="{{ env('APP_URL_FRONTEND') . '/lms/survey/' . $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                    </select>
                </div>
                `;

                // Reinitialize select2 for dynamic fields
                $('#eval_content').select2({
                    placeholder: "Choose...",
                });
            } else if (moduleType == 8) { // Material w/ Snippet Code
                material.innerHTML = `
                <label for="code-editor" class="col-md-2 col-form-label" >Code</label>
                <div class="col-md-10">
                    <textarea id="code-editor" name="material" class="form-control" rows="10">{{ old('material') }}</textarea>
                </div>
                `;

                const htmlTags = [
                    "div", "span", "p", "a", "h1", "h2", "ul", "li", "table", "tr", "th", "td", "footer",
                    "header",
                    "script", "link"
                ];

                // Initialize CodeMirror
                const editor = CodeMirror.fromTextArea(document.getElementById('code-editor'), {
                    lineNumbers: true,
                    mode: 'htmlmixed',
                    theme: 'dracula',
                    matchBrackets: true,
                    autoCloseTags: true,
                    lineWrapping: true,
                    scrollbarStyle: null,
                    autofocus: true,
                    extraKeys: {
                        "Ctrl-Space": "autocomplete",
                        "Ctrl-.": function(cm) {
                            const selectedText = cm.getSelection();
                            if (selectedText) {
                                suggestCode(selectedText, cm);
                            } else {
                                const cursor = cm.getCursor();
                                const currentLine = cm.getLine(cursor.line);
                                const prefix = currentLine.substring(0, cursor.ch);
                                const suffix = currentLine.substring(cursor.ch);
                                suggestCode(prefix, suffix, cm);
                            }
                        },
                    },
                    hintOptions: {
                        hint: function(editor) {
                            const cursor = editor.getCursor();
                            const token = editor.getTokenAt(cursor);

                            // Combine previous tokens if necessary
                            const currentLine = editor.getLine(cursor.line);
                            const currentText = currentLine.substring(0, cursor
                                .ch); // Text before the cursor
                            const lastAngleIndex = currentText.lastIndexOf('<');

                            if (lastAngleIndex === -1 || currentText.includes('>')) {
                                return null; // No open tag or tag already closed
                            }

                            // Extract text after the last "<"
                            const typedTag = currentText.slice(lastAngleIndex + 1).toLowerCase();

                            // Filter suggestions based on the typed text
                            const suggestions = htmlTags.filter(tag => tag.startsWith(typedTag));

                            // Return the filtered suggestions
                            return {
                                list: suggestions.map(tag => `${tag}`), // Suggest as full tags
                                from: CodeMirror.Pos(cursor.line, lastAngleIndex +
                                    1), // Start after "<"
                                to: CodeMirror.Pos(cursor.line, cursor.ch) // End at the cursor
                            };
                        }
                    }
                });

                editor.setSize("100%", "40vh");

                // Automatically show autocomplete after typing
                editor.on("inputRead", function(cm, change) {
                    if (change.text[0].match(/[\w@<]/)) {
                        CodeMirror.commands.autocomplete(cm);
                    }
                });
            } else {
                material.innerHTML = `
                <input type="hidden" id="material" name="material" value="">
                `;
            }
        }
    </script>
@endsection
