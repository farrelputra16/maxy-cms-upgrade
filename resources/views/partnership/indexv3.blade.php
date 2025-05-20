@extends('layout.main-v3')

@section('title', 'Kerja Sama')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Konten</a></li>
                        <li class="breadcrumb-item active">Kerja Sama</li>
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
                    <h4 class="card-title">Data Kerja Sama</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan data kerja sama dengan mitra dalam bentuk tabel interaktif, termasuk
                        informasi penting seperti mitra, tipe kerja sama, deskripsi singkat, periode kerja sama, dan status.
                        Data ditampilkan secara terstruktur untuk memudahkan pemantauan dan pengelolaan kerja sama dengan
                        mitra.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Kolom <b>Mitra</b> dan <b>Tipe Kerja Sama</b> berisi nama mitra dan jenis kerja sama yang
                            dijalin. Anda dapat mengarahkan kursor pada teks untuk melihat detail lengkap melalui tooltip.
                        </li>
                        <li>Perhatikan kolom <b>Tanggal Mulai</b> dan <b>Tanggal Akhir</b> untuk mengetahui periode aktif
                            kerja sama dengan mitra tersebut.</li>
                        <li>Kolom <b>Status</b> menunjukkan apakah kerja sama saat ini <i>Aktif</i> atau <i>Non Aktif</i>,
                            membantu Anda melacak kerja sama yang masih berlangsung.</li>
                        <li>Gunakan kolom <b>Aksi</b> untuk mengedit informasi kerja sama dengan menekan tombol <b>Ubah</b>
                            di setiap baris data, jika terdapat perubahan pada detail kerja sama.</li>
                        <li>Untuk menambahkan data kerja sama baru, klik tombol tambah di sudut kanan bawah halaman ini.
                        </li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> untuk
                            memfilter dan menemukan data tertentu dengan cepat.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getPartnershipData') }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Partner</th>
                                <th class="data-medium">Cooperative Type</th>
                                <th>File</th>
                                <th>Start Date</th>
                                <th>End Date</th>
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
                                <th class="data-medium">Partner</th>
                                <th class="data-medium">Cooperative Type</th>
                                <th>File</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th class="data-long">Admin Note</th>
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
    <!-- End Content -->

    <!-- FAB Add Starts -->
    @if (Session::has('access_master') &&
            Session::get('access_master')->contains('access_master_name', 'partnership_create'))
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddPartnership') }}">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    @endif
    <!-- FAB Add Ends -->
@endsection

@section('script')
<script>
    const columns = [{
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
            data: "name",
            name: "name",
            orderable: true,
            searchable: true
        },
        {
            data: "type",
            name: "type",
            orderable: true,
            searchable: true
        },
        {
            data: "image",
            name: "image",
            orderable: false,
            searchable: false
        },
        {
            data: "date_start",
            name: "date_start",
            orderable: true,
            searchable: true
        },
        {
            data: "date_end",
            name: "date_end",
            orderable: true,
            searchable: true
        },
        {
            data: "description",
            name: "description",
            orderable: true,
            searchable: true
        },
        {
            data: "created_at",
            name: "created_at",
            orderable: true,
            searchable: false
        },
        {
            data: "created_id",
            name: "created_id",
            orderable: false,
            searchable: false
        },
        {
            data: "updated_at",
            name: "updated_at",
            orderable: true,
            searchable: false
        },
        {
            data: "updated_id",
            name: "updated_id",
            orderable: false,
            searchable: false
        },
        {
            data: "status",
            name: "status",
            orderable: true,
            searchable: true
        },
        {
            data: "action",
            name: "action",
            orderable: false,
            searchable: false
        },
    ];
</script>
@endsection
