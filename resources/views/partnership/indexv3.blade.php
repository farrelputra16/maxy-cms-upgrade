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
                        <li class="breadcrumb-item"><a>Konten</a></li>
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
                        Halaman ini menampilkan tabel yang berisi informasi mengenai data rekan Kerja Sama. Gunakan fitur
                        <b>visibilitas kolom, pengurutan, dan kolom pencarian</b> pada tabel ini untuk menemukan dan
                        melihat detail kerja sama dengan mitra. Anda juga dapat mengedit informasi kerja sama dengan
                        menekan tombol <b>Edit</b> di kolom Aksi pada setiap baris data.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Mitra</th>
                                <th class="data-medium">Tipe Kerja Sama</th>
                                <th>File</th>
                                <th class="data-medium">Deskripsi Singkat</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
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
                                    <td value="{{ $item->status }}">
                                        @if ($item->status == 1)
                                            <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                                        @else
                                            <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('getEditPartnership', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
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
                                <th class="data-medium">Deskripsi Singkat</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Akhir</th>
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
        <a href="{{ route('getAddPartnership') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
