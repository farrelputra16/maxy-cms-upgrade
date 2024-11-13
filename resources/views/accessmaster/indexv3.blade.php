@extends('layout.main-v3')

@section('title', 'Hak Akses Utama')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Mulai Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengguna & Akses</a></li>
                        <li class="breadcrumb-item active">Hak Akses Utama</li>
                    </ol>
                </div>
                <!-- Selesai Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Selesai Judul Halaman -->

    <!-- Mulai Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hak Akses Utama</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan data terperinci tentang seluruh hak akses utama dalam tabel interaktif.
                        Setiap baris menampilkan informasi penting, seperti nama hak akses, deskripsi, dan status aktif atau
                        tidak aktif. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk
                        menyesuaikan tampilan dan menemukan data yang Anda perlukan dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Pengaturan Kolom:</strong> Atur kolom yang terlihat sesuai dengan kebutuhan untuk
                            memfokuskan pada informasi tertentu.</li>
                        <li><strong>Pengurutan dan Pencarian:</strong> Klik pada header kolom untuk mengurutkan data, atau
                            gunakan kotak pencarian untuk menemukan hak akses berdasarkan kata kunci.</li>
                        <li><strong>Edit Hak Akses:</strong> Klik tombol <em>Edit</em> di kolom "Aksi" untuk memperbarui
                            detail hak akses utama.</li>
                        <li><strong>Tambah Hak Akses Baru:</strong> Klik ikon <em>Tambah</em> di kanan bawah untuk
                            menambahkan hak akses utama baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Hak Akses</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accessmasters as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="batch" scope="row">{{ $item->name }}</td>
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
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditAccessMaster', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Hak Akses</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
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
    <!-- Selesai Konten -->

    <!-- Mulai FAB Tambah -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddAccessMaster') }}" target="_blank" data-toggle="tooltip" title="Tambah Hak Akses Utama">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Selesai FAB Tambah -->
@endsection

@section('script')

@endsection
