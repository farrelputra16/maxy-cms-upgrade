@extends('layout.main-v3')

@section('title', 'Daftar Kelas')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Start Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Class</a></li>
                        <li class="breadcrumb-item active">Class List</li>
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
                    <h4 class="card-title">Class List</h4>
                    <p class="card-title-desc">
                        ...
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true"
                        data-url="{{ route('getCourseClassData') }}"
                        data-colvis="[1, 7, 8, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Course Name</th>
                                <th>Batch</th>
                                <th>Type</th>
                                <th>Study Type</th>
                                <th>Ongoing Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Quota</th>
                                <th>Credits</th>
                                <th>Duration (hours)</th>
                                <th>Announcement</th>
                                <th>Auto Certificate</th>
                                <th>Content</th>
                                <th>Admin Notes</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Course Name</th>
                                <th>Batch</th>
                                <th>Type</th>
                                <th>Study Type</th>
                                <th>Ongoing Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Quota</th>
                                <th>Credits</th>
                                <th>Duration (hours)</th>
                                <th>Announcement</th>
                                <th>Auto Certificate</th>
                                <th>Content</th>
                                <th>Admin Notes</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'course_class_create'))
        <div id="floating-whatsapp-button" style='margin-bottom: 5%;'>
            <a href="{{ route('getAddCourseClass') }}" data-toggle="tooltip" title="Add New Course Class">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div id="floating-whatsapp-button">
            <a href="{{ route('getDuplicateCourseClass') }}" data-toggle="tooltip"
                title="Duplicate Course Class">
                <i class="fas fa-copy"></i>
            </a>
        </div>
    @endif
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <script>
        const columns = [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                orderable: false,
                searchable: false
            },
            {
                data: "id",
                name: "id",
                orderable: true,
                searchable: true
            },
            {
                data: "course_name",
                name: "course_name",
                orderable: true,
                searchable: true
            },
            {
                data: "batch",
                name: "batch",
                orderable: true,
                searchable: true
            },
            {
                data: "type",
                name: "type",
                orderable: true,
                searchable: true
            },
            {
                data: "class_type",
                name: "class_type",
                orderable: true,
                searchable: true
            },
            {
                data: "status_ongoing",
                name: "status_ongoing",
                orderable: true,
                searchable: true
            },
            {
                data: "start_date",
                name: "start_date",
                orderable: true,
                searchable: false
            },
            {
                data: "end_date",
                name: "end_date",
                orderable: true,
                searchable: false
            },
            {
                data: "quota",
                name: "quota",
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
                data: "announcement",
                name: "announcement",
                orderable: false,
                searchable: true
            },
            {
                data: "autocert",
                name: "autocert",
                orderable: true,
                searchable: true
            },
            {
                data: "content",
                name: "content",
                orderable: false,
                searchable: true
            },
            {
                data: "description",
                name: "description",
                orderable: false,
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
                orderable: true,
                searchable: true
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
                orderable: true,
                searchable: true
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
            }
        ];

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        @if (session('class_added'))
            Swal.fire({
                title: 'Informasi',
                text: "{{ session('class_added') }}",
                icon: 'info',
                confirmButtonText: 'OK',
            });
        @endif
    </script>

    <script>
        $(document).ready(function() {
            // Handle delete confirmation
            $('.delete-course-class-btn').on('click', function() {
                const formId = $(this).closest('form').attr('id');
                const courseName = $(this).closest('form').data('course-name');

                Swal.fire({
                    title: `Apakah Anda yakin akan menghapus kelas <strong>${courseName}</strong>?`,
                    html: `
                    <p>Tindakan ini akan:</p>
                    <ul class="text-start">
                        <li><strong>Menghapus</strong> seluruh mahasiswa yang tergabung dalam kelas ini</li>
                        <li><strong>Menghapus</strong> seluruh modul dalam kelas ini</li>
                        <li><strong>Menghapus</strong> seluruh absensi dalam kelas ini</li>
                        <li><strong>Menghapus</strong> seluruh penilaian dalam kelas ini</li>
                    </ul>
                    <p class="text-danger"><strong>Tindakan ini tidak dapat dipulihan!</strong></p>
                `,
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Saya Mengerti',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form programmatically
                        $(`#${formId}`).submit();
                    }
                });
            });
        });
    </script>

@endsection
