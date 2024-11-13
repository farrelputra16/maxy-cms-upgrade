@extends('layout.main-v3')

@section('title', 'Kehadiran Event')

@section('content')
    <!-- begin page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data</h4>

                <!-- begin breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
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
                        seperti nama peserta, deskripsi acara, dan status kehadiran.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Gunakan kolom <b>Nama Peserta</b> dan <b>Deskripsi</b> untuk melihat informasi peserta dan
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

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Peserta</th>
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
                            @foreach ($event_attendances as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->name) !!}">{{ $item->name }}
                                        {!! !empty($item->name) ? \Str::limit($item->name, 30) : '-' !!}</td>
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
                                            <a class="btn btn-success disabled">Hadir</a>
                                        @else
                                            <a class="btn btn-info disabled">Terdaftar</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('getEventVerification', ['user_id' => $item->user_id, 'event_id' => $item->event_id]) }}"
                                                class="btn btn-primary">Verifikasi</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Peserta</th>
                                <th class="data-long">Deskripsi</th>
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
    <!-- end content -->
@endsection

@section('script')

@endsection
