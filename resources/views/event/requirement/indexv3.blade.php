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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
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
                        persyaratan, status unggahan, keharusan, dan deskripsi singkat.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Gunakan kolom <b>Nama</b> dan <b>Deskripsi</b> untuk mengetahui detail setiap persyaratan.
                            Arahkan kursor pada teks untuk melihat informasi selengkapnya melalui tooltip.</li>
                        <li>Perhatikan kolom <b>Upload</b> untuk memastikan apakah persyaratan tersebut memerlukan unggahan
                            dokumen dari peserta, dengan indikasi "Ya" atau "Tidak".</li>
                        <li>Kolom <b>Wajib</b> menunjukkan apakah persyaratan tersebut bersifat wajib bagi peserta, sehingga
                            Anda dapat memprioritaskan pengecekan pada item yang diperlukan.</li>
                        <li>Kolom <b>Status</b> memberi tahu apakah persyaratan saat ini dalam kondisi <i>Aktif</i> atau
                            <i>Non Aktif</i>.</li>
                        <li>Gunakan tombol <b>Edit</b> di kolom <b>Aksi</b> untuk memperbarui informasi persyaratan jika
                            diperlukan.</li>
                        <li>Untuk menambahkan persyaratan baru, klik tombol tambah di sudut kanan bawah halaman ini.</li>
                        <li>Gunakan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> untuk mengatur
                            tampilan tabel sesuai kebutuhan, memudahkan Anda dalam mencari informasi spesifik.</li>
                    </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th>Upload</th>
                                <th>Wajib</th>
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
                            @foreach ($requirement as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>

                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>
                                        @if ($item->is_upload == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Ya</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Tidak</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->is_required == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Ya</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Tidak</a>
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
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditEventRequirement', ['id' => $item->id, 'event_id' => $event->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama</th>
                                <th>Upload</th>
                                <th>Wajib</th>
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

@endsection
