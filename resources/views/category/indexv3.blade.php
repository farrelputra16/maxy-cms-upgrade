@extends('layout.main-v3')

@section('title', 'Program Studi')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Program Studi</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Program Studi</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Program Studi</h4>
                    <div class="card-title-desc">
                        <p>
                            Halaman ini menampilkan data program studi yang ada di sistem, termasuk informasi mendetail
                            tentang setiap program studi seperti nama, catatan admin, waktu pembuatan, dan status
                            aktif/non-aktif. Pengguna dapat dengan mudah mengelola data ini melalui tabel interaktif.
                            <br><br>
                            <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Lihat Program Studi:</strong> Setiap baris di tabel mewakili Program Studi tertentu
                                dengan informasi mendetail yang mencakup nama, catatan admin, dan status.</li>
                            <li><strong>Cari dan Urutkan Data:</strong> Gunakan fitur <em>pencarian</em> dan <em>pengurutan
                                    kolom</em> untuk menemukan Program Studi dengan cepat atau mengatur urutan data
                                berdasarkan nama atau status.</li>
                            <li><strong>Ubah Informasi Program Studi:</strong> Klik tombol <em>Ubah</em> pada kolom Aksi
                                untuk memperbarui informasi yang sudah ada, seperti nama atau catatan admin Program Studi.</li>
                            <li><strong>Tambah Program Studi Baru:</strong> Klik ikon <em>Tambah</em> di pojok kanan bawah
                                untuk menambahkan Program Studi baru ke dalam sistem.</li>
                        </ul>
                        </p>
                    </div>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getCategoryData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Program Studi</th>
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

    <!-- Tombol Tambah -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'category_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCategory') }}" target="_blank" data-toggle="tooltip" title="Tambah Program Studi Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
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
