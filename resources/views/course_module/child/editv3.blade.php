@extends('layout.main-v3')

@section('title', 'Ubah Modul Child Mata Kuliah')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Mata Kuliah</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $parentModule->course_id, 'page_type' => 'LMS']) }}">Course
                                Module</a></li>
                        <li class="breadcrumb-item active">Ubah Modul Child: {{ $parentModule->name }}</li>
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

                    <h4 class="card-title">Ubah Modul Child untuk: {{ $parentModule->name }}</small></h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk memperbarui informasi modul anak dalam mata kuliah.
                        Isi data dengan lengkap dan pastikan akurat untuk memberikan pengalaman belajar terbaik bagi
                        peserta.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Isi <b>Nama Modul</b> dengan judul yang sesuai.</li>
                        <li>Atur <b>Prioritas</b> untuk menentukan urutan tampil modul dalam mata kuliah.</li>
                        <li>Pilih <b>Jenis Modul</b> dan isi konten tambahan yang diperlukan.</li>
                        <li>Tambahkan deskripsi yang menjelaskan isi dari modul ini.</li>
                        <li>Klik <b>Simpan & Perbarui</b> untuk menyimpan perubahan.</li>
                    </ul>
                    </p>

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
                                <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="content">{{ $childModule->content }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="rapid" value="1">
                        @else
                            <div class="card m-5 p-5" style="border-radius: 25px; border: 1px solid #b0bad8;">
                                <!-- TO DO -->
                                <div class="mb-3">
                                    <label for="input-tag">Tipe Modul</label>
                                    <select name="type" class="form-control" id="type_selector">
                                        <option value="materi_pembelajaran"
                                            @if ($childModule->type == 'materi_pembelajaran') selected @endif>materi_pembelajaran</option>
                                        <option value="video_pembelajaran"
                                            @if ($childModule->type == 'video_pembelajaran') selected @endif>video_pembelajaran</option>
                                        <option value="assignment" @if ($childModule->type == 'assignment') selected @endif>
                                            Tugas</option>
                                        <option value="quiz" @if ($childModule->type == 'quiz') selected @endif>Kuis
                                        </option>
                                        <option value="eval" @if ($childModule->type == 'eval') selected @endif>Evaluasi
                                        </option>
                                    </select>
                                    <div class="" id="material">
                                        @if ($childModule->type === 'materi_pembelajaran')
                                            <label for="input-name" class="col-md-2 col-form-label"
                                                style="margin-top: 1%">File Saat Ini Materi Pembelajaran</label>
                                            <div class="col-md-10">
                                                <p class="pt-2">{{ $childModule->material }}</p>
                                                <label for="input-name" class="col-md-2 col-form-label">Ganti File</label>
                                                <input class="form-control" type="file" id="formFile" name="material">
                                                <input class="form-control" type="hidden" name="duration" value="">
                                            </div>
                                        @elseif ($childModule->type === 'video_pembelajaran')
                                            <label for="" class="form-label" style="margin-top: 1%">Link
                                                Video</label>
                                            <input class="form-control" type="text" name="material"
                                                value="{{ $childModule->material }}">
                                            <label for="" class="form-label" style="margin-top: 1%">Durasi
                                                Video</label>
                                            <input class="form-control" type="number" name="duration"
                                                value="{{ $childModule->duration }}">
                                        @elseif($childModule->type === 'assignment')
                                            <label for="input-name" class="col-md-2 col-form-label"
                                                style="margin-top: 1%">File Penugasan Saat Ini</label>
                                            <p class="pt-2">{{ $childModule->material }}</p>
                                            <label for="" class="form-label" style="margin-top: 1%"> Ganti File Penugasan</label>
                                            <input class="form-control" type="file" id="formFile" name="material">
                                            <input type="hidden" name="duration"
                                                @if ($childModule->type == 'asignment') value="{{ $childModule->material }}" @endif>
                                            <input type="hidden" name="duration" value="">
                                        @elseif($childModule->type === 'quiz')
                                            <label for="" class="form-label" style="margin-top: 1%"></label>
                                            <select class="form-control select2" name="quiz_content" id="quiz_content"
                                                required>
                                                @foreach ($quiz as $item)
                                                    <option
                                                        value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}"
                                                        @if ($item->id == $idQuiz) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        @elseif($childModule->type === 'eval')
                                            <label for="" class="form-label" style="margin-top: 1%"></label>
                                            <select class="form-control select2" name="eval_content" id="eval_content"
                                                required>
                                                @foreach ($eval as $item)
                                                    <option
                                                        value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}"
                                                        @if ($item->id == $idEval) selected @endif>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                        @endif
                </div>
                <div id="content">
                    <div class="mb-3 row" id="">
                        <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                        <div class="col-md-10">
                            <textarea id="elm1" name="content">
                                @if ($childModule->type != 'quiz' && $childModule->type != 'eval'){{ $childModule->content }}@endif
                            </textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                    <div class="col-md-10">
                        <textarea id="elm1" name="description">{{ $childModule->description }}</textarea>
                    </div>
                </div>
                {{-- <div id="quiz-content">
                    <div class="mb-3 row">
                        <label for="input-content" class="col-md-2 col-form-label">Konten Quiz</label>
                        <div class="col-md-10">
                            <select class="form-control select2" name="quiz_content" id="">
                                @foreach ($quiz as $item)
                                    <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}" @if ($item->id == $idQuiz) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div id="eval-content">
                    <div class="mb-3 row">
                        <label for="input-content" class="col-md-2 col-form-label">Konten Evaluasi</label>
                        <div class="col-md-10">
                            <select class="form-control select2" name="eval_content" id="">
                                @foreach ($eval as $item)
                                    <option value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}" @if ($item->id == $idEval) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                    <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                    <div class="col-md-10 d-flex align-items-center">
                        <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd" name="status"
                            {{ $childModule->status == 1 ? 'checked' : '' }}>
                        <label class="m-0">Aktif</label>
                    </div>
                </div>
                <div class="mb-3 row justify-content-end">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
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
            var contentDiv = document.getElementById('content');
            var quizContentDiv = document.getElementById('quiz-content');
            var evalContentDiv = document.getElementById('eval-content');

            if (typeSelector.value === 'quiz' || typeSelector.value === 'eval') {
                contentDiv.style.display = 'none';
            } else {
                contentDiv.style.display = 'block';
            }
            // Menambahkan event listener untuk perubahan pada elemen select
            typeSelector.addEventListener('change', function() {
                console.log(typeSelector.value)

                if (typeSelector.value === 'quiz' || typeSelector.value === 'eval') {
                contentDiv.style.display = 'none';
                } else {
                    contentDiv.style.display = 'block';
                }

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
                <label for="" class="form-label" style="margin-top: 1%">File Penugasan</label>
                <input class="form-control" type="file" id="formFile" name="material">
                <input type="hidden" name="duration" @if ($childModule->type == 'asignment') value="{{ $childModule->material }}" @endif>
            `;
                } else if (typeSelector.value === 'quiz') {
                    material.innerHTML = `
                    <label for="" class="form-label" style="margin-top: 1%"></label>
                    <select class="form-control select2" name="quiz_content" id="quiz_content"
                        required>
                        @foreach ($quiz as $item)
                            <option
                                value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}"
                                @if ($item->id == $idQuiz) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                } else if (typeSelector.value === 'eval') {
                    material.innerHTML = `
                    <label for="" class="form-label" style="margin-top: 1%"></label>
                    <select class="form-control select2" name="eval_content" id="eval_content"
                        required>
                        @foreach ($eval as $item)
                            <option
                                value="{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}"
                                @if ($item->id == $idEval) selected @endif>
                                {{ $item->name }}</option>
                        @endforeach
                    </select>
                    `;
                    duration.innerHTML = `<input type="hidden" name="duration" value="">`;
                }
            });
        </script>
    @endif
@endsection
