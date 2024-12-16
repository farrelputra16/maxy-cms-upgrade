@extends('layout.main-v3')

@section('title', 'Jurnal Modul Kelas Mata Kuliah')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Entri Jurnal untuk {{ $parent_module->detail->name }}</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassModule', ['id' => $parent_module->course_class_id]) }}">Modul
                                Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassChildModule', ['id' => $child_parent_module->id]) }}">Sub
                                Modul Kelas</a></li>
                        <li class="breadcrumb-item active">Jurnal: {{ $parent_module->detail->name }}</li>
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
                        modul anak dalam kelas mata kuliah ini. Setiap entri mencakup detail seperti nama penulis, komentar,
                        dan
                        status. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian</b> untuk menyesuaikan
                        tampilan dan menemukan entri tertentu dengan cepat. Misalnya, Anda dapat mengurutkan data dengan
                        mengklik header kolom atau menggunakan fitur tooltip untuk melihat deskripsi penuh.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Lihat Detail:</strong> Arahkan kursor ke komentar yang terpotong untuk melihat komentar
                            penuh dari entri jurnal.</li>
                        <li><strong>Tambah Tanggapan:</strong> Gunakan tombol <em>Balas</em> di kolom Aksi untuk menambahkan
                            tanggapan atau komentar tambahan pada entri.</li>
                        <li><strong>Hapus/Tunjukkan Entri:</strong> Klik tombol <em>Hapus</em> atau <em>Tunjukkan</em> untuk
                            mengubah status entri.</li>
                        <li><strong>Pengelolaan Status:</strong> Gunakan tombol <em>Terima</em> atau <em>Tolak</em> untuk
                            menyetujui atau menolak entri jurnal.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getJournalCourseClassChildModuleData') }}"
                        data-colvis="[1, -3, -4, -5]"
                        data-no-status="true"
                        data-id="{{ $parent_module->id}}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-long">Komentar</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Komentar</th>
                                <th>Dibuat Pada</th>
                                <th>Dibuat Oleh</th>
                                <th>Diperbarui Pada</th>
                                <th>Diperbarui Oleh</th>
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
                                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Tindakan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="confirmationModalBody">
                                    <!-- Isi modal akan dinamis berdasarkan tombol yang diklik -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" id="confirm-action">Lanjutkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('script')
    <script>
        // Dengarkan klik pada elemen dengan class 'hide-button'
        document.addEventListener('click', function() {
            const hidebutton = event.target.closest('.hide-button');
            if (hidebutton) {
                // Dapatkan ID, course_class_module_id, dan status dari atribut data button yang diklik
                let id = hidebutton.getAttribute('data-id');
                let course_class_module_id = hidebutton.getAttribute('data-course_class_module_id');
                let status = hidebutton.innerText.trim().toLowerCase(); // Ambil teks tombol (sembunyikan/tunjukkan)

                // Tampilkan modal konfirmasi
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                confirmationModal.show();

                // Ubah isi modal dinamis sesuai tindakan
                const modalTitle = document.getElementById('confirmationModalLabel');
                const modalBody = document.getElementById('confirmationModalBody');
                const confirmButton = document.getElementById('confirm-action');

                if (status === 'sembunyikan') {
                    modalTitle.innerText = 'Konfirmasi Sembunyikan';
                    modalBody.innerText =
                        'Apakah Anda yakin ingin menyembunyikan entri jurnal ini? Tindakan ini tidak dapat dibatalkan.';
                    confirmButton.innerText = 'Sembunyikan';
                } else {
                    modalTitle.innerText = 'Konfirmasi Tunjukkan';
                    modalBody.innerText = 'Apakah Anda yakin ingin menampilkan kembali entri jurnal ini?';
                    confirmButton.innerText = 'Tunjukkan';
                }

                // Tangani tombol konfirmasi di dalam modal
                confirmButton.onclick = function() {
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
                            confirmationModal.hide();
                            if (data.success) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: `Entri jurnal berhasil ${status === 'sembunyikan' ? 'disembunyikan' : 'ditampilkan kembali'}.`,
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
                                    text: `Gagal ${status === 'sembunyikan' ? 'menyembunyikan' : 'menampilkan'} entri jurnal. Coba lagi.`,
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
                };
            }
        });
    </script>
    <script>
        const columns = [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'id', name: 'id' },
                    { data: 'user_name', name: 'user_name' },
                    { data: 'description', name: 'description' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'created_id', name: 'created_id' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'updated_id', name: 'updated_id' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
    </script>
@endsection
