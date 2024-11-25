@extends('layout.main-v3')

@section('title', 'Survei')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Survei</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Survei</li>
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
                    <h4 class="card-title">Survei</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk melihat dan mengelola semua survei yang tersedia dalam sistem.
                        Setiap baris menampilkan informasi lengkap mengenai survei, termasuk nama, URL, tanggal berakhir,
                        tipe survei, dan statusnya. Gunakan fitur <b>visibilitas kolom, pengurutan, dan pencarian kolom</b>
                        untuk menemukan data yang diinginkan dengan cepat dan menyesuaikan tampilan tabel sesuai kebutuhan.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li><strong>Visibilitas Kolom:</strong> Atur kolom yang ingin Anda tampilkan atau sembunyikan untuk
                            fokus pada data yang relevan.</li>
                        <li><strong>Pencarian Data:</strong> Gunakan kolom pencarian untuk menemukan survei tertentu
                            berdasarkan nama, deskripsi, atau tipe.</li>
                        <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama" atau "Tanggal Berakhir"
                            untuk mengurutkan data dalam tabel.</li>
                        <li><strong>Ubah Survei:</strong> Klik tombol <em>Ubah</em> pada kolom "Aksi" untuk memperbarui
                            informasi survei yang ada.</li>
                        <li><strong>Tambah Survei Baru:</strong> Klik tombol <em>+</em> di sudut kanan bawah untuk membuat
                            survei baru. Anda akan diarahkan ke halaman formulir untuk memasukkan detail survei yang baru.
                        </li>
                        <li><strong>Hasil Survei:</strong> Klik tombol <em>Hasil</em> untuk melihat hasil survei yang
                            terkumpul dari peserta.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th class="data-medium">URL</th>
                                <th>Tanggal Berakhir</th>
                                <th>Tipe</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($MSurvey as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>{{ config('app.frontend_app_url') . '/lms/survey/' . $item->id }}</td>
                                    <td>{{ $item->expired_date }}</td>
                                    <td>
                                        @if ($item->type == 0)
                                            <span class="badge text-bg-warning"
                                                style="padding: 15%; font-size: smaller;">Evaluasi</span>
                                        @elseif ($item->type == 1)
                                            <span class="badge text-bg-primary"
                                                style="padding: 15%; font-size: smaller;">Kuis</span>
                                        @endif
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Non Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditSurvey', ['id' => $item->id, 'access' => 'm_survey_update']) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getSurveyResult', ['id' => $item->id, 'access' => 'survey_result_manage']) }}"
                                            class="btn btn-info rounded">Hasil</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>URL</th>
                                <th>Tanggal Berakhir</th>
                                <th>Tipe</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Konten -->

    <!-- Tombol Tambah -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddSurvey', ['access' => 'm_survey_create']) }}" target="_blank" data-toggle="tooltip"
            title="Tambah Survei Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- Akhir Tombol Tambah -->
@endsection

@section('script')

@endsection
