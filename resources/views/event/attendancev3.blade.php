@extends('layout.main-v3')

@section('title', 'Kehadiran Acara')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Konten</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getEvent') }}">Acara</a></li>
                        <li class="breadcrumb-item active">Kehadiran</li>
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

                    <h4 class="card-title">Kehadiran</h4>
                    <p class="card-title-desc">
                        Halaman ini menyediakan ringkasan data kehadiran peserta untuk acara tertentu secara interaktif.
                        Data ditampilkan dalam tabel yang dapat diatur sesuai kebutuhan Anda, termasuk informasi penting
                        seperti nama peserta, catatan admin acara, dan status kehadiran.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Gunakan kolom <b>Nama Peserta</b> dan <b>Catatan Admin</b> untuk melihat informasi peserta dan
                            detail singkat tentang kehadiran mereka. Arahkan kursor pada teks untuk melihat informasi
                            selengkapnya melalui tooltip.</li>
                        <li>Perhatikan kolom <b>Status</b> untuk mengetahui apakah peserta sudah <i>Hadir</i> atau masih
                            dalam status <i>Terdaftar</i>.</li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b> dan <b>Pencarian</b> untuk menyaring dan menemukan
                            informasi spesifik secara efisien.</li>
                        <li>Gunakan tombol <b>Verifikasi</b> di kolom <b>Aksi</b> untuk melakukan verifikasi kehadiran
                            peserta sesuai kebutuhan acara.</li>
                        <li>Kolom <b>Dibuat Pada</b> dan <b>Diperbarui Pada</b> membantu melacak riwayat entri kehadiran,
                            termasuk siapa yang membuat dan memperbarui data terakhir kali.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getAttendanceEventData') }}"
                        data-no-status="true"
                        data-id="{{ $idevent }}"
                        data-colvis="[1, -3, -4, -5, -6]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Peserta</th>
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
                                <th class="data-medium">Nama Peserta</th>
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
    <!-- end content -->
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
            data: "name",
            name: "name",
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
