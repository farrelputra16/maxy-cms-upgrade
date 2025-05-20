@extends('layout.main-v3')

@section('title', 'Presensi Mahasiswa')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ikhtisar Data Presensi</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassAttendance', ['id' => $class->id]) }}">Presensi</a></li>
                        <li class="breadcrumb-item active">Presensi Mahasiswa</li>
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
                    <h4 class="card-title">Presensi {{ $class->course_name }} Batch {{ $class->batch }}</h4>
                    <p class="card-title-desc">
                        Di halaman ini, Anda dapat melihat dan mengelola data presensi seluruh mahasiswa. Setiap baris
                        menampilkan data penting seperti nama mahasiswa, status kehadiran, dan deskripsi. Anda dapat
                        menggunakan fitur <b>tampilan kolom, pengurutan, dan pencarian</b> untuk menyesuaikan tampilan
                        sesuai kebutuhan.
                    </p>
                    <input type="text" id="classSelect" value="{{ $class->id }}" hidden>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getMemberAttendanceData') }}"
                        data-no-status="true"
                        data-colvis="[1, -3, -4, -5, -6]"
                        data-id="{{ $class_attendance_id }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Feedback</th>
                                <th class="data-long">Admin Note</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>ID Pembaru</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Feedback</th>
                                <th class="data-long">Admin Note</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>ID Pembaru</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

@endsection

@section('script')
<script>
    const columns = [
            { 
                data: 'DT_RowIndex', 
                name: 'DT_RowIndex', 
                orderable: false, 
                searchable: false 
            },
            { data: 'id', name: 'id' },
            { data: 'user_name', name: 'user_name' },
            { data: 'feedback', name: 'feedback' },
            { data: 'description', name: 'ma.description' },
            { data: 'created_at', name: 'created_at' },
            { data: 'created_id', name: 'created_id' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'updated_id', name: 'updated_id' },
            { data: 'status', name: 'status' },
            { 
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false 
            }
        ]
</script>
@endsection
