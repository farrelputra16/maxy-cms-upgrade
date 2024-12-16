@extends('layout.main-v3')

@section('title', 'Rincian Pekerjaan')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Rincian Pekerjaan</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Rincian Pekerjaan</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Begin Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Rincian Pekerjaan</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan rincian pekerjaan dalam format tabel interaktif, memungkinkan Anda untuk
                        mengelola data pekerjaan secara efisien. Setiap baris dalam tabel ini berisi informasi penting
                        seperti nama, catatan admin, dan status pekerjaan. Anda dapat menggunakan <b>fitur visibilitas
                            kolom,
                            pengurutan, dan kolom pencarian</b> untuk menyesuaikan tampilan sesuai kebutuhan dan dengan
                        cepat menemukan informasi spesifik yang diperlukan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Klik ikon <b>+ Tambah</b> di sudut kanan bawah untuk menambahkan rincian pekerjaan baru.</li>
                        <li>Pada setiap baris, tombol <b>Ubah</b> memungkinkan Anda memperbarui informasi pekerjaan
                            tersebut.</li>
                        <li>Periksa kolom <b>Status</b> untuk melihat apakah pekerjaan dalam kondisi aktif atau nonaktif.
                        </li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> pada tabel
                            untuk memudahkan penyesuaian atau penyaringan data pekerjaan yang dibutuhkan.</li>
                    </ul>
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                                        data-server-processing="true" 
                                        data-url="{{ route('getJobdescData') }}" 
                                        data-colvis="[1, -3, -4, -5, -6]">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id</th>
                                                <th class="data-medium">Nama</th>
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

                    @if (Session::has('access_master') &&
                        Session::get('access_master')->contains('access_master_name', 'm_jobdesc_create'))
                    <div id="floating-whatsapp-button">
                        <a href="{{ route('getAddJobdesc') }}" target="_blank" data-toggle="tooltip"
                            title="Tambah Rincian Pekerjaan Baru">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    @endif
                    <!-- FAB Add Ends -->
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
