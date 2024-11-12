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
                        Di halaman ini, Anda dapat melihat dan mengelola semua survei yang tersedia. Setiap baris
                        menampilkan informasi penting seperti nama, URL, tanggal berakhir, tipe, dan status. Gunakan fitur
                        <b>visibilitas kolom, pengurutan, dan pencarian kolom</b> untuk menyesuaikan tampilan dan menemukan
                        data dengan cepat.
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
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Nonaktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditSurvey', ['id' => $item->id, 'access' => 'm_survey_update']) }}"
                                            class="btn btn-primary rounded">Edit</a>
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
