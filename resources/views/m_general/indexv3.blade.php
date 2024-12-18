@extends('layout.main-v3')

@section('title', 'Pengaturan Umum')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengaturan</a></li>
                        <li class="breadcrumb-item"><a>Pengaturan Umum</a></li>
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
                    <h4 class="card-title">Pengaturan Umum</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan akses ke pengaturan umum sistem yang meliputi logo, alamat, kontak, dan
                        berbagai data institusi lainnya. Anda dapat melihat dan mengelola detail pengaturan umum ini melalui
                        tabel di bawah, yang menampilkan informasi seperti nama pengaturan, isi, catatan admin, status,
                        serta
                        waktu pembuatan dan pembaruan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Kolom <b>Nama</b> dan <b>Isi</b> menampilkan nama pengaturan dan nilai dari pengaturan tersebut,
                            seperti alamat atau nomor kontak. Arahkan kursor pada teks untuk melihat informasi lebih lengkap
                            melalui tooltip.</li>
                        <li>Gunakan kolom <b>Catatan Admin</b> untuk memahami fungsi atau tujuan dari setiap pengaturan
                            secara
                            lebih mendalam.</li>
                        <li>Kolom <b>Status</b> menunjukkan apakah pengaturan tersebut sedang aktif (ditandai dengan tombol
                            hijau) atau non-aktif (tombol merah), membantu Anda memverifikasi pengaturan yang sedang
                            diterapkan.</li>
                        <li>Gunakan tombol <b>Ubah</b> di kolom Aksi untuk memperbarui informasi pengaturan, seperti
                            mengubah logo institusi atau memperbarui informasi kontak.</li>
                        <li>Untuk menambahkan pengaturan baru, klik tombol tambah di sudut kanan bawah halaman ini.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> untuk
                            memfilter dan mencari pengaturan tertentu dengan cepat sesuai kebutuhan.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-server-processing="true" data-url="{{ route('getGeneralData') }}" data-colvis="[-3, -4, -5, -6, -10]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">Isi</th>
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
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">Isi</th>
                                <th class="data-long">Catatan Admin</th>
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
    <!-- End Content -->

    <!-- FAB Add Starts -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'm_general_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddGeneral') }}" data-toggle="tooltip" title="Tambah Data">
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
        { data: "value", name: "value", orderable: true, searchable: true },
        { data: "description", name: "description", orderable: true, searchable: true },
        { data: "created_at", name: "created_at" },
        { data: "created_id", name: "created_id" },
        { data: "updated_at", name: "updated_at" },
        { data: "updated_id", name: "updated_id" },
        { data: "status", name: "status", orderable: true, searchable: true },
        { data: "action", name: "action", orderable: false, searchable: false },
    ];
</script>
@endsection
