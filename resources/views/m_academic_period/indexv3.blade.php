@extends('layout.main-v3')

@section('title', 'Periode Akademik')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Periode Akademik</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Periode Akademik</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Awal Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Periode Akademik</h4>
                    <p class="card-title-desc">
                        Di halaman ini, Anda dapat melihat dan mengelola daftar periode akademik yang tersedia. Setiap baris
                        dalam tabel ini memberikan detail penting tentang periode akademik, seperti nama, tanggal mulai,
                        tanggal selesai, dan catatan admin. Gunakan <b>fitur visibilitas kolom, pengurutan, dan pencarian
                            kolom</b> untuk menyesuaikan tampilan sesuai kebutuhan dan menemukan informasi dengan lebih
                        cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Tentukan kolom mana yang ingin Anda tampilkan atau
                            sembunyikan untuk fokus pada data tertentu.</li>
                        <li><strong>Pencarian Data:</strong> Manfaatkan kolom pencarian untuk menemukan periode akademik
                            spesifik berdasarkan nama atau catatan admin.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom, seperti "Tanggal Mulai" atau "Status,"
                            untuk mengurutkan data sesuai kebutuhan.</li>
                        <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> pada kolom "Aksi" untuk memperbarui
                            informasi dari periode akademik tertentu.</li>
                        <li><strong>Tambah Periode Akademik Baru:</strong> Gunakan tombol <em>+</em> di pojok kanan bawah
                            untuk menambahkan data periode akademik baru ke daftar.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getMAcademicPeriodData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th class="data-long">Admin Note</th>
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
                                <th>Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Admin Note</th>
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
    <!-- Akhir Konten -->
    <!-- Tombol Tambah -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'm_academic_period_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddAcademicPeriod', ['access' => 'm_academic_period_create']) }}">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- Tombol Tambah Selesai -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
        { data: "date_start", name: "date_start", orderable: true, searchable: true },
        { data: "date_end", name: "date_end", orderable: true, searchable: true },
        { data: "description", name: "description", orderable: true, searchable: true },
        { data: "created_at", name: "created_at", orderable: true, searchable: false },
        { data: "created_id", name: "created_id", orderable: false, searchable: false },
        { data: "updated_at", name: "updated_at", orderable: true, searchable: false },
        { data: "updated_id", name: "updated_id", orderable: false, searchable: false },
        { data: "status", name: "status", orderable: true, searchable: true },
        { data: "action", name: "action", orderable: false, searchable: false },
    ];
</script>
@endsection
