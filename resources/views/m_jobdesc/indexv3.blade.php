@extends('layout.main-v3')

@section('title', 'Rincian Pekerjaan')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Rincian Pekerjaan</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Konten</a></li>
                        <li class="breadcrumb-item active">Rincian Pekerjaan</li>
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
                    <h4 class="card-title">Rincian Pekerjaan</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan rincian pekerjaan dalam format tabel interaktif, memungkinkan Anda untuk
                        mengelola data pekerjaan secara efisien. Setiap baris dalam tabel ini berisi informasi penting
                        seperti nama, deskripsi, dan status pekerjaan. Anda dapat menggunakan <b>fitur visibilitas kolom,
                            pengurutan, dan kolom pencarian</b> untuk menyesuaikan tampilan sesuai kebutuhan dan dengan
                        cepat menemukan informasi spesifik yang diperlukan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Klik ikon <b>+ Tambah</b> di sudut kanan bawah untuk menambahkan rincian pekerjaan baru.</li>
                        <li>Pada setiap baris, tombol <b>Ubah</b> memungkinkan Anda memperbarui informasi pekerjaan
                            tersebut.</li>
                        <li>Periksa kolom <b>Status</b> untuk melihat apakah pekerjaan dalam kondisi aktif atau nonaktif.
                        </li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> pada tabel
                            untuk memudahkan penyesuaian atau penyaringan data pekerjaan yang dibutuhkan.</li>
                    </ul>
                    </p>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Id</th>
                                                <th class="data-medium">Nama</th>
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
                                            @foreach ($MJobdesc as $key => $item)
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
                                                        <a href="{{ route('getEditJobdesc', ['id' => $item->id, 'access' => 'm_jobdesc_update']) }}"
                                                            class="btn btn-primary rounded">Ubah</a>
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

                    <div id="floating-whatsapp-button">
                        <a href="{{ route('getAddJobdesc') }}" target="_blank" data-toggle="tooltip"
                            title="Tambah Rincian Pekerjaan Baru">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                    <!-- FAB Add Ends -->
                @endsection

                @section('script')

                @endsection
