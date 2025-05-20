@extends('layout.main-v3')

@section('title', 'Jenis Proposal')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Jenis Proposal</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Jenis Proposal</li>
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
                    <h4 class="card-title">Jenis Proposal</h4>
                    <div class="card-title-desc">
                        <p>
                            Halaman ini menyediakan daftar semua jenis proposal yang ada dalam bentuk tabel interaktif.
                            Setiap baris menampilkan informasi kunci, seperti nama jenis proposal, catatan admin singkat, status
                            aktif atau nonaktif, serta data terkait pembuat dan pembaruan. <br><br>

                            <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Visibilitas Kolom:</strong> Sesuaikan kolom yang ingin ditampilkan di tabel untuk
                                melihat data yang lebih relevan sesuai kebutuhan Anda.</li>
                            <li><strong>Pencarian Data:</strong> Gunakan kolom pencarian untuk menemukan jenis proposal
                                tertentu dengan cepat berdasarkan kata kunci seperti nama atau catatan admin.</li>
                            <li><strong>Pengurutan Kolom:</strong> Klik judul kolom tertentu untuk mengurutkan data,
                                misalnya untuk menampilkan jenis proposal yang terakhir diperbarui di urutan atas.</li>
                            <li><strong>Ubah Data:</strong> Klik tombol <em>Ubah</em> di kolom Aksi pada baris data yang
                                ingin Anda perbarui untuk mengedit informasi atau status jenis proposal.</li>
                            <li><strong>Tambah Jenis Proposal Baru:</strong> Klik ikon <em>Tambah</em> di pojok kanan bawah
                                untuk menambahkan jenis proposal baru ke dalam sistem.</li>
                        </ul>
                        </p>
                    </div>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getProposalTypeData') }}" 
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Proposal Type Name </th>
                                <th class="data-long">Admin Note</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Proposal Type Name </th>
                                <th>Admin Note</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

    <!-- Tombol Tambah -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'm_proposal_type_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddProposalType') }}"
            data-toggle="tooltip" title="Tambah Jenis Proposal Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
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
