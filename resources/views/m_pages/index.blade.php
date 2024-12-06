@extends('layout.main-v3')

@section('title', 'Pages Settings')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Halaman</li>
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
                    <h4 class="card-title">Pengaturan Halaman</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola halaman-halaman yang ditampilkan di frontpage website
                        Bina Karya. Setiap baris dalam tabel di bawah ini menampilkan informasi penting tentang halaman,
                        termasuk nama halaman dan opsi untuk melakukan pengeditan. Gunakan fitur <b>pencarian, pengurutan,
                            dan visibilitas kolom</b> untuk mempermudah navigasi dan menemukan halaman yang Anda butuhkan
                        dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Pengaturan Kolom:</strong> Klik header kolom untuk mengurutkan data berdasarkan nomor
                            atau nama halaman. Pilih kolom yang ingin ditampilkan atau disembunyikan sesuai kebutuhan Anda.
                        </li>
                        <li><strong>Ubah Halaman:</strong> Gunakan tombol <em>Ubah</em> pada kolom "Aksi" untuk membuka
                            halaman pengaturan detail dari setiap halaman yang ingin Anda ubah.</li>
                        <li><strong>Tambah Halaman Baru:</strong> Klik tombol tambah di kanan bawah (ikon "+") untuk
                            menambahkan halaman baru ke dalam sistem, sehingga website tetap up-to-date dan sesuai
                            kebutuhan.</li>
                    </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-colvis="[2]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Halaman</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- Page Name --}}
                                    <td>
                                        @if ($section->page_id == 1)
                                            Home
                                        @elseif ($section->page_id == 2)
                                            Browse Courses
                                        @elseif ($section->page_id == 3)
                                            Blog
                                        @else
                                            Unknown Page
                                        @endif
                                    </td>
                                    {{-- Ubah Button --}}
                                    <td>{{ $section->status == 1 ? 'Aktif' : 'Non Aktif' }}</td>
                                    <td>
                                        <a href="{{ route('getEditPage', ['id' => $section->page_id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Halaman</th>
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

    {{-- <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddGeneral') }}" target="_blank" data-toggle="tooltip"
            title="Tambah Data">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends --> --}}
@endsection

@section('script')

@endsection
