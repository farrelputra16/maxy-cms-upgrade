@extends('layout.main-v3')

@section('title', 'Tipe Acara')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tipe Acara</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tipe Acara</li>
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
                    <h4 class="card-title">Tipe Acara</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola data tipe acara yang digunakan dalam sistem. Setiap
                        baris pada tabel menampilkan detail utama dari tipe acara, seperti nama dan catatan admin tipe acara.
                        Halaman ini menyediakan fitur interaktif untuk memudahkan pengelolaan data acara melalui tabel.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Gunakan fitur visibilitas kolom untuk memilih kolom mana
                            yang ingin Anda tampilkan atau sembunyikan, sehingga Anda dapat fokus pada informasi yang
                            relevan.</li>
                        <li><strong>Pencarian Data:</strong> Masukkan kata kunci pada kolom pencarian untuk menemukan tipe
                            acara tertentu berdasarkan nama atau catatan admin.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Tipe Acara" atau "Status"
                            untuk mengurutkan data dalam tabel berdasarkan kolom tersebut. Pengurutan ini membantu Anda
                            untuk meninjau data dengan lebih mudah dan teratur.</li>
                        <li><strong>Ubah Tipe Acara:</strong> Gunakan tombol <em>Ubah</em> pada kolom "Aksi" di setiap baris
                            untuk memperbarui informasi detail dari tipe acara yang telah ada.</li>
                        <li><strong>Tambah Tipe Acara Baru:</strong> Untuk menambahkan tipe acara baru, klik tombol
                            <em>+</em> di pojok kanan bawah. Anda akan diarahkan ke formulir untuk menambahkan data tipe
                            acara yang baru.</li>
                    </ul>
                    </p>



                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getEventTypeData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Tipe Acara</th>
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
            Session::get('access_master')->contains('access_master_name', 'm_event_type_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddEventType') }}" target="_blank" data-toggle="tooltip"
            title="Tambah Tipe Acara Baru">
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
