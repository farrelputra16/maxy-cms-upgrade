@extends('layout.main-v3')

@section('title', 'Tingkat Kesulitan')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tingkat Kesulitan Mata Kuliah</li>
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

                    <h4 class="card-title">Tingkat Kesulitan Mata Kuliah</h4>
                    <div class="card-title-desc">
                        <p>
                            Halaman ini memberikan ringkasan tentang tingkat kesulitan yang terkait dengan setiap
                            mata kuliah. Pengguna dapat melihat berbagai level kesulitan yang tersedia beserta catatan admin
                            masing-masing. Tingkat kesulitan membantu mengatur ekspektasi peserta terhadap materi dan
                            kompleksitas yang akan dihadapi.
                            <br><br>
                            <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Nama Tingkat Kesulitan:</strong> Lihat nama tingkat kesulitan untuk setiap
                                mata kuliah yang ditampilkan di tabel ini.</li>
                            <li><strong>Catatan Admin Tingkat Kesulitan:</strong> Bacalah catatan admin singkat tentang
                                kesulitan
                                dari setiap tingkat, yang mencakup gambaran umum dari materi atau tantangan yang akan
                                dihadapi peserta.</li>
                            <li><strong>Tambah Tingkat Kesulitan:</strong> Klik tombol <em>Tambah Tingkat Kesulitan</em>
                                (ikon +) di pojok kanan bawah untuk menambahkan tingkat kesulitan baru ke dalam daftar.</li>
                            <li><strong>Ubah Tingkat Kesulitan:</strong> Tekan tombol <em>Ubah</em> pada kolom "Aksi" untuk
                                memperbarui atau menyesuaikan informasi tingkat kesulitan yang ada.</li>
                        </ul>
                        </p>
                    </div>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getMDifficultyData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Tingkat Kesulitan</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
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
                                <th class="data-medium">Nama Tingkat Kesulitan</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- FAB add starts -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'm_difficulty_type_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddDifficultyType') }}" >
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- FAB add ends -->
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
