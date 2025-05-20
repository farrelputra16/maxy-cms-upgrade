@extends('layout.main-v3')

@section('title', 'Tipe Mitra')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tipe Mitra</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tipe Mitra</li>
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
                    <h4 class="card-title">Tipe Mitra</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan fitur untuk mengelola berbagai tipe mitra yang tersedia di dalam sistem.
                        Setiap baris tabel menampilkan informasi utama seperti nama tipe mitra dan deskripsi. Fitur
                        interaktif pada tabel ini memudahkan pengguna dalam mengelola data mitra.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom mana yang ingin ditampilkan atau disembunyikan
                            untuk fokus pada data yang relevan.</li>
                        <li><strong>Pencarian Data:</strong> Masukkan kata kunci di kolom pencarian untuk menemukan tipe
                            mitra tertentu dengan cepat.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Tipe Mitra" atau
                            "Status" untuk mengurutkan data dalam tabel sesuai kebutuhan.</li>
                        <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> pada kolom "Aksi" untuk memperbarui
                            informasi tipe mitra yang ada.</li>
                        <li><strong>Tambah Tipe Mitra Baru:</strong> Klik tombol <em>+</em> di sudut kanan bawah untuk
                            menambahkan tipe mitra baru. Anda akan diarahkan ke halaman formulir untuk memasukkan detail
                            tipe mitra yang baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getPartnerTypeData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Partnership Type Name</th>
                                <th class="data-long">Deskripsi</th>
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
                                <th>Deskripsi</th>
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
            Session::get('access_master')->contains('access_master_name', 'm_partner_type_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddPartnerType') }}"
            data-toggle="tooltip" title="Tambah Tipe Mitra Baru">
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
