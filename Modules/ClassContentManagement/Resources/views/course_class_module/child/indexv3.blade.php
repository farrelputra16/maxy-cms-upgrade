@extends('layout.main-v3')

@section('title', 'Sub Modul Kelas Child')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Sub Modul untuk Modul Kelas</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Daftar Kelas</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassModule', ['id' => $parent_module->course_class_id]) }}">Modul
                                Kelas</a></li>
                        <li class="breadcrumb-item active">Sub Modul Kelas: {{ $parent_module->detail->name }}</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sub Modul dalam: {{ $parent_module->detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan tampilan terorganisir dari semua modul anak yang termasuk dalam modul utama
                        ini. Setiap baris menampilkan detail utama, seperti nama modul, prioritas, tipe, konten, materi
                        mata kuliah, dan jadwal. Gunakan fitur <b>pengaturan kolom, pengurutan, dan pencarian</b> untuk
                        menyesuaikan tampilan sesuai kebutuhan dan menemukan modul tertentu dengan cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Atur Kolom:</strong> Gunakan pengurutan di header kolom untuk mengelompokkan data
                            berdasarkan hari atau tanggal.</li>
                        <li><strong>Lihat Catatan Admin Lengkap:</strong> Arahkan kursor ke catatan admin yang terpotong
                            untuk
                            melihat konten penuh.</li>
                        <li><strong>Ubah Modul:</strong> Klik tombol <em>Ubah</em> pada kolom “Aksi” untuk memperbarui
                            informasi modul yang ada.</li>
                        <li><strong>Kelola Jurnal:</strong> Tombol <em>Kelola Jurnal</em> memungkinkan Anda mengakses jurnal
                            terkait modul.</li>
                        <li><strong>Tambah Modul:</strong> Gunakan ikon <em>Tambah Modul Anak (+)</em> di kanan bawah untuk
                            menambahkan modul anak baru ke dalam modul ini.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getCourseClassChildModuleData') }}"
                        data-colvis="[1, -3, -4, -5, -6]"
                        data-id="{{ $parent_module->id}}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Modul Mata Kuliah</th>
                                <th>Prioritas</th>
                                <th>Tipe</th>
                                <th class="data-long">Konten</th>
                                <th class="data-long">Materi Mata Kuliah</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaru</th>
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
                                <th>Modul Mata Kuliah</th>
                                <th>Prioritas</th>
                                <th>Tipe</th>
                                <th>Konten</th>
                                <th>Materi Mata Kuliah</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaru</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'course_class_module_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseClassChildModule', ['id' => $parent_module->id]) }}"
            data-toggle="tooltip" title="Tambah Modul Anak">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- FAB Add Ends -->
@endsection

@section('script')
<script>
    const columns = [
            { 
                data: 'DT_RowIndex', 
                name: 'DT_RowIndex', 
                orderable: false, 
                searchable: false 
            },
            { data: 'id', name: 'id' },
            { 
                data: 'course_module_name', 
                name: 'course_module_name',
                render: function(data) {
                    return '<span class="batch" scope="row">' + data + '</span>';
                }
            },
            { 
                data: 'priority', 
                name: 'priority',
                render: function(data) {
                    return '<span data-toggle="tooltip" data-placement="top" title="Urutan prioritas dalam modul">' + data + '</span>';
                }
            },
            { 
                data: 'type', 
                name: 'cm.type',
                render: function(data) {
                    return data;
                }
            },
            { 
                data: 'content', 
                name: 'cm.content',
                render: function(data) {
                    return data ? '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' + data + '">' + (data.length > 30 ? data.substr(0, 30) + '...' : data) + '</span>' : '-';
                }
            },
            { 
                data: 'course_module_material', 
                name: 'cm.material',
                render: function(data) {
                    return data ? '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' + data + '">' + (data.length > 30 ? data.substr(0, 30) + '...' : data) + '</span>' : '-';
                }
            },
            { data: 'start_date', name: 'start_date' },
            { data: 'end_date', name: 'end_date' },
            { 
                data: 'description', 
                name: 'description'
            },
            { data: 'created_at', name: 'created_at' },
            { data: 'created_id', name: 'created_id' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'updated_id', name: 'updated_id' },
            { 
                data: 'status', 
                name: 'status'
            },
            { 
                data: 'action', 
                name: 'action', 
                orderable: false, 
                searchable: false 
            }
        ]
</script>
@endsection
