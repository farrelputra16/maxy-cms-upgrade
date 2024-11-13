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
                        Di halaman ini, Anda dapat melihat dan mengelola semua tipe kemitraan yang tersedia. Setiap baris
                        menampilkan informasi penting seperti nama dan deskripsi. Gunakan fitur <b>visibilitas kolom,
                            pengurutan, dan pencarian kolom</b> untuk menemukan data yang dibutuhkan dengan cepat dan mudah.
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
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Nonaktif</a>
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
