@extends('layout.main-v3')

@section('title', 'Sub Modul Mata Kuliah')

@section('content')
    <!-- Awal Halaman Judul -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Awal Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        @if ($bcMBKM == true)
                            <li class="breadcrumb-item"><a href="{{ route('getCourseMBKM') }}">MBKM</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Mata Kuliah</a></li>
                        @endif
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseModule', ['course_id' => $parent_module_detail->course_id, 'page_type' => 'LMS']) }}">Modul
                                {{ $bcMBKM ? 'MBKM' : 'Mata Kuliah' }}</a></li>
                        <li class="breadcrumb-item active">Sub Modul: {{ $parent_module_detail->name }}</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Halaman Judul -->

    <!-- Awal Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sub Modul untuk Mata Kuliah: {{ $parent_module_detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar sub modul yang terkait dengan modul utama mata kuliah tertentu,
                        dalam format tabel interaktif. Anda dapat melihat detail utama, seperti nama modul, prioritas,
                        jenis, materi, dan status. Fitur <b>pencarian, pengurutan, dan visibilitas kolom</b> membantu Anda
                        menyesuaikan tampilan dan menemukan data dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Pilih kolom tertentu yang ingin ditampilkan atau disembunyikan untuk menyesuaikan tampilan data
                            sesuai kebutuhan.</li>
                        <li>Gunakan fitur pengurutan untuk mengurutkan data berdasarkan prioritas, jenis, atau waktu
                            pembuatan.</li>
                        <li>Manfaatkan pencarian kolom untuk menemukan modul tertentu dengan cepat berdasarkan kata kunci.
                        </li>
                        <li>Tekan tombol <b>Ubah</b> pada kolom Aksi untuk memperbarui informasi sub modul atau mengubah
                            status aktif/nonaktif modul.</li>
                        <li>Klik tombol <b>Tambah</b> di sudut kanan bawah untuk menambahkan sub modul baru ke dalam modul
                            utama.</li>
                    </ul>
                    </p>
                    <input type="text" id="classSelect" value="{{ $parent_module_detail->course_id }}" hidden>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getCourseSubModuleData') }}"
                        data-colvis="[1, -3, -4, -5, -6]" data-id="{{ $parent_module_detail->id }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Prioritas</th>
                                <th>Jenis</th>
                                <th class="data-long">Materi</th>
                                <th class="data-long">Konten</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
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
                                <th>Nama Modul</th>
                                <th>Prioritas</th>
                                <th>Jenis</th>
                                <th>Materi</th>
                                <th>Konten</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
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

    <!-- FAB Tambah Mulai -->
    <div id="floating-whatsapp-button">
        <a
            href="{{ route('getAddCourseChildModule', ['id' => $parent_module_detail->id, 'course_id' => $course_detail->id, 'page_type' => $page_type]) }}">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Tambah Selesai -->
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
                data: "type",
                name: "type",
                orderable: true,
                searchable: true
            },
            {
                data: "material",
                name: "material",
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
@endsection
