@extends('layout.main-v3')

@section('title', 'Grup Akses')

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
                        <li class="breadcrumb-item active">Hak Grup Akses</li>
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
                    <h4 class="card-title">Grup Akses</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan data lengkap tentang semua grup akses di platform. Setiap baris berisi
                        informasi penting, seperti nama grup, catatan admin, dan status aktif atau tidak aktif. Gunakan
                        fitur
                        <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk menyesuaikan tampilan data dan
                        menemukan informasi yang relevan dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengaturan visibilitas kolom untuk memilih kolom mana yang
                            ingin ditampilkan atau disembunyikan.</li>
                        <li><strong>Pengurutan dan Pencarian:</strong> Klik pada header kolom untuk mengurutkan data, atau
                            gunakan bilah pencarian untuk menemukan grup akses tertentu berdasarkan kata kunci.</li>
                        <li><strong>Ubah Grup Akses:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
                            informasi grup akses.</li>
                        <li><strong>Tambah Grup Akses Baru:</strong> Klik ikon <em>Tambah</em> di kanan bawah untuk
                            menambahkan grup akses baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getAccessGroupData') }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Group Access Name</th>
                                <th>Admin Note</th>
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
                                <th>Group Access Name</th>
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
    <!-- Konten Selesai -->

    <!-- FAB Tambah Mulai -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'access_group_create'))
        <div id="floating-whatsapp-button">
            <a href="{{ route('getAddAccessGroup') }}" data-toggle="tooltip" title="Tambah Grup Akses">
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
                data: "description",
                name: "description",
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
