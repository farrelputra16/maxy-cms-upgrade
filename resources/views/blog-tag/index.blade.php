@extends('layout.main-v3')

@section('title', 'Blog')

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
                        <li class="breadcrumb-item active">Tag Blog</li>
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

                    <h4 class="card-title">Data Tag Blog</h4>
                    <p class="card-title-desc">
                        Halaman ini berisi data tag blog yang akan digunakan untuk mengelompokkan artikel di halaman blog.
                        Setiap tag memiliki atribut seperti nama, warna, catatan admin, dan status aktif/non-aktif. Data tag
                        ditampilkan dalam tabel interaktif yang memudahkan navigasi dan pengelolaan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Kolom <b>Nama</b> dan <b>Warna</b> memudahkan Anda mengidentifikasi tag yang tersedia dan
                            visualisasi warnanya. Arahkan kursor pada nama tag untuk melihat nama lengkap melalui tooltip.
                        </li>
                        <li>Gunakan kolom <b>Catatan Admin</b> untuk melihat keterangan singkat tentang setiap tag, yang
                            menjelaskan kategori atau tujuan penggunaannya.</li>
                        <li>Kolom <b>Status</b> menunjukkan apakah tag aktif (dapat digunakan dalam artikel) atau non-aktif
                            (tidak ditampilkan).</li>
                        <li>Klik tombol <b>Ubah</b> di kolom Aksi untuk memperbarui informasi tag, seperti mengganti warna
                            atau mengubah status tag.</li>
                        <li>Untuk menambahkan tag baru, klik tombol tambah di sudut kanan bawah halaman ini.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> untuk
                            menemukan tag dengan cepat dan mengatur tampilan tabel sesuai kebutuhan.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Warna</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
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

                                    <td data-toggle="tooltip" data-placement="top" title="{{ $item->color }}">
                                        <div class="rounded w-25 h-100"
                                            style="color: {{ $item->color }}; background-color: {{ $item->color }}">-
                                        </div>
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
                                            data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                            data-model="MBlogTag">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('getEditBlogTag', ['id' => $item->id]) }}"
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
                                <th class="data-medium">Nama</th>
                                <th>Warna</th>
                                <th class="data-long">Catatan Admin</th>
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
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddBlogTag') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
@endsection

@section('script')

@endsection
