@extends('layout.main-v3')

@section('title', 'Ubah Sub Modul Mata Kuliah')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ $course_type->slug == 'mbkm' ? route('getCourseMBKM') : route('getCourse') }}">{{ $course_type->slug == 'mbkm' ? 'MBKM' : 'Mata Kuliah' }}</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $parentModule->course_id, 'page_type' => 'LMS']) }}">Modul
                                {{ $course_type->slug == 'mbkm' ? 'MBKM' : 'Mata Kuliah' }}</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseSubModule', ['course_id' => $parentModule->course_id, 'module_id' => $parentModule->id, 'page_type' => 'LMS_child']) }}">Sub
                                Modul {{ $course_type->slug == 'mbkm' ? 'MBKM' : 'Mata Kuliah' }}</a></li>
                        <li class="breadcrumb-item active">Ubah Sub Modul: {{ $parentModule->name }}</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Ubah Sub Modul untuk: {{ $parentModule->name }}</small></h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk memperbarui informasi modul anak dalam mata kuliah.
                        Isi data dengan lengkap dan pastikan akurat untuk memberikan pengalaman belajar terbaik bagi
                        peserta.
                    </p>

                    <!-- Start Form -->
                    <form action="{{ route('postEditChildModule', ['id' => $childModule->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Modul Induk</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $parentModule->name }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Modul <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $childModule->name }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Prioritas <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="priority"
                                    value="{{ $childModule->priority }}" min="1">
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
                            <label for="input-type" class="col-md-2 col-form-label">Jenis Modul <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select name="type" class="form-control" id="type_selector">
                                    @foreach ($type as $item)
                                        @if ($item->name != 'parent')
                                            <option value="{{ $item->id }}"
                                                {{ $childModule->type == $item->id ? 'selected' : '' }}
                                                {{ old('type', $childModule->type) == $item->id ? 'selected' : '' }}>
                                                {{ $item->description }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="material" class="mb-3 row">
                            <!-- Generate Material Input Fields via JavaScript -->
                        </div>

                        <hr>
                        <!-- End Material -->

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">
                                    {{ $childModule->content ? $childModule->content : '' }}
                                </textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="description" placeholder="Contoh: Modul ini masih dalam tahap pengembangan." value="{{ old('description', $childModule->description) }}">
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ $childModule->status == 1 ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>

                        <!-- Start Save Button -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
                            </div>
                        </div>
                        <!-- End Save Button -->
                    </form>
                    <!-- end form -->

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var typeSelector = document.getElementById('type_selector');
            var material = document.getElementById('material');
            var duration = document.getElementById('duration');
            var contentDiv = document.getElementById('content');
            var quizContentDiv = document.getElementById('quiz-content');
            var evalContentDiv = document.getElementById('eval-content');

            // Check Module Type on Load Page
            updateMaterialInput(typeSelector.value);

            // Module Type Selector Listener
            typeSelector.addEventListener('change', function() {
                updateMaterialInput(typeSelector.value);
            });

            // Function for Updating Material Input Fields
            function updateMaterialInput(moduleType) {
                if (moduleType === '4') { // Assignment
                    material.innerHTML = `
                        <label for="" class="col-md-2 col-form-label" >File Materi Pembelajaran</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="formFile" name="material">
                        </div>
                        <input type="hidden" name="duration" value="">
                    `;
                } else if (moduleType === '3') { // Video Material (YouTube Link)
                    material.innerHTML = `
                        <label for="" class="col-md-2 col-form-label" >Link Video</label>
                        <div class="col-md-10 mb-3">
                            <input class="form-control" type="text" name="material">
                        </div>

                        <label for="" class="col-md-2 col-form-label" >Durasi</label>
                        <div class="col-md-10">
                            <input class="form-control" type="number" name="duration" value="{{ $childModule->duration }}">
                        </div>
                    `;
                } else if (moduleType === '5') { // File Material (pdf, ppt, etc)
                    material.innerHTML = `
                        <label for="" class="col-md-2 col-form-label" >File Penugasan</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="formFile" name="material">
                        </div>
                        <input type="hidden" name="duration" @if ($childModule->type == '5') value="{{ $childModule->material }}" @endif>
                    `;
                } else if (moduleType === '6') { // Quiz
                    material.innerHTML = `
                        <label for="" class="col-md-2 col-form-label" ></label>
                        <div class="col-md-10">
                            <select class="form-control select2" name="quiz_content" id="quiz_content" required>
                            @foreach ($quiz as $item)
                                <option value="{{ env('FRONTEND_APP_URL') . '/lms/survey/' . $item->id }}" @if ($item->id == $idQuiz) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="duration" value="">
                    `;
                } else if (moduleType === '7') { // Evaluation Survey
                    material.innerHTML = `
                        <label for="" class="col-md-2 col-form-label" >Eval</label>
                        <div class="col-md-10">
                            <select class="form-control select2" name="eval_content" id="eval_content" required>
                            @foreach ($eval as $item)
                                <option value="{{ env('FRONTEND_APP_URL') . '/lms/survey/' . $item->id }}" @if ($item->id == $idEval) selected @endif>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="duration" value="">
                    `;
                } else if (moduleType === '8') { // Material w/ Snippet Code
                    material.innerHTML = `
                        <label for="html" class="col-md-2 col-form-label" >Code</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="html" id="html">
                        </div>
                        <input type="hidden" name="duration" value="">
                    `;
                }
            }
        });
    </script>
@endsection
