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
                        Halaman ini menyajikan ringkasan data secara komprehensif, ditampilkan dalam format DataTable
                        interaktif yang dapat diurutkan. Setiap baris mewakili data unik, memberikan detail seperti nama,
                        deskripsi, dan status. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk
                        menyesuaikan tampilan dan mengakses informasi spesifik dengan cepat.
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
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('getEditScore', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Edit</a>
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
