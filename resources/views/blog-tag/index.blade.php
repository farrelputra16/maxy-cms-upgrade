@extends('layout.main-v3')

@section('title', 'Blog')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Konten</a></li>
                        <li class="breadcrumb-item active">Tag Blog</li>
                    </ol>
                </div>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- begin content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Data Tag Blog</h4>
                    <p class="card-title-desc">
                        Halaman ini berisi data tag blog yang akan digunakan untuk mengelompokkan artikel di halaman blog.
                        Setiap tag memiliki atribut seperti nama, warna, catatan admin, dan status aktif/non-aktif. Data tag
                        ditampilkan dalam tabel interaktif yang memudahkan navigasi dan pengelolaan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Kolom <b>Nama</b> dan <b>Warna</b> memudahkan Anda mengidentifikasi tag yang tersedia dan
                            visualisasi warnanya. Arahkan kursor pada nama tag untuk melihat nama lengkap melalui tooltip.
                        </li>
                        <li>Gunakan kolom <b>Catatan Admin</b> untuk melihat keterangan singkat tentang setiap tag, yang
                            menjelaskan kategori atau tujuan penggunaannya.</li>
                        <li>Kolom <b>Status</b> menunjukkan apakah tag aktif (dapat digunakan dalam artikel) atau non-aktif
                            (tidak ditampilkan).</li>
                        <li>Klik tombol <b>Ubah</b> di kolom Aksi untuk memperbarui informasi tag, seperti mengganti warna
                            atau mengubah status tag.</li>
                        <li>Untuk menambahkan tag baru, klik tombol tambah di sudut kanan bawah halaman ini.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> untuk
                            menemukan tag dengan cepat dan mengatur tampilan tabel sesuai kebutuhan.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getBlogTagData') }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Colour</th>
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
                                <th class="data-medium">Name</th>
                                <th>Colour</th>
                                <th class="data-long">Admin Note</th>
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
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddBlogTag') }}">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
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
            data: "color",
            name: "color",
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
            orderable: true,
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
            orderable: true,
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
@endsection
