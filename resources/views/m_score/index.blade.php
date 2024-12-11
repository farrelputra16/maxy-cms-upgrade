@extends('layout.main-v3')

@section('title', 'Bobot Penilaian')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Penilaian</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Bobot Penilaian</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Konten Utama -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Bobot Penilaian</h4>
                    <p class="card-title-desc">
                        Di halaman ini, Anda dapat melihat dan mengelola data bobot penilaian yang tersedia. Setiap baris
                        dalam tabel ini memuat informasi penting tentang bobot penilaian, termasuk nama, rentang nilai
                        awal dan akhir, serta catatan admin. Gunakan <b>fitur visibilitas kolom, pengurutan, dan pencarian
                            kolom</b> untuk mempermudah navigasi dan menemukan informasi yang Anda butuhkan dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom yang ingin Anda tampilkan atau sembunyikan untuk
                            fokus pada data tertentu yang penting.</li>
                        <li><strong>Pencarian Data:</strong> Manfaatkan kolom pencarian untuk menemukan bobot penilaian
                            tertentu berdasarkan nama atau catatan admin.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom, seperti "Bobot Penilaian" atau
                            "Rentang Awal," untuk mengurutkan data sesuai kebutuhan.</li>
                        <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> di kolom "Aksi" untuk memperbarui
                            informasi bobot penilaian tertentu.</li>
                        <li><strong>Tambah Bobot Penilaian Baru:</strong> Gunakan tombol <em>+</em> di sudut kanan bawah
                            untuk menambahkan data bobot penilaian baru ke daftar.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getScoreData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Bobot Penilaian</th>
                                <th>Rentang Awal</th>
                                <th>Rentang Akhir</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaruan</th>
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
                                <th>Bobot penilaian</th>
                                <th>Rentang Awal</th>
                                <th>Rentang Akhir</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten Utama -->

    <!-- Tombol Tambah -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddScore') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
        { data: "range_start", name: "range_start", orderable: true, searchable: true },
        { data: "range_end", name: "range_end", orderable: true, searchable: true },
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
