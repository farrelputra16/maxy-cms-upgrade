@extends('layout.main-v3')

@section('title', 'Tipe Event')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tipe Event</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tipe Event</li>
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
                    <h4 class="card-title">Tipe Event</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola data tipe event yang digunakan dalam sistem. Setiap
                        baris pada tabel menampilkan detail utama dari tipe event, seperti nama dan catatan admin tipe event.
                        Halaman ini menyediakan fitur interaktif untuk memudahkan pengelolaan data event melalui tabel.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Gunakan fitur visibilitas kolom untuk memilih kolom mana
                            yang ingin Anda tampilkan atau sembunyikan, sehingga Anda dapat fokus pada informasi yang
                            relevan.</li>
                        <li><strong>Pencarian Data:</strong> Masukkan kata kunci pada kolom pencarian untuk menemukan tipe
                            event tertentu berdasarkan nama atau catatan admin.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Tipe Event" atau "Status"
                            untuk mengurutkan data dalam tabel berdasarkan kolom tersebut. Pengurutan ini membantu Anda
                            untuk meninjau data dengan lebih mudah dan teratur.</li>
                        <li><strong>Ubah Tipe Event:</strong> Gunakan tombol <em>Ubah</em> pada kolom "Aksi" di setiap baris
                            untuk memperbarui informasi detail dari tipe event yang telah ada.</li>
                        <li><strong>Tambah Tipe Event Baru:</strong> Untuk menambahkan tipe event baru, klik tombol
                            <em>+</em> di pojok kanan bawah. Anda akan diarahkan ke formulir untuk menambahkan data tipe
                            event yang baru.</li>
                    </ul>
                    </p>



                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Tipe Event</th>
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
                            @foreach ($MEventType as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>

                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
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
                                        <a href="{{ route('getEditEventType', ['id' => $item->id, 'access' => 'm_Event_type_update']) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Modul</th>
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
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddEventType', ['access' => 'm_Event_type_create']) }}" target="_blank" data-toggle="tooltip"
            title="Tambah Tipe Event Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')

@endsection
