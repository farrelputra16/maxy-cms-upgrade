@extends('layout.main-v3')

@section('title', 'Modul Kelas')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Manajemen Modul Kelas</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item active">Modul Kelas: {{ $class_detail->course->name }}
                            {{ $class_detail->batch }}</li>

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
                    <h4 class="card-title">Modul untuk Kelas: {{ $course_detail->name }} Kelas Paralel {{ $batch_number }}
                    </h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola modul dalam kelas yang telah dipilih. Setiap
                        baris dalam tabel berikut berisi informasi penting mengenai modul, seperti nama modul, hari
                        pelaksanaan, tanggal mulai dan selesai, serta catatan admin singkat. Fitur-fitur seperti
                        <b>pengaturan
                            kolom, pengurutan, dan pencarian</b> tersedia untuk membantu Anda menyesuaikan tampilan dan
                        menemukan modul tertentu dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengurutan di header kolom untuk mengelompokkan data
                            berdasarkan hari atau tanggal.</li>
                        <li><strong>Lihat Catatan SAdmin Lengkap:</strong> Arahkan kursor ke teks yang terpotong pada kolom
                            catatan admin untuk melihat konten lengkap dari catatan admin modul.</li>
                        <li><strong>Ubah Modul:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
                            informasi modul yang ada.</li>
                        <li><strong>Atur Konten Modul:</strong> Tombol <em>Atur Konten</em> memungkinkan Anda mengakses dan
                            mengelola sub-modul atau materi di dalam modul tersebut.</li>
                        <li><strong>Tambah Modul:</strong> Gunakan ikon <em>Tambah</em> di kanan bawah untuk menambahkan
                            modul baru ke dalam kelas ini.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getCourseClassParentModuleData') }}"
                        data-colvis="[1, -3, -4, -5, -6]"
                        data-id="{{ $course_class_id}}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari Modul</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
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
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari Modul</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
            Session::get('access_master')->contains('access_master_name', 'course_class_module_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseClassModule', ['id' => $course_class_id]) }}" data-toggle="tooltip"
            title="Tambah Modul Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- FAB Add Ends -->
@endsection

@section('script')

    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });

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
                name: "id"
            },
            {
                data: "course_module_name", 
                name: "course_module_name",
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
            {
                data: "action", 
                name: "action",
                orderable: false,
                searchable: false
            }
        ];
    </script>

    @if (session('class_module_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Information!',
                    html: "<strong>{{ session('class_module_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                    // Optional: You can also add a cancel button if you want
                    // showCancelButton: true,
                    // cancelButtonText: 'Close',
                });
            });
        </script>
    @endif


@endsection
