@extends('layout.main-v3')

@section('title', 'Mitra')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Mitra</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Mitra</li>
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
                    <h4 class="card-title">Daftar Mitra</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar mitra dalam format tabel interaktif yang memudahkan Anda mengelola
                        data mitra yang terdaftar. Setiap baris tabel berisi informasi detail seperti nama partner, logo,
                        tipe, alamat, kontak, deskripsi, dan status. Anda bisa menggunakan <b>fitur visibilitas kolom,
                            pencarian, dan pengurutan</b> untuk menyesuaikan tampilan data sesuai kebutuhan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Klik ikon <b>+ Tambah</b> di sudut kanan bawah untuk menambahkan mitra baru.</li>
                        <li>Pada setiap baris, tombol <b>Ubah</b> memungkinkan Anda memperbarui informasi mitra tersebut.
                        </li>
                        <li>Periksa kolom <b>Status</b> dan <b>Status Sorotan</b> untuk melihat apakah mitra dalam kondisi
                            aktif atau nonaktif.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> pada tabel
                            untuk memudahkan penyesuaian atau penyaringan data mitra yang Anda butuhkan.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Partner</th>
                                <th>Logo</th>
                                <th>Tipe</th>
                                <th>URL</th>
                                <th class="data-medium">Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Kontak Person</th>
                                <th>Status Sorotan</th>
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
                            @foreach ($partners as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>

                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>

                                    <td>
                                        <img src="{{ asset('uploads/partner/' . $item->logo) }}" alt="Logo Mitra"
                                            style="max-width: 200px; max-height: 150px;">
                                    </td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ \Str::limit($item->url, 20) }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->address) !!}">
                                        {!! !empty($item->address) ? \Str::limit($item->address, 30) : '-' !!}
                                    </td>
                                    <td data-toggle="tooltip" data-placement="top" title="{!! strip_tags($item->phone) !!}">
                                        {!! !empty($item->phone) ? \Str::limit($item->phone, 30) : '-' !!}
                                    <td data-toggle="tooltip" data-placement="top" title="{!! strip_tags($item->email) !!}">
                                        {!! !empty($item->email) ? \Str::limit($item->email, 30) : '-' !!}
                                    <td data-toggle="tooltip" data-placement="top" title="{!! strip_tags($item->contact_person) !!}">
                                        {!! !empty($item->contact_person) ? \Str::limit($item->contact_person, 30) : '-' !!}
                                    <td>
                                        @if ($item->status_highlight == 1)
                                            <button class="btn btn-success" style="pointer-events: none;">Aktif</button>
                                        @else
                                            <button class="btn btn-danger" style="pointer-events: none;">Nonaktif</button>
                                        @endif
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
                                        <a href="{{ route('getEditPartner', ['id' => $item->id]) }}"
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
                                <th>Logo</th>
                                <th>Tipe</th>
                                <th>URL</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Kontak Person</th>
                                <th>Status Sorotan</th>
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
        <a href="{{ route('getAddPartner') }}" target="_blank" data-toggle="tooltip" title="Tambah Mitra Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')

@endsection
