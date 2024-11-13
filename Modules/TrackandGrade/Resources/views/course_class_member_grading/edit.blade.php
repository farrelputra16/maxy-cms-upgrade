@extends('layout.main-v3')

@section('title', 'Penilaian Pengumpulan Tugas')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Penilaian Pengumpulan Tugas</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getGrade') }}">Daftar Pengumpulan</a></li>
                        <li class="breadcrumb-item active">Penilaian Pengumpulan</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Pengumpulan Tugas <small>[ID: {{ $data->id }}]</small></h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menilai tugas yang telah dikumpulkan oleh siswa. Pastikan bahwa
                        informasi yang Anda masukkan lengkap dan akurat agar memberikan pengalaman pembelajaran terbaik bagi
                        siswa.
                    </p>

                    <form action="{{ route('postEditGrade', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $data->class_id }}">

                        <div class="mb-3 row">
                            <label for="input-module-name" class="col-md-2 col-form-label">Nama Modul</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="module_name"
                                    value="{{ $data->module_name }}" id="input-module-name" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-student-name" class="col-md-2 col-form-label">Nama Siswa</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="student_name"
                                    value="{{ $data->user_name }}" id="input-student-name" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-submission" class="col-md-2 col-form-label">Tugas yang Dikirim</label>
                            <div class="col-md-10">
                                <a href="{{ asset($data->submission_url) }}" target="_blank"
                                    download="{{ $data->submitted_file }}">{{ $data->submitted_file }}</a>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-student-comment" class="col-md-2 col-form-label">Komentar Siswa</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="comment" class="form-control" readonly>{{ $data->comment }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-grade" class="col-md-2 col-form-label">Nilai <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="grade" value="{{ $data->grade }}"
                                    id="input-grade" placeholder="Masukkan nilai tugas (0-100)">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-tutor-comment" class="col-md-2 col-form-label">Komentar Tutor</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="tutor_comment" class="form-control" placeholder="Berikan feedback untuk siswa">{{ $data->tutor_comment }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan dan Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
@endsection
