@extends('layout.main-v3')

@section('title', 'Jurnal Modul Kelas Kursus')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Entri Jurnal untuk {{ $parent_module->detail->name }}</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Kelas</a></li>
                        <li class="breadcrumb-item"><a>Daftar Modul</a></li>
                        <li class="breadcrumb-item">Konten: {{ $parent_module->detail->name }}</li>
                        <li class="breadcrumb-item active">Jurnal</li>
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
                    <h4 class="card-title">Entri Jurnal: Modul Anak dari {{ $parent_module->detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk melihat dan mengelola entri jurnal yang terkait dengan setiap
                        modul anak dalam kelas kursus ini. Setiap entri mencakup detail seperti nama penulis, catatan, dan
                        status. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian</b> untuk menyesuaikan
                        tampilan dan menemukan entri tertentu dengan cepat. Misalnya, Anda dapat mengurutkan data dengan
                        mengklik header kolom atau menggunakan fitur tooltip untuk melihat deskripsi penuh.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Lihat Detail:</strong> Arahkan kursor ke catatan yang terpotong untuk melihat catatan
                            penuh dari entri jurnal.</li>
                        <li><strong>Tambah Tanggapan:</strong> Gunakan tombol <em>Balas</em> di kolom Aksi untuk menambahkan
                            tanggapan atau catatan tambahan pada entri.</li>
                        <li><strong>Hapus/Pulihkan Entri:</strong> Klik tombol <em>Hapus</em> atau <em>Pulihkan</em> untuk
                            mengubah status entri.</li>
                        <li><strong>Pengelolaan Status:</strong> Gunakan tombol <em>Terima</em> atau <em>Tolak</em> untuk
                            menyetujui atau menolak entri jurnal.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-long">Catatan</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="batch" scope="row">{{ $item->User->name }}</td>
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
                                            <a class="btn btn-danger" style="pointer-events: none;">Tidak Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getAddJournalCourseClassChildModule', ['id' => $item->id, 'user_id' => $item->User->id, 'course_class_module_id' => $parent_module->id]) }}"
                                            class="btn btn-primary rounded">Balas</a>
                                        @if ($item->status == 1)
                                            <button type="button" class="btn btn-danger delete-button"
                                                data-id="{{ $item->id }}"
                                                data-course_class_module_id="{{ $parent_module->id }}">
                                                Hapus
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success delete-button"
                                                data-id="{{ $item->id }}"
                                                data-course_class_module_id="{{ $parent_module->id }}">
                                                Pulihkan
                                            </button>
                                        @endif
                                        <form
                                            action="{{ route('postRejectJournalCourseClassChildModule', ['id' => $item->id, 'course_class_module_id' => $parent_module->id]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @if ($item->status == 1)
                                                <button type="submit" class="btn btn-danger">Tolak</button>
                                            @else
                                                <button type="submit" class="btn btn-success">Terima</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Catatan</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Hapus Entri Jurnal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus entri jurnal ini? Tindakan ini tidak dapat dibatalkan.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="confirm-delete">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('script')

    <script>
        // Dengar klik pada elemen dengan class 'delete-button'
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                // Dapatkan ID dan course_class_module_id dari atribut data button yang diklik
                let id = this.getAttribute('data-id');
                let course_class_module_id = this.getAttribute('data-course_class_module_id');

                // Tampilkan modal konfirmasi
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                confirmationModal.show();

                // Tangani tombol konfirmasi hapus di dalam modal
                document.getElementById('confirm-delete').addEventListener('click', function() {
                    // Kirim permintaan saat pengguna mengkonfirmasi
                    fetch('/courseclassmodule/child/journal/delete', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                id: id,
                                course_class_module_id: course_class_module_id
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                confirmationModal.hide();
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Entri jurnal berhasil dihapus/dipulihkan.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Gagal menghapus entri jurnal. Coba lagi.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan. Silakan coba lagi.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        });
                });
            });
        });
    </script>

@endsection
