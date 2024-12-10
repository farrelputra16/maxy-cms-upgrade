@extends('layout.main-v3')

@section('title', 'Tipe Kemitraan')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tipe Kemitraan</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tipe Kemitraan</li>
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
                    <h4 class="card-title">Tipe Kemitraan</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan fitur untuk mengelola berbagai tipe kemitraan yang tersedia di dalam sistem.
                        Setiap baris tabel menampilkan informasi utama seperti nama tipe kemitraan dan catatan admin. Fitur
                        interaktif pada tabel ini memudahkan pengguna dalam mengelola data kemitraan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom mana yang ingin ditampilkan atau disembunyikan
                            untuk fokus pada data yang relevan.</li>
                        <li><strong>Pencarian Data:</strong> Masukkan kata kunci di kolom pencarian untuk menemukan tipe
                            kemitraan tertentu dengan cepat.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Tipe Kemitraan" atau
                            "Status" untuk mengurutkan data dalam tabel sesuai kebutuhan.</li>
                        <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> pada kolom "Aksi" untuk memperbarui
                            informasi tipe kemitraan yang ada.</li>
                        <li><strong>Tambah Tipe Kemitraan Baru:</strong> Klik tombol <em>+</em> di sudut kanan bawah untuk
                            menambahkan tipe kemitraan baru. Anda akan diarahkan ke halaman formulir untuk memasukkan detail
                            tipe kemitraan yang baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getPartnershipTypeData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Tipe Kemitraan</th>
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
                                <th>Nama</th>
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
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddPartnershipType', ['access' => 'm_Partnership_type_create']) }}" target="_blank"
            data-toggle="tooltip" title="Tambah Tipe Kemitraan Baru">
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
