@extends('layout.main-v3')

@section('title', 'Grup Akses')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Breadcrumb Mulai -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengguna & Akses</a></li>
                        <li class="breadcrumb-item active">Grup Akses</li>
                    </ol>
                </div>
                <!-- Breadcrumb Selesai -->
            </div>
        </div>
    </div>
    <!-- Judul Halaman Selesai -->

    <!-- Mulai Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Grup Akses</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan data lengkap tentang semua grup akses di platform. Setiap baris berisi
                        informasi penting, seperti nama grup, deskripsi, dan status aktif atau tidak aktif. Gunakan fitur
                        <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk menyesuaikan tampilan data dan
                        menemukan informasi yang relevan dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengaturan visibilitas kolom untuk memilih kolom mana yang
                            ingin ditampilkan atau disembunyikan.</li>
                        <li><strong>Pengurutan dan Pencarian:</strong> Klik pada header kolom untuk mengurutkan data, atau
                            gunakan bilah pencarian untuk menemukan grup akses tertentu berdasarkan kata kunci.</li>
                        <li><strong>Ubah Grup Akses:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
                            informasi grup akses.</li>
                        <li><strong>Tambah Grup Akses Baru:</strong> Klik ikon <em>Tambah</em> di kanan bawah untuk
                            menambahkan grup akses baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Grup Akses</th>
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
                            @foreach ($accessgroups as $key => $item)
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
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditAccessGroup', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Grup Akses</th>
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
    <!-- Konten Selesai -->

    <!-- FAB Tambah Mulai -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddAccessGroup') }}" target="_blank" data-toggle="tooltip" title="Tambah Grup Akses">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Tambah Selesai -->
@endsection

@section('script')

@endsection
