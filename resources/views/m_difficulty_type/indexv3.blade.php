@extends('layout.main-v3')

@section('title', 'Tingkat Kesulitan')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Tingkat Kesulitan </li>
                    </ol>
                </div>
                <!-- end breadcrumb -->
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- begin content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Tingkat Kesulitan Mata Kuliah</h4>
                    <div class="card-title-desc">
                        <p>
                            Halaman ini memberikan ringkasan tentang tingkat kesulitan yang terkait dengan setiap
                            mata kuliah. Pengguna dapat melihat berbagai level kesulitan yang tersedia beserta deskripsi
                            masing-masing. Tingkat kesulitan membantu mengatur ekspektasi peserta terhadap materi dan
                            kompleksitas yang akan dihadapi.
                            <br><br>
                            <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Nama Tingkat Kesulitan:</strong> Lihat nama tingkat kesulitan untuk setiap
                                mata kuliah yang ditampilkan di tabel ini.</li>
                            <li><strong>Deskripsi Tingkat Kesulitan:</strong> Bacalah deskripsi singkat tentang kesulitan
                                dari setiap tingkat, yang mencakup gambaran umum dari materi atau tantangan yang akan
                                dihadapi peserta.</li>
                            <li><strong>Tambah Tingkat Kesulitan:</strong> Klik tombol <em>Tambah Tingkat Kesulitan</em>
                                (ikon +) di pojok kanan bawah untuk menambahkan tingkat kesulitan baru ke dalam daftar.</li>
                            <li><strong>Ubah Tingkat Kesulitan:</strong> Tekan tombol <em>Ubah</em> pada kolom "Aksi" untuk
                                memperbarui atau menyesuaikan informasi tingkat kesulitan yang ada.</li>
                        </ul>
                        </p>
                    </div>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Tingkat Kesulitan</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mDifficulties as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
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
                                            <a href="{{ route('getEditDifficultyType', ['id' => $item->id, 'access' => 'm_difficulty_type_update']) }}"
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
                                <th class="data-medium">Nama Tingkat Kesulitan</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddDifficultyType', ['access' => 'm_difficulty_type_create']) }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
@endsection

@section('script')

@endsection
