@extends('layout.main-v3')

@section('title', 'Ubah Kehadiran Mahasiswa')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Kehadiran</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassAttendance', ['id' => $class->id]) }}">Presensi</a>
                        </li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getMemberAttendance', ['id' => $attendance->course_class_attendance_id, 'class_id' => $class->id]) }}">Presensi
                                Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Ubah Kehadiran Mahasiswa: {{ $attendance->user_name }}</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Mulai Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Ubah Kehadiran: {{ $attendance->user_name }}</h4>
                    <p class="card-title-desc">Silakan perbarui data kehadiran mahasiswa dengan memastikan semua
                        informasi yang dimasukkan benar dan akurat. Hal ini akan membantu dalam menciptakan pengalaman
                        belajar yang optimal bagi peserta.</p>

                    <form action="{{ route('postEditMemberAttendance') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                        <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                        <input type="hidden" name="class_attendance_id" value="{{ $class_attendance_id }}">

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Mahasiswa</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" placeholder="Masukkan Nama"
                                    value="{{ $attendance->user_name }}" id="name" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-status" class="col-md-2 col-form-label">Status Kehadiran</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="status" data-placeholder="Pilih Status">
                                    <option value="0" @if ($attendance->status == 0) selected @endif
                                        {{ old('status') == 0 ? 'selected' : '' }}>Tidak Hadir
                                    </option>
                                    <option value="1" @if ($attendance->status == 1) selected @endif
                                        {{ old('status') == 1 ? 'selected' : '' }}>Hadir</option>
                                    <option value="2" @if ($attendance->status == 2) selected @endif
                                        {{ old('status') == 2 ? 'selected' : '' }}>Izin</option>
                                </select>
                            </div>
                        </div>

                        @if ($attendance->feedback != null)
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Umpan Balik</label>
                                <div class="col-md-10">
                                    <div class="card w-100 h-100">
                                        <ul class="list-group list-group-flush">
                                            @foreach (json_decode($attendance->feedback) as $item)
                                                <li class="list-group-item">
                                                    <b>{{ $item->question }}</b>
                                                    <p>{{ $item->answer }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Umpan Balik</label>
                                <div class="col-md-10">
                                    <div class="card w-100 h-100">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Belum Ada Umpan Balik</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="content" name="description" placeholder="Tambahkan catatan jika diperlukan">{{ old('description', $class->description) }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="col-md-10 text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- akhir kolom -->
    </div> <!-- akhir baris -->
@endsection

@section('script')

@endsection
