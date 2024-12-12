@extends('layout.main-v3')

@section('title', 'Ubah Penilaian')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item active">Ubah Penilaian Kelas:
                            {{ $classes[0]->CourseClass->course->name }} {{ $classes[0]->CourseClass->batch }}</li>
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

                    <h4 class="card-title">{{ $classes[0]->CourseClass->slug }} <small>[ ID: {{ $id }} ]</small>
                    </h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk memperbarui informasi penilaian dari kelas yang dipilih.
                        Pastikan semua data yang dimasukkan akurat agar pengalaman belajar peserta tetap optimal.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Isi kolom <strong>Kehadiran</strong> dengan persentase kehadiran peserta di kelas.</li>
                        <li>Isi kolom <strong>Nilai Modul</strong> sesuai dengan nilai masing-masing modul.</li>
                        <li>Setelah semua detail selesai diisi, klik tombol <strong>'Simpan & Perbarui'</strong> untuk
                            memperbarui data penilaian.</li>
                    </ul>
                    </p>

                    <form id="addCourseClassScoring" action="{{ route('postCourseClassScoring', ['id' => $id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Kehadiran</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="attendance"
                                    value="{{ $classes[0]->CourseClass->percentage }}" id="input-title">
                            </div>
                        </div>

                        @foreach ($classes as $item)
                            <div class="mb-3 row">
                                <label for="input-member"
                                    class="col-md-2 col-form-label">{{ $item->CourseModule->name }}</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" name="{{ $item->id }}"
                                        value="{{ $item->percentage }}" id="input-member">
                                </div>
                            </div>
                        @endforeach

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn custom-btn-submit btn-primary w-md text-center"
                                    form="addCourseClassScoring">Simpan & Perbarui</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script></script>
@endsection
