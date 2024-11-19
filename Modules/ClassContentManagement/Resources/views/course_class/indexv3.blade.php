@extends('layout.main-v3')

@section('title', 'Daftar Kelas')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Manajemen Kelas</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Daftar Kelas</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Mulai Konten -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Kelas</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola dan memantau data kelas yang tersedia di platform.
                        Setiap baris dalam tabel ini berisi informasi penting mengenai kelas, termasuk angkatan, tipe,
                        tanggal mulai dan selesai, kuota, SKS, durasi, dan status kelas.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom dan Pengurutan:</strong> Atur tampilan dengan mengurutkan kolom
                            tertentu untuk mempermudah pencarian data spesifik. Anda juga bisa menggunakan bilah pencarian
                            untuk mencari kelas tertentu berdasarkan nama, angkatan, atau tipe.</li>
                        <li><strong>Edit Data:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
                            informasi kelas.</li>
                        <li><strong>Modul dan Mahasiswa:</strong> Gunakan tombol <em>Modul</em> untuk mengelola modul, dan
                            tombol <em>Mahasiswa</em> untuk melihat daftar peserta di kelas tersebut.</li>
                        <li><strong>Absensi dan Penilaian:</strong> Tombol <em>Absensi</em> memungkinkan Anda memantau
                            kehadiran peserta, sementara tombol <em>Penilaian</em> membantu mengakses penilaian atau nilai
                            yang diberikan dalam kelas tersebut.</li>
                        <li><strong>Tambah atau Duplikasi Kelas:</strong> Gunakan ikon <em>Tambah</em> di kanan bawah untuk
                            menambah kelas baru atau ikon <em>Duplikat</em> untuk menggandakan kelas yang sudah ada dengan
                            pengaturan yang sama.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Angkatan</th>
                                <th>Tipe</th>
                                <th>Berjalan</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Kuota</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th>Pengumuman</th>
                                <th>Konten</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course_list as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->course_name }} Batch {{ $item->batch }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        @if ($item->status_ongoing == 0)
                                            <span class="btn btn-secondary" style="pointer-events: none;">Belum
                                                Dimulai</span>
                                        @elseif ($item->status_ongoing == 1)
                                            <span class="btn btn-success" style="pointer-events: none;">Sedang
                                                Berlangsung</span>
                                        @elseif ($item->status_ongoing == 2)
                                            <span class="btn btn-primary" style="pointer-events: none;">Sudah Selesai</span>
                                        @else
                                            <span class="btn btn-danger" style="pointer-events: none;">Status Tidak
                                                Diketahui</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->quota }}</td>
                                    <td>{{ $item->credits }}</td>
                                    <td>{{ sprintf('%02d:00:00', $item->duration) }}</td>
                                    <td class="data-long" data-toggle="tooltip"
                                        title="{{ strip_tags($item->announcement) }}">
                                        {{ \Str::limit(strip_tags($item->announcement), 30, '...') }}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" title="{{ strip_tags($item->content) }}">
                                        {{ \Str::limit(strip_tags($item->content), 30, '...') }}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip"
                                        title="{{ strip_tags($item->description) }}">
                                        {{ \Str::limit(strip_tags($item->description), 30, '...') }}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="btn btn-success" style="pointer-events: none;">Aktif</span>
                                        @else
                                            <span class="btn btn-danger" style="pointer-events: none;">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditCourseClass', ['id' => $item->id]) }}"
                                            class="btn btn-primary btn-sm">Ubah</a>
                                        <a href="{{ route('getCourseClassModule', ['id' => $item->id]) }}"
                                            class="btn btn-info btn-sm">Modul</a>
                                        <a href="{{ route('getCourseClassMember', ['id' => $item->id]) }}"
                                            class="btn btn-info btn-sm">Mahasiswa</a>
                                        <a href="{{ route('getCourseClassAttendance', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary btn-sm">Absensi</a>
                                        <a href="{{ route('getCourseClassScoring', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary btn-sm">Penilaian</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Angkatan</th>
                                <th>Tipe</th>
                                <th>Berjalan</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Kuota</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th>Pengumuman</th>
                                <th>Konten</th>
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

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button" style='margin-bottom: 5%;'>
        <a href="{{ route('getAddCourseClass') }}" target="_blank" data-toggle="tooltip" title="Add New Course Class">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <div id="floating-whatsapp-button">
        <a href="{{ route('getDuplicateCourseClass') }}" target="_blank" data-toggle="tooltip"
            title="Duplicate Course Class">
            <i class="fa-solid fa-copy"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

        @if (session('class_added'))
            Swal.fire({
                title: 'Informasi',
                text: "{{ session('class_added') }}",
                icon: 'info',
                confirmButtonText: 'OK',
            });
        @endif
    </script>
@endsection
