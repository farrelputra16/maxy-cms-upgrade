@extends('layout.main-v3')

@section('title', 'Pengguna')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Breadcrumb Mulai -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengguna & Akses</a></li>
                        <li class="breadcrumb-item active">Pengguna</li>
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
                    <h4 class="card-title">Data Pengguna</h4>
                    <p class="card-title-desc">
                        Halaman ini berfungsi untuk mengelola data pengguna di platform. Anda dapat melihat semua informasi
                        pengguna, termasuk nama, email, grup akses, dan status. Gunakan fitur <b>visibilitas kolom,
                            pengurutan, dan pencarian kolom</b> untuk mengatur tampilan dan menemukan informasi yang relevan
                        dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengaturan visibilitas kolom untuk memilih kolom mana yang
                            ingin ditampilkan atau disembunyikan.</li>
                        <li><strong>Pengurutan dan Pencarian:</strong> Klik pada header kolom untuk mengurutkan data, atau
                            gunakan bilah pencarian untuk menemukan pengguna tertentu berdasarkan kata kunci.</li>
                        <li><strong>Ubah dan Lihat Profil:</strong> Gunakan tombol <em>Ubah</em> untuk mengubah data
                            pengguna atau <em>Profil</em> untuk melihat profil pengguna secara detail.</li>
                        <li><strong>Tambah Pengguna Baru:</strong> Klik ikon <em>Tambah</em> di kanan bawah untuk
                            menambahkan pengguna baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getUserData') }}"
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
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
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Konten Selesai -->

    <!-- FAB Tambah Mulai -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'user_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddUser') }}" data-toggle="tooltip" title="Tambah Pengguna">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
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
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false
            },
        ];
    </script>
@endsection
