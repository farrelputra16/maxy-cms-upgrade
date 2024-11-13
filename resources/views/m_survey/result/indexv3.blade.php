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
                        data-colvis="[1, 6, 7, 8, 9]">
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
                            @foreach ($SurveyResult as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->MSurvey->name }}">
                                        {!! \Str::limit($item->MSurvey->name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->User->name }}">
                                        {!! \Str::limit($item->User->name, 30) !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->content) !!}">
                                        {!! !empty($item->content) ? \Str::limit($item->content, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->score }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        <a href="{{ route('getSurveyResultDetail', ['id' => $item->id, 'access' => 'survey_result_read']) }}"
                                            class="btn btn-primary rounded">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
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

@endsection
