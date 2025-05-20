@extends('layout.main-v3')

@section('title', 'Persyaratan')

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
                        <li class="breadcrumb-item"><a href={{ route('getEvent') }}>Acara</a></li>
                        <li class="breadcrumb-item active">Persyaratan</li>
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
                    <h4 class="card-title">Persyaratan untuk {{ $event->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk melihat dan mengelola daftar persyaratan yang diperlukan untuk
                        mengikuti acara <b>{{ $event->name }}</b>.
                        Data ditampilkan dalam tabel interaktif dengan informasi yang komprehensif, termasuk nama
                        persyaratan, status unggahan, keharusan, dan catatan admin singkat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Gunakan kolom <b>Nama</b> dan <b>Catatan Admin</b> untuk mengetahui detail setiap persyaratan.
                            Arahkan kursor pada teks untuk melihat informasi selengkapnya melalui tooltip.</li>
                        <li>Perhatikan kolom <b>Upload</b> untuk memastikan apakah persyaratan tersebut memerlukan unggahan
                            dokumen dari peserta, dengan indikasi "Ya" atau "Tidak".</li>
                        <li>Kolom <b>Wajib</b> menunjukkan apakah persyaratan tersebut bersifat wajib bagi peserta, sehingga
                            Anda dapat memprioritaskan pengecekan pada item yang diperlukan.</li>
                        <li>Kolom <b>Status</b> memberi tahu apakah persyaratan saat ini dalam kondisi <i>Aktif</i> atau
                            <i>Non Aktif</i>.
                        </li>
                        <li>Gunakan tombol <b>Ubah</b> di kolom <b>Aksi</b> untuk memperbarui informasi persyaratan jika
                            diperlukan.</li>
                        <li>Untuk menambahkan persyaratan baru, klik tombol tambah di sudut kanan bawah halaman ini.</li>
                        <li>Gunakan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> untuk mengatur
                            tampilan tabel sesuai kebutuhan, memudahkan Anda dalam mencari informasi spesifik.</li>
                    </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" data-url="{{ route('getEventRequirementData') }}"
                        data-id="{{ $event->id }}" data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Nama (Inggris)</th>
                                <th>Upload</th>
                                <th>Wajib</th>
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
                                <th class="data-medium">Name</th>
                                <th class="data-medium">Nama (Inggris)</th>
                                <th>Upload</th>
                                <th>Wajib</th>
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
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddEventRequirement', ['event_id' => $event->id]) }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <script>
        const columns = [
            // Column definitions matching the blade template
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'name_en',
                name: 'name_en'
            },
            {
                data: 'is_upload',
                name: 'is_upload'
            },
            {
                data: 'is_required',
                name: 'is_required'
            },
            {
                data: 'description',
                name: 'description'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'created_id',
                name: 'created_id'
            },
            {
                data: 'updated_at',
                name: 'updated_at'
            },
            {
                data: 'updated_id',
                name: 'updated_id'
            },
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
        ];
    </script>
@endsection
