@extends('layout.main-v3')

@section('title', 'Tipe Acara')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tipe Acara</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tipe Acara</li>
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
                    <h4 class="card-title">Tipe Acara</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola data tipe acara yang digunakan dalam sistem. Setiap
                        baris pada tabel menampilkan detail utama dari tipe acara, seperti nama dan catatan admin tipe acara.
                        Halaman ini menyediakan fitur interaktif untuk memudahkan pengelolaan data acara melalui tabel.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Gunakan fitur visibilitas kolom untuk memilih kolom mana
                            yang ingin Anda tampilkan atau sembunyikan, sehingga Anda dapat fokus pada informasi yang
                            relevan.</li>
                        <li><strong>Pencarian Data:</strong> Masukkan kata kunci pada kolom pencarian untuk menemukan tipe
                            acara tertentu berdasarkan nama atau catatan admin.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Tipe Acara" atau "Status"
                            untuk mengurutkan data dalam tabel berdasarkan kolom tersebut. Pengurutan ini membantu Anda
                            untuk meninjau data dengan lebih mudah dan teratur.</li>
                        <li><strong>Ubah Tipe Acara:</strong> Gunakan tombol <em>Ubah</em> pada kolom "Aksi" di setiap baris
                            untuk memperbarui informasi detail dari tipe acara yang telah ada.</li>
                        <li><strong>Tambah Tipe Acara Baru:</strong> Untuk menambahkan tipe acara baru, klik tombol
                            <em>+</em> di pojok kanan bawah. Anda akan diarahkan ke formulir untuk menambahkan data tipe
                            acara yang baru.</li>
                    </ul>
                    </p>



                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Tipe Acara</th>
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
                                    <td>
                                        <button 
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}" 
                                            data-id="{{ $item->id }}" 
                                            data-status="{{ $item->status }}"
                                            data-model="MEventType">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
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
            title="Tambah Tipe Acara Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')

@endsection
