@extends('layout.main-v3')

@section('title', 'Hasil Survei')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tinjauan Data</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getSurvey') }}">Survei</a></li>
                        <li class="breadcrumb-item active">Hasil Survei</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <!-- Konten Utama -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hasil Survei</h4>
                    <p class="card-title-desc">
                        Halaman ini menyajikan hasil survei dalam format tabel interaktif. Setiap baris berisi detail hasil
                        survei, termasuk nama survei, nama responden, skor yang diperoleh, dan status pembaruan. Gunakan
                        <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk mengatur tampilan sesuai kebutuhan
                        dan menemukan informasi dengan lebih cepat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom yang ingin ditampilkan atau disembunyikan untuk
                            fokus pada data yang relevan.</li>
                        <li><strong>Pencarian Data:</strong> Gunakan kolom pencarian untuk menemukan hasil survei
                            berdasarkan nama survei atau nama responden.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada header kolom, seperti "Nama Survei" atau "Skor,"
                            untuk mengurutkan data sesuai kebutuhan.</li>
                        <li><strong>Lihat Detail Hasil:</strong> Tekan tombol <em>Detail</em> pada kolom "Aksi" untuk
                            melihat informasi lengkap hasil survei.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100"
                        data-server-processing="true" 
                        data-no-status="true"
                        data-url="{{ route('getSurveyResultData') }}" 
                        data-colvis="[1, -2, -3, -4, -5]"
                        data-id="{{ $surveyId }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Survei</th>
                                <th class="data-medium">Nama Responden</th>
                                <th class="data-long">Konten</th>
                                <th>Skor</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Survei</th>
                                <th>Nama Responden</th>
                                <th>Konten</th>
                                <th>Skor</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten Utama -->
@endsection

@section('script')
<script>
    const columns = [
        { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
        { data: "id", name: "id" },
        { data: "name", name: "name", orderable: true, searchable: true },
        { data: "responden_name", name: "responden_name", orderable: true, searchable: true },
        { data: "content", name: "content", orderable: true, searchable: true },
        { data: "score", name: "score", orderable: true, searchable: true },
        { data: "created_at", name: "created_at", orderable: true, searchable: false },
        { data: "created_id", name: "created_id", orderable: false, searchable: false },
        { data: "updated_at", name: "updated_at", orderable: true, searchable: false },
        { data: "updated_id", name: "updated_id", orderable: false, searchable: false },
        { data: "action", name: "action", orderable: false, searchable: false },
    ];
</script>
@endsection
