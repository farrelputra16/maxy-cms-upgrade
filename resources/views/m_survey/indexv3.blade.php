@extends('layout.main-v3')

@section('title', 'Survei')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Survei</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Survei</li>
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
                    <h4 class="card-title">Survei</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk melihat dan mengelola semua survei yang tersedia dalam sistem.
                        Setiap baris menampilkan informasi lengkap mengenai survei, termasuk nama, URL, tanggal berakhir,
                        tipe survei, dan statusnya. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian kolom</b>
                        untuk menemukan data yang diinginkan dengan cepat dan menyesuaikan tampilan tabel sesuai kebutuhan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom yang ingin Anda tampilkan atau sembunyikan untuk
                            fokus pada data yang relevan.</li>
                        <li><strong>Pencarian Data:</strong> Gunakan kolom pencarian untuk menemukan survei tertentu
                            berdasarkan nama, catatan admin, atau tipe.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama" atau "Tanggal Berakhir"
                            untuk mengurutkan data dalam tabel.</li>
                        <li><strong>Ubah Survei:</strong> Klik tombol <em>Ubah</em> pada kolom "Aksi" untuk memperbarui
                            informasi survei yang ada.</li>
                        <li><strong>Tambah Survei Baru:</strong> Klik tombol <em>+</em> di sudut kanan bawah untuk membuat
                            survei baru. Anda akan diarahkan ke halaman formulir untuk memasukkan detail survei yang baru.
                        </li>
                        <li><strong>Hasil Survei:</strong> Klik tombol <em>Hasil</em> untuk melihat hasil survei yang
                            terkumpul dari peserta.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getSurveyData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">URL</th>
                                <th>Tanggal Berakhir</th>
                                <th>Tipe</th>
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
                                <th>URL</th>
                                <th>Tanggal Berakhir</th>
                                <th>Tipe</th>
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
            Session::get('access_master')->contains('access_master_name', 'm_survey_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddSurvey') }}" target="_blank" data-toggle="tooltip"
            title="Tambah Survei Baru">
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
        { data: "url", name: "url", orderable: false, searchable: false },
        { data: "expired_date", name: "expired_date", orderable: true, searchable: true },
        { data: "type", name: "type", orderable: true, searchable: true },
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
