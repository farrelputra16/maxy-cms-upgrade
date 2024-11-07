@extends('layout.main-v3')

@section('title', 'Add Child Module')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Course</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $parent->course_id, 'page_type' => 'LMS']) }}">Course
                                Module</a></li>
                        <li class="breadcrumb-item active">Add New Child Module</li>
                    </ol>

                    {{-- @php
                        dd($parent);
                    @endphp --}}
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add New Child Module</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postAddChildModule', ['parentId' => $parent->id, 'page_type' => $page_type]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Parent Module</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $parent->name }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name""
                                    placeholder="Masukkan Nama Course Module">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Priority</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if ($course_type->slug == 'rapid-onboarding')
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">HTML</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="html"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">JS</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="js"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">Content</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="content"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="rapid" value="1">
                        @else
                            <div class="mb-3 row">
                                <label for="input-tag" class="col-md-2 col-form-label">Module Type</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="type" id="type_selector" required>
                                        <option value="" disabled selected>Choose Module Type</option>
                                        <option value="materi_pembelajaran">Materi Pembelajaran</option>
                                        <option value="video_pembelajaran">Video Pembelajaran</option>
                                        <option value="assignment">Assignment</option>
                                        <option value="quiz">Quiz</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        @foreach ($errors->get('type') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="field" id="material"></div>
                            <div class="field" id="duration"></div>
                            {{-- <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"" placeholder="Masukkan Nama Course Module">
                            </div>
                        </div> --}}
                        @endif
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status">
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Add Child Module</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content');
    </script>

    @if ($course_type->slug != 'rapid-onboarding')
        <script>
            var typeSelector = document.getElementById('type_selector');
            var material = document.getElementById('material');
            var duration = document.getElementById('duration');
            var quizContentDiv = document.getElementById('quiz-content');

            // Menambahkan event listener untuk perubahan pada elemen select
            typeSelector.addEventListener('change', function() {
                // Memeriksa apakah opsi yang dipilih adalah "assignment"
                if (typeSelector.value === 'materi_pembelajaran') {

                    material.innerHTML = `
                <div class="mb-3 row">
                    <label for="input-title" class="col-md-2 col-form-label">File Materi Pembelajaran</label>
                    <div class="col-md-10">
                        <input class="form-control" type="file" id="formFile" name="material">
                    </div>
                </div>
            `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                } else if (typeSelector.value === 'video_pembelajaran') {

                    material.innerHTML = `
                <div class="mb-3 row">
                    <label for="input-title" class="col-md-2 col-form-label">Link Video</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="material"" placeholder="Masukkan Link Video">
                    </div>
                </div>
            `;
                    duration.innerHTML = `
                <div class="mb-3 row">
                    <label for="input-title" class="col-md-2 col-form-label">Durasi Video</label>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="duration"" placeholder="00:00">
                    </div>
                </div>
            `;
                } else if (typeSelector.value === 'assignment') {

                    material.innerHTML = `
                <div class="mb-3 row">
                    <label for="input-title" class="col-md-2 col-form-label">File Assignment</label>
                    <div class="col-md-10">
                        <input class="form-control" type="file" id="formFile" name="material">
                    </div>
                </div>
            `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                } else if (typeSelector.value === 'quiz') {
                    material.innerHTML = `
                <div class="mb-3 row" id="quiz-content">
                    <label for="quiz_content" class="col-md-2 col-form-label">Quiz</label>
                    <div class="col-md-10">
                        <select class="form-control select2" name="quiz_content" id="quiz_content" required>
                            @foreach ($quiz as $item)
                            <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                `;
                    // Inisialisasi Select2
                    $(document).ready(function() {
                        $('#quiz_content')
                            .select2(); // Reinitialize select2 on dynamically added select element
                    });
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                }
            });
        </script>
    @endif

@endsection
