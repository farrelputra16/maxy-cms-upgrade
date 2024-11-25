@extends('layout.main-v3')

@section('title', 'Manfaat Paket Mata Kuliah')

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
                        <li class="breadcrumb-item"><a href="{{ route('getCoursePackage') }}">Paket Mata Kuliah</a></li>
                        <li class="breadcrumb-item active">Manfaat Paket Mata Kuliah</li>
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
                    <h4 class="card-title">Manfaat Paket Mata Kuliah</h4>
                    <p>
                        Halaman ini menampilkan manfaat yang diperoleh dari setiap Paket Mata Kuliah. Anda dapat melihat keuntungan utama yang akan didapatkan peserta setelah mengikuti paket mata kuliah tertentu, termasuk nama manfaat dan deskripsinya.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Nama Manfaat Paket Mata Kuliah:</strong> Lihat nama manfaat dari setiap paket mata kuliah yang dijelaskan secara singkat.</li>
                            <li><strong>Deskripsi Manfaat:</strong> Baca deskripsi rinci tentang manfaat yang akan diperoleh peserta dari paket mata kuliah ini.</li>
                            <li><strong>Tambah Manfaat:</strong> Klik tombol <em>Tambah Manfaat</em> untuk menambahkan manfaat baru pada paket mata kuliah.</li>
                            <li><strong>Ubah Manfaat:</strong> Klik tombol <em>Ubah</em> di kolom "Aksi" untuk memperbarui informasi manfaat paket mata kuliah.</li>
                        </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Manfaat Paket Mata Kuliah</th>
                                <th>ID Paket Mata Kuliah - Harga</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coursePackageBenefits as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>{{ $item->course_package_name }} - Rp.
                                        {{ number_format($item->course_package_price, 0, ',', '.') }}
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
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditCoursePackageBenefit', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Manfaat Paket Mata Kuliah</th>
                                <th>ID Paket Mata Kuliah - Harga</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
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
        @if (isset($idCPB))
            <a href="{{ route('getAddCoursePackageBenefit', ['idCPB' => $idCPB]) }}" target="_blank">
                <i class="fas fa-plus"></i> <!-- Ikon FAB -->
            </a>
        @else
            <a href="{{ route('getAddCoursePackageBenefit') }}" target="_blank">
                <i class="fas fa-plus"></i> <!-- Ikon FAB -->
            </a>
        @endif
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

@endsection
