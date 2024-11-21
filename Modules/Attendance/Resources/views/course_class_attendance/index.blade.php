@extends('layout.main-v3')

@section('title', 'Presensi Kelas')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Kehadiran</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Daftar Modul</a></li>
                        <li class="breadcrumb-item active">Presensi</li>
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
                    <h4 class="card-title">Presensi: {{ $class->course_name }} Batch {{ $class->batch }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memberikan informasi lengkap mengenai data kehadiran siswa dalam tabel yang dapat
                        disesuaikan. Gunakan fitur <b>kolom yang dapat disembunyikan, pengurutan, dan pencarian kolom</b>
                        untuk menyesuaikan tampilan dan menemukan informasi yang Anda butuhkan dengan cepat.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendance as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>{{ $item->day }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditCourseClassAttendance', ['id' => $item->id, 'class_id' => $class->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getMemberAttendance', ['id' => $item->id, 'class_id' => $class->id]) }}"
                                            class="btn btn-outline-primary rounded">Lihat Kehadiran Siswa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

    <!-- Tombol Tambah Presensi -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseClassAttendance', ['class_id' => $class->id]) }}" target="_blank"
            data-toggle="tooltip" title="Tambah Presensi">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Tombol Tambah Presensi Berakhir -->
@endsection

@section('script')
@endsection
