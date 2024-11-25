@extends('layout.main-v3')

@section('title', 'Tingkat Penilaian')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Penilaian</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tingkat Penilaian</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Konten Utama -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Tingkat Penilaian</h4>
                    <p class="card-title-desc">
                        Di halaman ini, Anda dapat melihat dan mengelola data tingkat penilaian yang tersedia. Setiap baris
                        dalam tabel ini memuat informasi penting tentang tingkat penilaian, termasuk nama, rentang nilai
                        awal dan akhir, serta deskripsi. Gunakan <b>fitur visibilitas kolom, pengurutan, dan pencarian
                            kolom</b> untuk mempermudah navigasi dan menemukan informasi yang Anda butuhkan dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom yang ingin Anda tampilkan atau sembunyikan untuk
                            fokus pada data tertentu yang penting.</li>
                        <li><strong>Pencarian Data:</strong> Manfaatkan kolom pencarian untuk menemukan tingkat penilaian
                            tertentu berdasarkan nama atau deskripsi.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom, seperti "Tingkat Penilaian" atau
                            "Rentang Awal," untuk mengurutkan data sesuai kebutuhan.</li>
                        <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> di kolom "Aksi" untuk memperbarui
                            informasi tingkat penilaian tertentu.</li>
                        <li><strong>Tambah Tingkat Penilaian Baru:</strong> Gunakan tombol <em>+</em> di sudut kanan bawah
                            untuk menambahkan data tingkat penilaian baru ke daftar.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Tingkat Penilaian</th>
                                <th>Rentang Awal</th>
                                <th>Rentang Akhir</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>{{ $item->range_start }}</td>
                                    <td>{{ $item->range_end }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('getEditScore', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Ubah</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Tingkat penilaian</th>
                                <th>Rentang Awal</th>
                                <th>Rentang Akhir</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>ID Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten Utama -->

    <!-- Tombol Tambah -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddScore') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')

@endsection
