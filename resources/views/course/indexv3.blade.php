@extends('layout.main-v3')

@section('title', 'Kursus')

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
                        <li class="breadcrumb-item active">Kursus</li>
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
                    <h4 class="card-title">Kursus</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar kursus secara menyeluruh dalam format tabel interaktif yang dapat
                        diurutkan. Setiap baris berisi informasi penting seperti nama kursus, deskripsi, harga, tipe kursus,
                        dan status. Anda dapat menggunakan <b>fitur visibilitas kolom, pengurutan, dan pencarian kolom</b>
                        untuk menyesuaikan tampilan sesuai kebutuhan. <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Gunakan ikon <b>+ Tambah</b> untuk menambahkan kursus baru.</li>
                        <li>Klik <b>Edit</b> pada setiap baris untuk mengubah informasi kursus.</li>
                        <li>Pilih <b>Daftar Modul</b> untuk melihat daftar modul dari setiap kursus.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Kursus</th>
                                <th>Harga Promo</th>
                                <th>Harga</th>
                                <th>Jenis Kursus</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th class="data-long">Deskripsi Singkat</th>
                                <th class="data-long">Deskripsi</th>
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
                                        @switch($item->m_course_type_id)
                                            @case(1)
                                                Bootcamp
                                            @break

                                            @case(2)
                                                Rapid Onboarding
                                            @break

                                            @case(3)
                                                Mini Bootcamp
                                            @break

                                            @case(4)
                                                Hackathon
                                            @break

                                            @case(5)
                                                Prakerja
                                            @break

                                            @case(6)
                                                MSIB
                                            @break

                                            @case(7)
                                                Upskilling
                                            @break

                                            @default
                                                -
                                        @endswitch
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
                                        @if ($item->status == 1)
                                            <span class="btn btn-success" style="pointer-events: none;">Aktif</span>
                                        @else
                                            <span class="btn btn-danger" style="pointer-events: none;">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditCourse', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
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
                                <th>Nama Kursus</th>
                                <th>Harga Promo</th>
                                <th>Harga</th>
                                <th>Jenis Kursus</th>
                                <th>Deskripsi Singkat</th>
                                <th>Deskripsi</th>
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

    <!-- Tombol Tambah Kursus -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourse') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah Kursus -->
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
