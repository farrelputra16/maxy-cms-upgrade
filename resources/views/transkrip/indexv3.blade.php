@extends('layout.main-v3')

@section('title', 'Transkrip')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Transkrip</li>
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
                    <h4 class="card-title">Transkrip</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk melihat dan mengelola data transkrip siswa secara menyeluruh.
                        Anda dapat melihat detail transkrip, termasuk informasi kelas, periode akademik, nilai, serta
                        riwayat pembaruan data.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Gunakan kolom <b>Nama Siswa</b> untuk menelusuri data berdasarkan nama atau melihat detail siswa
                            dengan mengarahkan kursor ke nama tersebut.</li>
                        <li>Pilih kolom <b>Periode Akademik</b> dan <b>Kelas Mata Kuliah</b> untuk memastikan data yang Anda
                            lihat sesuai dengan periode dan kelas yang diinginkan.</li>
                        <li>Perhatikan kolom <b>Nilai</b> untuk melihat hasil penilaian pada setiap siswa.</li>
                        <li>Kolom <b>Dibuat Pada</b> dan <b>Diperbarui Pada</b> membantu Anda melacak kapan data ini dibuat
                            atau terakhir diperbarui, serta oleh siapa.</li>
                    </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-url="{{ route('getTranskripData') }}" 
                        data-no-status="true"
                        data-colvis="[1, -1, -2, -3, -4]">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Name</th>
                                <th>Period</th>
                                <th>Course Class</th>
                                <th>Nilai </th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Student</th>
                                <th>Period</th>
                                <th>Course Class</th>
                                <th>Score</th>
                                <th>Created At</th>
                                <th>Created By</th>
                                <th>Updated At</th>
                                <th>Updated By</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
        { data: "academic_period", name: "academic_period", orderable: true, searchable: true },
        { data: "slug", name: "slug", orderable: true, searchable: true },
        { data: "score", name: "score", orderable: true, searchable: true },
        { data: "created_at", name: "created_at", orderable: true, searchable: false },
        { data: "created_id", name: "created_id", orderable: false, searchable: false },
        { data: "updated_at", name: "updated_at", orderable: true, searchable: false },
        { data: "updated_id", name: "updated_id", orderable: false, searchable: false },
    ];
</script>
@endsection
