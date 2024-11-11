@extends('layout.main-v3')

@section('title', 'Tambah Modul Kursus')

@section('content')
    <!-- Awal Halaman Judul -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $course_detail->id]) }}">Modul Kursus</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Modul Kursus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Halaman Judul -->

    <!-- Awal Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Modul untuk Kursus: {{ $course_detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini digunakan untuk menambahkan modul baru ke dalam kursus. Lengkapi seluruh data dengan
                        informasi yang akurat untuk memastikan peserta mendapatkan pengalaman belajar yang maksimal.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Isi <b>Nama Modul</b> dengan judul modul yang sesuai.</li>
                        <li>Gunakan kolom <b>Hari/Prioritas</b> untuk menentukan urutan modul di dalam kursus.</li>
                        <li>Isi kolom <b>Deskripsi</b> dengan ringkasan isi modul, dan aktifkan status modul dengan
                            mencentang kotak <b>Status</b> agar dapat diakses peserta.</li>
                        <li>Klik tombol <b>Simpan Modul</b> untuk menambahkan modul ke dalam kursus.</li>
                    </ul>
                    </p>

                    <form id="addCourseModule" action="{{ route('postAddCourseModule', ['page_type' => $page_type]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Kursus</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="course_name"
                                    value="{{ $course_detail->name }}" disabled>
                                <input type="hidden" name="course_id" value="{{ $course_detail->id }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama Modul</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    placeholder="Masukkan Nama Modul Kursus" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Hari / Prioritas</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority"
                                    placeholder="Masukkan Urutan Prioritas" value="{{ old('priority') }}">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if ($page_type == 'company_profile')
                            <div class="mb-3 row">
                                <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                                <div class="col-md-10">
                                    <textarea id="elm1" name="content">{{ old('content') }}</textarea>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addCourseModule">Simpan Modul</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- akhir col -->
    </div> <!-- akhir row -->
@endsection

@section('script')

@endsection
