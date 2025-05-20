@extends('layout.main-v3')

@section('title', 'Riwayat Mahasiswa')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Riwayat Mahasiswa</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Class</a></li>
                        <li class="breadcrumb-item active">Riwayat Mahasiswa</li>
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
                    <h4 class="card-title">Riwayat Mahasiswa</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan riwayat aktivitas siswa dalam kelas. Anda dapat melacak berbagai kegiatan
                        seperti pengerjaan tugas, mengakses modul, dan perubahan profil.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li>Gunakan dropdown untuk memfilter berdasarkan Course atau Member</li>
                            <li>Tekan tombol "Generate" untuk memperbarui data</li>
                            <li>Manfaatkan fitur Show/Hide untuk menyesuaikan tampilan kolom</li>
                            <li>Gunakan tombol ekspor untuk menyalin, membuat Excel, atau PDF</li>
                        </ul>
                    </p>

                    <!-- DataTable -->
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100" data-server-processing="true" data-url="{{ route('getCCMHData') }}" data-colvis="[]" data-no-status="true" @if(request()->has('user_id'))data-id="{{ request()->input('user_id') }}"@endif>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Student</th>
                                <th>Activity</th>
                                <th>Class</th>
                                <th>Type</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Server-side processing will handle this -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Student</th>
                                <th>Activity</th>
                                <th>Class</th>
                                <th>Type</th>
                                <th>Created At</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->
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
            data: "user_name", // Add this column
            name: "user_name",
            orderable: true,
            searchable: true
        },
        {
            data: "history",
            name: "history",
            orderable: true,
            searchable: true
        },
        {
            data: "course_type",
            name: "course_type",
            orderable: true,
            searchable: true
        },
        {
            data: "log_type",
            name: "log_type",
            orderable: true,
            searchable: true
        },
        {
            data: "created_at",
            name: "created_at",
            orderable: true,
            searchable: true
        },
    ];
</script>
@endsection
