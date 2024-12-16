@extends('layout.main-v3')

@section('title', 'MBKM')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data MBKM</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">MBKM</li>
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
                    <h4 class="card-title">MBKM</h4>
                    <p class="card-title-desc">
                        Halaman ini memberikan gambaran umum mengenai program MBKM yang tersedia. Anda dapat melihat
                        informasi inti dari setiap program, termasuk nama, ringkasan, dan status aktif.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Mencari Data:</strong> Gunakan kolom pencarian untuk menemukan program MBKM berdasarkan
                            nama atau deskripsi.</li>
                        <li><strong>Mengurutkan Kolom:</strong> Klik pada judul kolom untuk mengurutkan data berdasarkan
                            kriteria tertentu seperti "Tanggal Dibuat" atau "Status".</li>
                        <li><strong>Mengubah Data:</strong> Klik tombol <em>Ubah</em> di kolom "Aksi" untuk mengubah
                            informasi program MBKM yang ada.</li>
                        <li><strong>Melihat Daftar Modul:</strong> Gunakan tombol <em>Daftar Modul</em> untuk melihat atau
                            menambahkan modul terkait dengan program yang dipilih.</li>
                        <li><strong>Menambah Data Baru:</strong> Klik tombol <em>Tambah Program MBKM</em> (+) di pojok kanan
                            bawah untuk membuka form penambahan data program baru. Isi form dengan lengkap, lalu klik
                            <em>Simpan</em> untuk menambah data program MBKM baru ke dalam daftar.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-server-processing="true" data-url="{{ route('getCourseMBKMData') }}" data-colvis="[-3, -4, -5, -6, -11]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Program MBKM</th>
                                <th class="data-medium">Ringkasan Singkat</th>
                                <th class="data-long">Detail Ringkasan</th>
                                <th class="data-long">Konten Tambahan</th>
                                <th>Waktu Dibuat</th>
                                <th>Dibuat Oleh</th>
                                <th>Waktu Diperbarui</th>
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
                                <th class="data-medium">Program MBKM</th>
                                <th class="data-medium">Ringkasan Singkat</th>
                                <th class="data-long">Detail Ringkasan</th>
                                <th class="data-long">Konten Tambahan</th>
                                <th>Waktu Dibuat</th>
                                <th>Dibuat Oleh</th>
                                <th>Waktu Diperbarui</th>
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
    <!-- Akhir Konten -->

    <!-- FAB untuk Tambah -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'course_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddMBKM') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- Akhir FAB -->
@endsection

@section('script')
    <script>
        const columns = [
            { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
            { data: "id", name: "id" },
            { data: "name", name: "name", orderable: true, searchable: true },
            { data: "short_description", name: "short_description", orderable: true, searchable: true },
            { data: "description", name: "description", orderable: true, searchable: true },
            { data: "content", name: "content", orderable: true, searchable: true },
            { data: "created_at", name: "created_at" },
            { data: "created_id", name: "created_id" },
            { data: "updated_at", name: "updated_at" },
            { data: "updated_id", name: "updated_id" },
            { data: "status", name: "status", orderable: true, searchable: true },
            { data: "action", name: "action", orderable: false, searchable: false },
        ];
    </script>
    @if (session('course_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Informasi!',
                    html: "<strong>{{ session('course_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif
@endsection
