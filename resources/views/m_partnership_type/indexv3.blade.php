@extends('layout.main-v3')

@section('title', 'Tipe Kemitraan')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tipe Kemitraan</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tipe Kemitraan</li>
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
                    <h4 class="card-title">Tipe Kemitraan</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan fitur untuk mengelola berbagai tipe kemitraan yang tersedia di dalam sistem.
                        Setiap baris tabel menampilkan informasi utama seperti nama tipe kemitraan dan deskripsi. Fitur
                        interaktif pada tabel ini memudahkan pengguna dalam mengelola data kemitraan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom mana yang ingin ditampilkan atau disembunyikan
                            untuk fokus pada data yang relevan.</li>
                        <li><strong>Pencarian Data:</strong> Masukkan kata kunci di kolom pencarian untuk menemukan tipe
                            kemitraan tertentu dengan cepat.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Tipe Kemitraan" atau
                            "Status" untuk mengurutkan data dalam tabel sesuai kebutuhan.</li>
                        <li><strong>Edit Data:</strong> Klik tombol <em>Edit</em> pada kolom "Aksi" untuk memperbarui
                            informasi tipe kemitraan yang ada.</li>
                        <li><strong>Tambah Tipe Kemitraan Baru:</strong> Klik tombol <em>+</em> di sudut kanan bawah untuk
                            menambahkan tipe kemitraan baru. Anda akan diarahkan ke halaman formulir untuk memasukkan detail
                            tipe kemitraan yang baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Tipe Kemitraan</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($MPartnershipType as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->description }}">
                                        {!! !empty($item->description) ? \Str::limit(strip_tags($item->description), 20) : '-' !!}
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
                                        <a href="{{ route('getEditPartnershipType', ['id' => $item->id, 'access' => 'm_Partnership_type_update']) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
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
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddPartnershipType', ['access' => 'm_Partnership_type_create']) }}" target="_blank"
            data-toggle="tooltip" title="Tambah Tipe Kemitraan Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')

@endsection
