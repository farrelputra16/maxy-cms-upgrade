@extends('layout.main-v3')

@section('title', 'Jenis Mata Kuliah')

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
                        <li class="breadcrumb-item active">Jenis Mata Kuliah</li>
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
                    <h4 class="card-title">Jenis Mata Kuliah</h4>
                    <div class="card-title-desc">
                        <p>
                            Halaman ini memberikan tampilan menyeluruh tentang jenis-jenis mata kuliah yang tersedia di
                            sistem. Setiap jenis mata kuliah dicantumkan bersama informasi detail seperti nama, slug,
                            catatan admin, dan status aktif/non-aktif.
                            <br><br>
                            <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Cari Jenis Mata Kuliah:</strong> Gunakan kolom pencarian untuk menemukan jenis mata
                                kuliah tertentu berdasarkan nama atau slug untuk navigasi yang cepat.</li>
                            <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Jenis Mata Kuliah"
                                atau "Status" untuk mengurutkan data, misalnya berdasarkan nama atau status aktif/non-aktif.
                            </li>
                            <li><strong>Ubah Informasi:</strong> Tekan tombol <em>Ubah</em> pada kolom Aksi untuk
                                memperbarui informasi jenis mata kuliah, termasuk nama, catatan admin, dan status.</li>
                            <li><strong>Tambah Jenis Mata Kuliah Baru:</strong> Klik tombol <em>+</em> di pojok kanan bawah
                                halaman untuk menambahkan jenis mata kuliah baru ke dalam daftar.</li>
                        </ul>
                        </p>
                    </div>

                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getMCourseTypeData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th class="data-medium">Nama Jenis Mata Kuliah</th>
                            <th>Slug</th>
                            <th class="data-long">Catatan Admin</th>
                            <th>Created At</th>
                            <th>Created Id</th>
                            <th>Updated At</th>
                            <th>Updated Id</th>
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
                            <th class="data-medium">Nama Jenis Mata Kuliah</th>
                            <th>Slug</th>
                            <th class="data-long">Catatan Admin</th>
                            <th>Created At</th>
                            <th>Created Id</th>
                            <th>Updated At</th>
                            <th>Updated Id</th>
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
        <a href="{{ route('getAddCourseType', ['access' => 'm_course_type_create']) }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
        { data: "slug", name: "slug", orderable: true, searchable: true },
        { data: "description", name: "description", orderable: true, searchable: true },
        { data: "created_at", name: "created_at", orderable: true, searchable: false },
        { data: "created_id", name: "created_id", orderable: false, searchable: false },
        { data: "updated_at", name: "updated_at", orderable: true, searchable: false },
        { data: "updated_id", name: "updated_id", orderable: false, searchable: false },
        { data: "status", name: "status", orderable: true, searchable: true },
        { data: "action", name: "action", orderable: false, searchable: false },
    ];
</script>
@endsection
