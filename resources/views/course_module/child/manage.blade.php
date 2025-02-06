@extends('layout.main-v3')

@section('title', isset($childModule) ? 'Edit Course Child Module' : 'Add New Course Child Module')

@section('content')
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ isset($childModule) ? 'Edit Child Module' : 'Add New Child Module' }}
                </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('getCourse') }}">Course</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('getCourseModule', ['course_id' => $parent->course_id]) }}">Modules:
                                {{ $course_detail->name }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a
                                href="{{ route('getCourseSubModule', ['course_id' => $parent->course_id, 'module_id' => $parent->id]) }}">Child
                                Modules: {{ $parent->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ isset($childModule) ? 'Edit Child Module: ' . $childModule->name : 'Add New Child Module' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @if (isset($childModule))
                            Edit Child Module: {{ $parent->name }}
                        @else
                            Add New Child Module
                        @endif
                    </h4>
                    <p class="card-title-desc">
                        This page is used to
                        {{ isset($childModule) ? 'edit an existing child module data' : 'create a new child module' }}
                    </p>

                    <!-- Start Form -->
                    <form
                        action="{{ isset($childModule) ? route('postEditChildModule', ['id' => $childModule->id]) : route('postAddChildModule', ['parentId' => $parent->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <hr>
                        <strong class="text-secondary">GENERAL DATA</strong>

                        <div class="my-3 row">
                            <label for="input-parent-module" class="col-md-2 col-form-label">Parent Module</label>
                            <div class="col-md-10">
                                <input id="input-parent-module" class="form-control" type="text"
                                    value="{{ $parent->name }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">
                                Module Name <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input id="input-name" class="form-control" type="text" name="name"
                                    value="{{ old('name', isset($childModule) ? $childModule->name : '') }}"
                                    placeholder="Enter the name of the child module..." required>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-priority" class="col-md-2 col-form-label">
                                Order <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input id="input-priority" class="form-control" type="number" name="priority"
                                    value="{{ old('priority', isset($childModule) ? $childModule->priority : ($highestPriority ? $highestPriority->priority + 1 : 1)) }}"
                                    min="1" placeholder="Enter the recommended order of the module (1, 2, 3)"
                                    required
                                    @if ($errors->has('priority')) @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach @endif
                                    </div>
                            </div>
                        </div>

                        <!-- Start Material Section -->
                        <hr>
                        <strong class="text-secondary">MATERIAL</strong>

                        <div class="my-3 row">
                            <label for="input-type" class="col-md-2 col-form-label">
                                Module Type <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <select id="input-type" name="type" class="form-control select2"
                                    onchange="updateMaterialInput(this.value)" style="width: 100%;">
                                    @foreach ($type as $item)
                                        @if ($item->name != 'parent')
                                            <option value="{{ $item->id }}"
                                                {{ (isset($childModule) && $childModule->type == $item->id) || old('type') == $item->id ? 'selected' : '' }}>
                                                {{ $item->description }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if (isset($childModule))
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">
                                    Previous Material
                                </label>
                                <div id="previous-material" class="col-md-10">
                                    @if ($childModule->type_name == 'assignment' || $childModule->type_name == 'materi_pembelajaran')
                                        <a href="{{ asset('') }}"></a>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div id="material" class="mb-3 row">
                            <!-- Material Input Fields will be generated here via JavaScript -->
                        </div>

                        <div class="row mb-3">
                            <label for="input-duration" class="col-md-2 col-form-label">
                                Lesson Duration <span class="text-secondary"><small>(in minutes)</small></span>
                            </label>
                            <div class="col-md-10">
                                <input id="input-duration" class="form-control" type="number" name="duration"
                                    value="{{ old('duration', isset($childModule) ? $childModule->duration : '') }}"
                                    placeholder="Enter the estimate duration of the module (in minutes)">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="elm1" class="col-md-2 col-form-label">Module Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content" placeholder="Enter the content text of the module...">
                                    {{ old('content', isset($childModule) ? $childModule->content : '') }}
                                </textarea>
                            </div>
                        </div>

                        <hr>
                        <!-- End Material Section -->

                        <strong class="text-secondary">FOOTER DATA</strong>

                        <div class="my-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Admin Notes</label>
                            <div class="col-md-10">
                                <input id="input-description" class="form-control" type="text" name="description"
                                    placeholder="This note won't be shown to the students. Only admins or mentors can see it"
                                    value="{{ old('description', isset($childModule) ? $childModule->description : '') }}">
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="input-status">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="input-status" name="status"
                                    {{ old('status', isset($childModule) ? $childModule->status : false) ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to archive the data instead of publishing it"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn maxy-btn-secondary w-md text-center">
                                    {{ isset($childModule) ? 'Save' : 'Add New Course Child Module' }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div> <!-- End Col -->
    </div> <!-- End Row -->
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var typeSelector = document.getElementById('input-type');
            var material = document.getElementById('material');

            // Check Module Type on Page Load
            updateMaterialInput(typeSelector.value);

            // Module Type Selector Listener
            typeSelector.addEventListener('change', function() {
                updateMaterialInput(typeSelector.value);
            });
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
                            <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}">
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
                            <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}">
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
