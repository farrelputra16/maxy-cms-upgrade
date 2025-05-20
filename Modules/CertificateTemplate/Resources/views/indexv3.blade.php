@extends('layout.main-v3')

@section('title', 'Template Sertifikat')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Template Sertifikat</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Kelas</a></li>
                        <li class="breadcrumb-item active">Template Sertifikat</li>
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
                    <h4 class="card-title">Template Sertifikat</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar template sertifikat yang tersedia untuk mata kuliah. Setiap baris
                        dalam
                        tabel di bawah ini menyajikan informasi penting, termasuk jenis mata kuliah, kelas paralel, gambar
                        template,
                        status penanda, dan konten template. Gunakan fitur <b>visibilitas kolom, pengurutan, dan
                            pencarian</b> untuk mempermudah navigasi dan menemukan template yang Anda butuhkan dengan cepat.
                        Anda juga dapat melihat deskripsi lengkap dengan mengarahkan kursor pada teks yang terpotong.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Pengaturan Kolom:</strong> Klik header kolom untuk mengurutkan data, atau pilih kolom
                            yang ingin disembunyikan.</li>
                        <li><strong>Lihat Gambar Template:</strong> Tinjau pratinjau gambar template di kolom Gambar untuk
                            memastikan tampilannya sesuai.</li>
                        <li><strong>Ubah dan Hapus:</strong> Gunakan tombol <em>Ubah</em> untuk mengubah informasi template
                            atau <em>Hapus</em> untuk menghapus template.</li>
                        <li><strong>Tambah Template Baru:</strong> Klik tombol tambah di kanan bawah untuk menambahkan
                            template sertifikat baru ke dalam sistem.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getCertificateTemplateData') }}"
                        data-no-status="true"
                        data-colvis="[1, 5, 6, 7, 8]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Course Type - Parallel Class</th>
                                <th>Image</th>
                                <th>Content Template</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Course Type - Parallel Class</th>
                                <th>Image</th>
                                <th>Content Template</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('certificate-templates.create') }}" data-toggle="tooltip"
            title="Tambah Sertifikat">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->

@endsection

@section('script')
<script>
    const columns = [
        {
            data: "DT_RowIndex",
            name: "DT_RowIndex",
            orderable: false,
            searchable: false
        },
        {
            data: "id",
            name: "id"
        },
        {
            data: "type_mata_kuliah",
            name: "type_mata_kuliah",
            orderable: true,
            searchable: true
        },
        {
            data: "filename",
            name: "gambar",
            orderable: false,
            searchable: false
        },
        {
            data: "template_content",
            name: "template_content",
            orderable: true,
            searchable: true
        },
        {
            data: "created_at",
            name: "dibuat_pada",
            orderable: true,
            searchable: false
        },
        {
            data: "id_pembuat",
            name: "created_id",
            orderable: false,
            searchable: false
        },
        {
            data: "updated_at",
            name: "diperbarui_pada",
            orderable: true,
            searchable: false
        },
        {
            data: "id_pembaruan",
            name: "updated_id",
            orderable: false,
            searchable: false
        },
        {
            data: "action",
            name: "aksi",
            orderable: false,
            searchable: false
        }
    ];
</script>
@endsection
