@extends('layout.main-v3')

@section('title', 'Course')

@section('content')
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Start Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Course</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Course</h4>
                    <p class="card-title-desc">
                        This page shows the list of courses. Courses will be used as the <b>default template</b> of a class.
                        You can create a new course or edit the contents of an existing course. Within course, there will be
                        <b>parent course modules</b> which represents as the <b>meeting counts</b> or <b>days</b> inside the
                        course.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getCourseData') }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-long">Nama Mata Kuliah</th>
                                <th>Harga Promo</th>
                                <th>Harga</th>
                                <th>Jenis Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th class="data-long">Deskripsi Pratinjau</th>
                                <th class="data-long">Konten</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Waktu Dibuat</th>
                                <th>Dibuat Oleh</th>
                                <th>Waktu Diperbarui</th>
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
                                <th>Id</th>
                                <th class="">Nama Mata Kuliah</th>
                                <th>Harga Promo</th>
                                <th>Harga</th>
                                <th>Jenis Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th>Deskripsi Pratinjau</th>
                                <th>Konten</th>
                                <th>Catatan Admin</th>
                                <th>Waktu Dibuat</th>
                                <th>Dibuat Oleh</th>
                                <th>Waktu Diperbarui</th>
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
    <!-- end content -->

    <!-- start add course button -->
    @if (Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'course_create'))
        <div id="floating-whatsapp-button">
            <a href="{{ route('getAddCourse') }}">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    @endif
    <!-- end add course button -->
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
                data: "fake_price",
                name: "fake_price",
                orderable: true,
                searchable: true
            },
            {
                data: "price",
                name: "price",
                orderable: true,
                searchable: true
            },
            {
                data: "m_course_type_id",
                name: "m_course_type_id",
                orderable: true,
                searchable: true
            },
            {
                data: "credits",
                name: "credits",
                orderable: true,
                searchable: true
            },
            {
                data: "duration",
                name: "duration",
                orderable: true,
                searchable: true
            },
            {
                data: "short_description",
                name: "short_description",
                orderable: true,
                searchable: true
            },
            {
                data: "content",
                name: "content",
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
    <!-- Tambahkan skrip kustom di sini jika diperlukan -->
    @if (session('course_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Informasi!',
                    html: "<strong>{{ session('course_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif
@endsection
