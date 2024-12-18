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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item active">Presensi: {{ $class->course_name }} {{ $class->batch }}</li>
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

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getCourseClassAttendanceData') }}"
                        data-colvis="[1, -3, -4, -5, -6]"
                        data-id="{{ $class->id }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama Presensi</th>
                                <th>Hari</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari</th>
                                <th class="data-long">Catatan Admin</th>
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
        <a href="{{ route('getAddCourseClassAttendance', ['class_id' => $class->id]) }}"
            data-toggle="tooltip" title="Tambah Presensi">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Tombol Tambah Presensi Berakhir -->
@endsection

@section('script')
<script>
    const columns = [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'day', name: 'day' },
            { data: 'description', name: 'description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'created_id', name: 'created_id' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'updated_id', name: 'updated_id' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
</script>
@endsection
