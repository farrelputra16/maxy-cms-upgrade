@extends('layout.main-v3')

@section('title', 'Kerja Sama')

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
                        <li class="breadcrumb-item active">Kerja Sama</li>
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
                    <h4 class="card-title">Data Kerja Sama</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan data kerja sama dengan mitra dalam bentuk tabel interaktif, termasuk
                        informasi penting seperti mitra, tipe kerja sama, deskripsi singkat, periode kerja sama, dan status.
                        Data ditampilkan secara terstruktur untuk memudahkan pemantauan dan pengelolaan kerja sama dengan
                        mitra.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Kolom <b>Mitra</b> dan <b>Tipe Kerja Sama</b> berisi nama mitra dan jenis kerja sama yang
                            dijalin. Anda dapat mengarahkan kursor pada teks untuk melihat detail lengkap melalui tooltip.
                        </li>
                        <li>Perhatikan kolom <b>Tanggal Mulai</b> dan <b>Tanggal Akhir</b> untuk mengetahui periode aktif
                            kerja sama dengan mitra tersebut.</li>
                        <li>Kolom <b>Status</b> menunjukkan apakah kerja sama saat ini <i>Aktif</i> atau <i>Non Aktif</i>,
                            membantu Anda melacak kerja sama yang masih berlangsung.</li>
                        <li>Gunakan kolom <b>Aksi</b> untuk mengedit informasi kerja sama dengan menekan tombol <b>Ubah</b>
                            di setiap baris data, jika terdapat perubahan pada detail kerja sama.</li>
                        <li>Untuk menambahkan data kerja sama baru, klik tombol tambah di sudut kanan bawah halaman ini.
                        </li>
                        <li>Manfaatkan fitur <b>Visibilitas Kolom</b>, <b>Pengurutan</b>, dan <b>Pencarian</b> untuk
                            memfilter dan menemukan data tertentu dengan cepat.</li>
                    </ul>
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Mitra</th>
                                <th class="data-medium">Tipe Kerja Sama</th>
                                <th>File</th>
                                <th class="data-medium">Deskripsi Pratinjau</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th class="data-long">Catatan Admin</th>
                                <th>Dibuat Pada</th>
                                <th>Id Pembuat</th>
                                <th>Diperbarui Pada</th>
                                <th>Id Pembaruan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partnerships as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->Partner->name }}">
                                        {!! \Str::limit($item->Partner->name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->MPartnershipType->name }}">
                                        {!! \Str::limit($item->MPartnershipType->name, 30) !!}
                                    </td>
                                    <td>
                                        <img src="{{ asset('uploads/partnership/' . $item->file) }}" alt="Image"
                                            style="max-width: 200px; max-height: 150px;">
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->short_desc }}">
                                        {!! \Str::limit($item->short_desc, 30) !!}
                                    </td>
                                    <td>{{ $item->date_start }}</td>
                                    <td>{{ $item->date_end }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        <button
                                            class="btn btn-status {{ $item->status == 1 ? 'btn-success' : 'btn-danger' }}"
                                            data-id="{{ $item->id }}" data-status="{{ $item->status }}"
                                            data-model="Partnership">
                                            {{ $item->status == 1 ? 'Aktif' : 'Nonaktif' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditPartnership', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Mitra</th>
                                <th class="data-medium">Tipe Kerja Sama</th>
                                <th>File</th>
                                <th class="data-medium">Deskripsi Pratinjau</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
                                <th class="data-long">Catatan Admin</th>
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
        <a href="{{ route('getAddPartnership') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
