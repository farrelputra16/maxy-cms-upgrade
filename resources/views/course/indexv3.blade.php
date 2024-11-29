@extends('layout.main-v3')

@section('title', 'Mata Kuliah')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Mata Kuliah</li>
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
                    <h4 class="card-title">Mata Kuliah</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar mata kuliah dalam format tabel interaktif yang memudahkan Anda
                        mengelola
                        mata kuliah yang tersedia. Setiap mata kuliah mencakup informasi seperti nama, catatan admin, harga,
                        jenis mata kuliah,
                        SKS, durasi, dan status. Anda dapat menggunakan <b>fitur visibilitas kolom, pengurutan, dan
                            pencarian kolom</b> untuk menyesuaikan tampilan sesuai kebutuhan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Klik ikon <b>+ Tambah</b> di sudut kanan bawah untuk menambahkan mata kuliah baru.</li>
                        <li>Pada setiap baris, tombol <b>Ubah</b> memungkinkan Anda memperbarui informasi mata kuliah,
                            sementara
                            tombol <b>Daftar Modul</b> mengarahkan Anda ke daftar modul terkait mata kuliah tersebut.</li>
                        <li>Periksa kolom <b>Status</b> untuk melihat apakah mata kuliah dalam kondisi aktif atau nonaktif,
                            yang
                            mempengaruhi ketersediaan mata kuliah bagi pengguna.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> pada tabel
                            untuk menampilkan atau menyaring data mata kuliah dengan cepat sesuai kebutuhan.</li>
                    </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Mata Kuliah</th>
                                <th>Harga Promo</th>
                                <th>Harga</th>
                                <th>Jenis Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th class="data-long">Deskripsi Pratinjau</th>
                                <th class="data-long">Catatan Admin</th>
                                <th class="data-long">Konten</th>
                                <th>Dibuat Pada</th>
                                <th>Diperbarui Pada</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>{{ $item->fake_price ? 'Rp ' . number_format($item->fake_price, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $item->price ? 'Rp ' . number_format($item->price, 0, ',', '.') : '-' }}</td>
                                    <td>
                                        {{ $item->type->name }}
                                    </td>
                                    <td>{{ $item->credits }}</td>
                                    <td>{{ sprintf('%02d:00:00', $item->duration) }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->short_description) !!}">
                                        {{ !empty($item->short_description) ? \Str::limit(strip_tags($item->short_description), 30) : '-' }}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {{ !empty($item->description) ? \Str::limit(strip_tags($item->description), 30) : '-' }}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->content) !!}">
                                        {{ !empty($item->content) ? \Str::limit(strip_tags($item->content), 30) : '-' }}
                                    </td>
                                    <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                                    <td>{{ $item->updated_at->format('Y-m-d H:i') }}</td>
                                    <td>
                                        <button 
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}" 
                                            data-id="{{ $item->id }}" 
                                            data-status="{{ $item->status }}"
                                            data-model="Course">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditCourse', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}"
                                            class="btn btn-outline-primary rounded-end">Daftar Modul</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Harga Promo</th>
                                <th>Harga</th>
                                <th>Jenis Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th>Deskripsi Pratinjau</th>
                                <th>Catatan Admin</th>
                                <th>Konten</th>
                                <th>Dibuat Pada</th>
                                <th>Diperbarui Pada</th>
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

    <!-- Tombol Tambah Mata kuliah -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourse') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah Mata kuliah -->
@endsection

@section('script')
    <!-- Tambahkan skrip kustom di sini jika diperlukan -->
    @if (session('course_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Informasi!',
                    html: "<strong>{{ session('course_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif
@endsection
