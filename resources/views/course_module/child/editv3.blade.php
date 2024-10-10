@extends('layout.main-v3')

@section('title', 'Edit Child Course')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Course</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseModule') }}">Course Module</a></li>
                        <li class="breadcrumb-item active">Edit Child Module For: {{ $parentModule->name }}</li>
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

                    <h4 class="card-title">Edit Child Module For: {{ $parentModule->name }}</small></h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditChildModule', ['id' => $childModule->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Parent Module</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $parentModule->name }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $childModule->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Priority</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="priority"
                                    value="{{ $childModule->priority }}">
                            </div>
                        </div>
                        @if ($course_type->slug == 'rapid-onboarding')
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">HTML</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="html">{{ $childModule->html }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">JS</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="js">{{ $childModule->js }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">Content</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="content">{{ $childModule->content }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="rapid" value="1">
                        @else
                            <div class="card m-5 p-5" style="border-radius: 25px; border: 1px solid #b0bad8;">
                                <h3>Current:</h3>
                                @if ($childModule->type == 'materi_pembelajaran')
                                    Materi Pembelajaran
                                    <a href="{{ asset('fe/public/files/' . $childModule->material) }}"
                                        download>{{ $childModule->material }}</a>
                                @elseif($childModule->type == 'video_pembelajaran')
                                    Video Pembelajaran
                                    <a href="{{ $childModule->material }}">{{ $childModule->material }}</a>
                                @elseif($childModule->type == 'assignment')
                                    <a href="{{ asset('fe/public/files/' . $childModule->material) }}"
                                        download>{{ $childModule->material }}</a>
                                    Assignment
                                @endif

                                <h3 style="margin-top: 4%">Change To:</h3>
                                <!-- TO DO -->
                                <div class="mb-3">
                                    <label for="input-tag">Module Type</label>
                                    <select name="type" class="form-control" id="type_selector">
                                        <option value="materi_pembelajaran"
                                            @if ($childModule->type == 'materi_pembelajaran') selected @endif>materi_pembelajaran</option>
                                        <option value="video_pembelajaran"
                                            @if ($childModule->type == 'video_pembelajaran') selected @endif>video_pembelajaran</option>
                                        <option value="assignment" @if ($childModule->type == 'assignment') selected @endif>
                                            Assignment
                                        </option>
                                        @if (Route::has('getCMQuiz'))
                                            {{-- <option value="quiz" @if ($childModule->type == 'quiz') selected @endif>Quiz
                                            </option> --}}
                                        @endif
                                    </select>
                                    <div class="" id="material">
                                        @if ($childModule->type === 'materi_pembelajaran')
                                            <div class="mb-3 row">
                                                <label for="input-name" class="col-md-2 col-form-label" style="margin-top: 1%">File
                                                    materi_pembelajaran</label>
                                                <div class="col-md-10">
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="material">
                                                    <p class="pt-2">{{ $childModule->material }}</p>
                                                    <input class="form-control" type="hidden" name="duration" value="">
                                                </div>
                                            </div>
                                        @elseif ($childModule->type === 'video_pembelajaran')
                                            <label for="" class="form-label" style="margin-top: 1%">Link
                                                Video</label>
                                            <input class="form-control" type="text" name="material">
                                            <label for="" class="form-label" style="margin-top: 1%">Durasi
                                                Video</label>
                                            <input class="form-control" type="number" name="duration" value="{{ $childModule->duration }}">
                                        @else
                                            <label for="" class="form-label" style="margin-top: 1%">File
                                                Assignment</label>
                                            <input class="form-control" type="file" id="formFile" name="material">
                                            <input type="hidden" name="duration"
                                                @if ($childModule->type == 'asignment') value="{{ $childModule->material }}" @endif>
                                            <input type="hidden" name="duration" value="">
                                        @endif
                                    </div>
                                </div>
                        @endif
                </div>
                <div class="mb-3 row">
                    <label for="input-content" class="col-md-2 col-form-label">Content</label>
                    <div class="col-md-10">
                        <textarea id="elm1" name="content">{{ $childModule->content }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="input-content" class="col-md-2 col-form-label">Description</label>
                    <div class="col-md-10">
                        <textarea id="elm1" name="description">{{ $childModule->description }}</textarea>
                    </div>
                </div>
                <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                    <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                    <div class="col-md-10 d-flex align-items-center">
                        <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd" name="status">
                        <label class="m-0">Aktif</label>
                    </div>
                </div>
                <div class="mb-3 row justify-content-end">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary w-md text-center">Save & Update</button>
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

    @if ($course_type->slug != 'rapid-onboarding')
        <script>
            var typeSelector = document.getElementById('type_selector');
            var material = document.getElementById('material');
            var duration = document.getElementById('duration');

            // Menambahkan event listener untuk perubahan pada elemen select
            typeSelector.addEventListener('change', function() {
                console.log(typeSelector.value)
                // Memeriksa apakah opsi yang dipilih adalah "assignment"
                if (typeSelector.value === 'materi_pembelajaran') {
                    material.innerHTML = `
                <label for="" class="form-label" style="margin-top: 1%">File Materi Pembelajaran</label>
                <input class="form-control" type="file" id="formFile" name="material">
                <input type="hidden" name="duration" @if ($childModule->type == 'materi_pembelajaran') value="{{ $childModule->material }}" @endif>
            `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                } else if (typeSelector.value === 'video_pembelajaran') {
                    material.innerHTML = `
                 <label for="" class="form-label" style="margin-top: 1%">Link
                    Video</label>
                <input class="form-control" type="text" name="material">
                <label for="" class="form-label" style="margin-top: 1%">Durasi
                    Video</label>
                <input class="form-control" type="number" name="duration" value="{{ $childModule->duration }}">
            `;
                    duration.innerHTML = `
                <label for="" class="form-label" style="margin-top: 1%">Durasi Video</label>
                <input type="number" name="duration" value="{{ $childModule->duration }}">
            `;
                } else if (typeSelector.value === 'assignment') {
                    material.innerHTML = `
                <label for="" class="form-label" style="margin-top: 1%">File Assignment</label>
                <input class="form-control" type="file" id="formFile" name="material">
                <input type="hidden" name="duration" @if ($childModule->type == 'asignment') value="{{ $childModule->material }}" @endif>
            `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                }
            });
        </script>
    @endif
@endsection
