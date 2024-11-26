@extends('layout.main-v3')

@section('title', 'Ubah Presensi Kelas')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data Presensi</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Presensi</a></li>
                        <li class="breadcrumb-item active">Ubah Presensi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah Presensi: {{ $attendance->name }}</h4>
                    <p class="card-title-desc">
                        Silakan perbarui data presensi pada form di bawah ini. Pastikan data yang Anda masukkan benar dan
                        sesuai untuk mendukung pengalaman belajar yang optimal bagi para peserta.
                    </p>

                    <form action="{{ route('postEditCourseClassAttendance') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                        <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">

                        <!-- Nama Presensi -->
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Presensi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama Presensi" value="{{ old('name', $attendance->name) }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Pilih Hari Modul -->
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Hari</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="day" data-placeholder="Pilih Hari Modul ...">
                                    @foreach ($class->parent_modules as $item)
                                        <option value="{{ $item->id }}" {{ old('day') == $item->id ? 'selected' : '' }}
                                            @if ($item->id == $attendance->course_class_module_id) selected @endif> Hari {{ $item->priority }} :
                                            {{ $item->module_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Deskripsi Presensi -->
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="description" placeholder="Deskripsikan presensi atau aktivitas kelas (opsional)">{{ old('description', $attendance->description) }}</textarea>
                            </div>
                        </div>

                        <!-- Status Aktif -->
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($attendance) ? $attendance->status : false) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan Perubahan</button>
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
