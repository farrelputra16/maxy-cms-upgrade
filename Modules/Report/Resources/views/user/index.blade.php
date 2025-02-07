@extends('layout.main-v3')

@section('title', 'User Report')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Breadcrumb Mulai -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Reports</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
                <!-- Breadcrumb Selesai -->
            </div>
        </div>
    </div>
    <!-- Judul Halaman Selesai -->

    <!-- Mulai Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">User Report</h4>
                    <p class="card-title-desc">
                        This page is used to view and create user reports. You can view all user's information and export
                        their resumes using the buttons available below. You can also use the filtering options to group
                        your reports.
                    </p>

                    <form action="{{ route('report.user.saveReportFilterToSession') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Name Filter -->
                        <div class="mb-3 row">
                            <label for="filter-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input type="text" id="filter-name" class="form-control" name="filter_name" placeholder="Enter name (partial match allowed)">
                            </div>
                        </div>
                        
                        <!-- Registered Date -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Registered Date</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <div class="input-group" id="datepicker-start-register">
                                    <input type="text" class="form-control" name="start_registered" placeholder="dd M, yyyy" 
                                        data-date-format="dd M, yyyy" data-date-container="#datepicker-start-register"
                                        data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->

                                <strong class="mx-4">TO</strong>

                                <div class="input-group" id="datepicker-end-register">
                                    <input type="text" class="form-control" name="end_registered" placeholder="dd M, yyyy" 
                                        data-date-format="dd M, yyyy" data-date-container="#datepicker-end-register"
                                        data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>

                        <!-- Last Update -->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label">Last Update</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <div class="input-group" id="datepicker-start-last-update">
                                    <input type="text" class="form-control" name="start_last_update" placeholder="dd M, yyyy" 
                                        data-date-format="dd M, yyyy" data-date-container="#datepicker-start-last-update"
                                        data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->

                                <strong class="mx-4">TO</strong>

                                <div class="input-group" id="datepicker-end-last-update">
                                    <input type="text" class="form-control" name="end_last_update" placeholder="dd M, yyyy" 
                                        data-date-format="dd M, yyyy" data-date-container="#datepicker-end-last-update"
                                        data-provide="datepicker" data-date-autoclose="true">
                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-center">
                                <button type="submit" class="btn maxy-btn-secondary w-md text-center">Create Report</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- start DataTables -->
    @if(session('filtered') == 1)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <label>
                            <input type="checkbox" id="encryptResumeCheckbox"> Encrypt Resume
                        </label>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                            data-server-processing="true" data-url="{{ route('report.user.getData') }}"
                            data-colvis="[1, -3, -4, -5, -6]">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Grup Akses</th>
                                    <th>Catatan Admin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Universitas</th>
                                    <th>Jurusan</th>
                                    <th>Semester</th>
                                    <th>Kota</th>
                                    <th>Negara</th>
                                    <th>Level</th>
                                    <th>Nama Pembimbing</th>
                                    <th>Email Pembimbing</th>
                                    <th>IPK</th>
                                    <th>Agama</th>
                                    <th>Hobi</th>
                                    <th>Status Kewarganegaraan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Diperbarui Pada</th>
                                    <th>Diperbarui Oleh</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Grup Akses</th>
                                    <th>Catatan Admin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Universitas</th>
                                    <th>Jurusan</th>
                                    <th>Semester</th>
                                    <th>Kota</th>
                                    <th>Negara</th>
                                    <th>Level</th>
                                    <th>Nama Pembimbing</th>
                                    <th>Email Pembimbing</th>
                                    <th>IPK</th>
                                    <th>Agama</th>
                                    <th>Hobi</th>
                                    <th>Status Kewarganegaraan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Diperbarui Pada</th>
                                    <th>Diperbarui Oleh</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- end DataTables -->


    <script>
        // Pass Laravel routes and CSRF token to external JS
        window.exportCsvRoute = "{{ route('report.user.postExportCsv') }}";
        window.exportPdfRoute = "{{ route('report.user.postExportPdf') }}";
        window.exportCVPdfRoute = "{{ route('report.user.postExportCVPdf') }}";
        window.csrfToken = "{{ csrf_token() }}";
    </script>

@endsection

@section('script')

    <script>
        $(document).ready(function () {
            $("form").on("submit", function () {
                window.location.reload();
            });
        });
    </script>

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
                data: "email",
                name: "email",
                orderable: true,
                searchable: true
            },
            {
                data: "accessgroup",
                name: "accessgroup",
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
                data: "date_of_birth",
                name: "date_of_birth",
                orderable: true,
                searchable: true
            },
            {
                data: "phone",
                name: "phone",
                orderable: true,
                searchable: true
            },
            {
                data: "address",
                name: "address",
                orderable: true,
                searchable: true
            },
            {
                data: "university",
                name: "university",
                orderable: true,
                searchable: true
            },
            {
                data: "major",
                name: "major",
                orderable: true,
                searchable: true
            },
            {
                data: "semester",
                name: "semester",
                orderable: true,
                searchable: true
            },
            {
                data: "city",
                name: "city",
                orderable: true,
                searchable: true
            },
            {
                data: "country",
                name: "country",
                orderable: true,
                searchable: true
            },
            {
                data: "level",
                name: "level",
                orderable: true,
                searchable: true
            },
            {
                data: "supervisor_name",
                name: "supervisor_name",
                orderable: true,
                searchable: true
            },
            {
                data: "supervisor_email",
                name: "supervisor_email",
                orderable: true,
                searchable: true
            },
            {
                data: "ipk",
                name: "ipk",
                orderable: true,
                searchable: true
            },
            {
                data: "religion",
                name: "religion",
                orderable: true,
                searchable: true
            },
            {
                data: "hobby",
                name: "hobby",
                orderable: true,
                searchable: true
            },
            {
                data: "citizenship_status",
                name: "citizenship_status",
                orderable: true,
                searchable: true
            },
            {
                data: "created_at",
                name: "created_at",
                orderable: true,
                searchable: false
            },
            {
                data: "created_id",
                name: "created_id",
                orderable: false,
                searchable: false
            },
            {
                data: "updated_at",
                name: "updated_at",
                orderable: true,
                searchable: false
            },
            {
                data: "updated_id",
                name: "updated_id",
                orderable: false,
                searchable: false
            },
            {
                data: "status",
                name: "status",
                orderable: true,
                searchable: true
            },
        ];
    </script>
@endsection
