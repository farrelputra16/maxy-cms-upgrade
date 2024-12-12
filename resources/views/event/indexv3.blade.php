@extends('layout.main-v3')

@section('title', 'Acara')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Konten</a></li>
                        <li class="breadcrumb-item active">Acara</li>
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
                    <h4 class="card-title">Acara</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan data lengkap dari semua acara atau kegiatan yang terdaftar dalam tabel
                        interaktif. Setiap baris berisi informasi penting, seperti nama acara, tanggal, catatan admin, serta
                        status publikasi dan verifikasi. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian
                            kolom</b> untuk menyesuaikan tampilan dan menemukan acara yang Anda butuhkan dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Sesuaikan kolom yang terlihat untuk memfokuskan pada data tertentu.
                        </li>
                        <li><strong>Urutkan & Cari:</strong> Klik judul kolom untuk mengurutkan data atau gunakan pencarian
                            untuk menemukan acara berdasarkan kata kunci.</li>
                        <li><strong>Ubah & Akses Kehadiran:</strong> Gunakan tombol di kolom “Aksi” untuk mengubah detail
                            acara, memeriksa kehadiran, atau mengelola persyaratan.</li>
                        <li><strong>Tambah Acara:</strong> Klik ikon <em>Tambah</em> di kanan bawah untuk menambahkan acara
                            baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getEventData') }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th>Gambar</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Verifikasi</th>
                                <th>Publik</th>
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
                                <th>Module Name</th>
                                <th>Image</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Description</th>
                                <th>Need verification</th>
                                <th>Public</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
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
            Session::get('access_master')->contains('access_master_name', 'event_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddEvent') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
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
            data: "image",
            name: "image",
            orderable: false,
            searchable: false
        },
        {
            data: "date_start",
            name: "date_start",
            orderable: true,
            searchable: true
        },
        {
            data: "date_end",
            name: "date_end",
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
            data: "is_need_verification",
            name: "is_need_verification",
            orderable: true,
            searchable: false
        },
        {
            data: "is_public",
            name: "is_public",
            orderable: true,
            searchable: false
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
        },
    ];
</script>
@endsection
