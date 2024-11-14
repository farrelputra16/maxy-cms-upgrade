@extends('layout.main-v3')

@section('title', 'Tambah Presensi Kelas')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Presensi</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Presensi</a></li>
                        <li class="breadcrumb-item active">Tambah Presensi Baru</li>
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
                    <h4 class="card-title">Tambah Presensi Kelas Baru</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menambahkan data presensi baru. Pastikan semua informasi yang
                        Anda masukkan akurat agar dapat memberikan pengalaman pembelajaran yang terbaik bagi peserta mata kuliah.
                    </p>

                    <form id="addCCAttendance" action="{{ route('postAddCourseClassAttendance') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">

                        <!-- Nama Presensi -->
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Presensi</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama Presensi" value="{{ old('name') }}">
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
                                <select class="form-control select2" name="day" data-placeholder="Pilih Hari ..."
                                    id="type_selector">
                                    @foreach ($class->parent_modules as $item)
                                        <option value="{{ $item->id }}" {{ old('day') == $item->id ? 'selected' : '' }}>
                                            Hari {{ $item->priority }} : {{ $item->module_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Deskripsi Presensi -->
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" placeholder="Deskripsikan Presensi (opsional)">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <!-- Status Aktif -->
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" value="1"
                                    id="SwitchCheckSizemd" name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addCCAttendance">Tambahkan Presensi</button>
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
