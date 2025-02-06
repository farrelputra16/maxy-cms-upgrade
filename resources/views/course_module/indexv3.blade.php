@extends('layout.main-v3')

@section('title', 'Modul Mata Kuliah')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ikhtisar Data</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        @if ($bcMBKM == true)
                            <li class="breadcrumb-item"><a href="{{ route('getCourseMBKM') }}">MBKM</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Mata Kuliah</a></li>
                        @endif
                        <li class="breadcrumb-item active">Daftar Modul: {{ $course_detail->name }}</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modul Utama untuk Mata Kuliah: {{ $course_detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar modul utama dari mata kuliah yang telah dipilih, termasuk informasi
                        detail seperti nama modul, hari pelaksanaan, konten, catatan admin, dan status aktif. Anda dapat
                        mengelola modul dengan mudah melalui fitur tabel interaktif yang menyediakan
                        <b>pencarian, pengurutan, dan visibilitas kolom</b>.
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getCourseModuleData') }}"
                        data-colvis="[1, -3, -4, -5, -6]" data-id="{{ $course_detail->id }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diubah Pada</th>
                                <th>ID Pengubah</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Modul</th>
                                <th>Hari</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diubah Pada</th>
                                <th>ID Pengubah</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseModule', ['id' => $course_detail->id]) }}"
            data-toggle="tooltip" title="Add New Parent Module">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <script>
        const columns = [{
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false
            },
            {
                data: "id",
                name: "id"
            },
            {
                data: "name",
                name: "name",
                orderable: true,
                searchable: true
            },
            {
                data: "priority",
                name: "priority",
                orderable: true,
                searchable: true
            },
            {
                data: "description",
                name: "description",
                orderable: true,
                searchable: true
            },
            {
                data: "created_at",
                name: "created_at"
            },
            {
                data: "created_id",
                name: "created_id"
            },
            {
                data: "updated_at",
                name: "updated_at"
            },
            {
                data: "updated_id",
                name: "updated_id"
            },
            {
                data: "status",
                name: "status",
                orderable: true,
                searchable: true
            },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ];
    </script>

    @if (session('parent_module_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Informasi!',
                    html: "<strong>{{ session('parent_module_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif
@endsection
