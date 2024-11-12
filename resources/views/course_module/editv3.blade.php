@extends('layout.main-v3')

@section('title', 'Edit Modul Kursus')

@section('content')
    <!-- Awal Halaman Judul -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $module_detail->course_id]) }}">Modul
                                Kursus</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Modul: {{ $module_detail->name }}</li>
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
                    <h4 class="card-title">{{ $module_detail->name }} <small>[ ID: {{ $module_detail->id }} ]</small></h4>
                    <p class="card-title-desc">
                        Halaman ini digunakan untuk mengedit modul kursus yang ada. Silakan ubah data dengan informasi
                        terbaru yang akurat untuk memberikan pengalaman belajar yang optimal kepada peserta kursus.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Isi kolom <b>Nama Modul</b> dengan judul yang mencerminkan isi modul.</li>
                        <li>Tentukan <b>Hari/Prioritas</b> untuk mengatur urutan tampilan modul di dalam kursus.</li>
                        <li>Berikan ringkasan dalam <b>Deskripsi</b> untuk menjelaskan materi yang akan dibahas di modul
                            ini.</li>
                        <li>Centang kotak <b>Status</b> agar modul ini aktif dan dapat diakses peserta kursus.</li>
                        <li>Klik <b>Simpan & Perbarui</b> untuk menyimpan perubahan.</li>
                    </ul>
                    </p>

                    <form
                        action="{{ route('postEditCourseModule', ['id' => $module_detail->id, 'page_type' => $page_type, 'course_id' => $module_detail->course_id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Modul</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $module_detail->name) }}" id="name"
                                    placeholder="Masukkan Nama Modul">
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
                                    value="{{ old('priority', $module_detail->priority) }}"
                                    placeholder="Masukkan Urutan Prioritas" min="1">
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" placeholder="Masukkan Deskripsi Modul">{{ old('description', $module_detail->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($module_detail) ? $module_detail->status : false) ? 'checked' : '' }}>
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
        </div> <!-- akhir col -->
    </div> <!-- akhir row -->
@endsection

@section('script')

@endsection
