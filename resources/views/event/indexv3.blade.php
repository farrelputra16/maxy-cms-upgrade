@extends('layout.main-v3')

@section('title', 'Acara')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Event</li>
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
                    <h4 class="card-title">Acara</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan data lengkap dari semua event atau kegiatan yang terdaftar dalam tabel
                        interaktif. Setiap baris berisi informasi penting, seperti nama acara, tanggal, catatan admin, serta
                        status publikasi dan verifikasi. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian
                            kolom</b> untuk menyesuaikan tampilan dan menemukan acara yang Anda butuhkan dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Sesuaikan kolom yang terlihat untuk memfokuskan pada data tertentu.
                        </li>
                        <li><strong>Urutkan & Cari:</strong> Klik judul kolom untuk mengurutkan data atau gunakan pencarian
                            untuk menemukan acara berdasarkan kata kunci.</li>
                        <li><strong>Ubah & Akses Kehadiran:</strong> Gunakan tombol di kolom “Aksi” untuk mengubah detail
                            event, memeriksa kehadiran, atau mengelola persyaratan.</li>
                        <li><strong>Tambah Acara:</strong> Klik ikon <em>Tambah</em> di kanan bawah untuk menambahkan acara
                            baru.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th>Gambar</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Verifikasi</th>
                                <th>Publik</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>

                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/event/' . $item->image) }}" alt="Image"
                                            style="max-width: 200px; max-height: 150px;">
                                    </td>
                                    <td>{{ $item->date_start }}</td>
                                    <td>{{ $item->date_end }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>
                                        @if ($item->is_need_verification == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Ya</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Tidak</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_public == 1)
                                            <a class="btn btn-success" style="text-decoration: none;">Ya</a>
                                        @else
                                            <a class="btn btn-danger" style="text-decoration: none;">Tidak</a>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        <button
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}"
                                            data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                            data-model="Event">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditEvent', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getAttendanceEvent', ['id' => $item->id]) }}"
                                            class="btn btn-info">Kehadiran</a>
                                        <a href="{{ route('getEventRequirement', ['id' => $item->id]) }}"
                                            class="btn btn-secondary">Persyaratan</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Module Name</th>
                                <th>Image</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Description</th>
                                <th>Need verification</th>
                                <th>Public</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddEvent') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
