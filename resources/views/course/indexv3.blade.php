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


                    @if (env('APP_ENV')=='local')
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-server-processing="true" data-url="{{ route('getCourseData') }}" data-colvis="[-3, -4, -5, -6, -12]">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th class="data-long">Nama Mata Kuliah</th>
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
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th class="">Nama Mata Kuliah</th>
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
                    @else
                        <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-server-processing="true" data-url="{{ route('getCourseData') }}" data-colvis="[-3, -4, -5, -6, -11, -12, -15]">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th class="data-long">Nama Mata Kuliah</th>
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
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Id</th>
                                    <th class="">Nama Mata Kuliah</th>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

    <!-- Tombol Tambah Mata kuliah -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'course_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourse') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- Akhir Tombol Tambah Mata kuliah -->
@endsection

@section('script')
    <script>
        @if (env('APP_ENV')=='local')
            const columns = [
                { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
                { data: "id", name: "id" },
                { data: "name", name: "name", orderable: true, searchable: true },
                { data: "m_course_type_id", name: "m_course_type_id", orderable: true, searchable: true },
                { data: "credits", name: "credits", orderable: true, searchable: true },
                { data: "duration", name: "duration", orderable: true, searchable: true },
                { data: "short_description", name: "short_description", orderable: true, searchable: true },
                { data: "description", name: "description", orderable: true, searchable: true },
                { data: "content", name: "content", orderable: true, searchable: true },
                { data: "created_at", name: "created_at" },
                { data: "updated_at", name: "updated_at" },
                { data: "status", name: "status", orderable: true, searchable: true },
                { data: "action", name: "action", orderable: false, searchable: false },
            ];
        @else
            const columns = [
                { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
                { data: "id", name: "id" },
                { data: "name", name: "name", orderable: true, searchable: true },
                { data: "fake_price", name: "fake_price", orderable: true, searchable: true },
                { data: "price", name: "price", orderable: true, searchable: true },
                { data: "m_course_type_id", name: "m_course_type_id", orderable: true, searchable: true },
                { data: "credits", name: "credits", orderable: true, searchable: true },
                { data: "duration", name: "duration", orderable: true, searchable: true },
                { data: "short_description", name: "short_description", orderable: true, searchable: true },
                { data: "description", name: "description", orderable: true, searchable: true },
                { data: "content", name: "content", orderable: true, searchable: true },
                { data: "created_at", name: "created_at" },
                { data: "updated_at", name: "updated_at" },
                { data: "status", name: "status", orderable: true, searchable: true },
                { data: "action", name: "action", orderable: false, searchable: false },
            ];
        @endif
    </script>
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
