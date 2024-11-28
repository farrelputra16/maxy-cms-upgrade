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
                        Setiap baris dalam tabel ini berisi informasi penting mengenai kelas, termasuk kelas paralel, tipe,
                        tanggal mulai dan selesai, kuota, SKS, durasi, dan status kelas.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom dan Pengurutan:</strong> Atur tampilan dengan mengurutkan kolom
                            tertentu untuk mempermudah pencarian data spesifik. Anda juga bisa menggunakan bilah pencarian
                            untuk mencari kelas tertentu berdasarkan nama, kelas paralel, atau tipe.</li>
                        <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
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
                                <th>Kelas Paralel</th>
                                <th>Tipe</th>
                                <th>Berjalan</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Kuota</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th>Pengumuman</th>
                                <th>Konten</th>
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
                            @foreach ($course_list as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->course_name }} Kelas Paralel {{ $item->batch }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        @if ($item->status_ongoing == 0)
                                            <span class="badge bg-secondary" style="pointer-events: none;">Belum
                                                Dimulai</span>
                                        @elseif ($item->status_ongoing == 1)
                                            <span class="badge bg-success" style="pointer-events: none;">Sedang
                                                Berlangsung</span>
                                        @elseif ($item->status_ongoing == 2)
                                            <span class="badge bg-primary" style="pointer-events: none;">Sudah
                                                Selesai</span>
                                        @else
                                            <span class="badge bg-danger" style="pointer-events: none;">Status Tidak
                                                Diketahui</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>{{ $item->quota }}</td>
                                    <td>{{ $item->semester }}</td>
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
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non Aktif</span>
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

                                            <form id="delete-course-class-form-{{ $item->id }}"
                                                action="{{ route('deleteCourseClass', ['id' => $item->id]) }}"
                                                method="POST"
                                                class="d-inline-block"
                                                data-course-name="{{ $item->course_name }}">
                                              @method('DELETE')
                                              @csrf
                                              <button type="button" class="btn btn-sm btn-danger delete-course-class-btn">Hapus</button>
                                          </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Kelas Paralel</th>
                                <th>Tipe</th>
                                <th>Berjalan</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Kuota</th>
                                <th>Semester</th>
                                <th>SKS</th>
                                <th>Durasi</th>
                                <th>Pengumuman</th>
                                <th>Konten</th>
                                <th>Catatan Admin</th>
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

<script>
    $(document).ready(function () {
        // Handle delete confirmation
        $('.delete-course-class-btn').on('click', function () {
            const formId = $(this).closest('form').attr('id');
            const courseName = $(this).closest('form').data('course-name');

            Swal.fire({
                title: `Apakah Anda yakin akan menghapus kelas <strong>${courseName}</strong>?`,
                html: `
                    <p>Tindakan ini akan:</p>
                    <ul class="text-start">
                        <li><strong>Menghapus</strong> seluruh mahasiswa yang tergabung dalam kelas ini</li>
                        <li><strong>Menghapus</strong> seluruh modul dalam kelas ini</li>
                        <li><strong>Menghapus</strong> seluruh absensi dalam kelas ini</li>
                        <li><strong>Menghapus</strong> seluruh penilaian dalam kelas ini</li>
                    </ul>
                    <p class="text-danger"><strong>Tindakan ini tidak dapat dipulihan!</strong></p>
                `,
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Saya Mengerti',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form programmatically
                    $(`#${formId}`).submit();
                }
            });
        });
    });
</script>

@endsection
