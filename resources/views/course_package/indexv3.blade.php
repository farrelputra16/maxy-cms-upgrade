@extends('layout.main-v3')

@section('title', 'Paket Kursus')

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
                        <li class="breadcrumb-item active">Paket Kursus</li>
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
                    <h4 class="card-title">Paket Kursus</h4>
                    <p>
                        Halaman ini menampilkan daftar lengkap Paket Kursus yang tersedia. 
                        Setiap baris menunjukkan informasi penting seperti nama, slug, dan status aktif dari package.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Cari Course Package:</strong> Gunakan kolom pencarian untuk mencari paket berdasarkan nama atau slug.</li>
                            <li><strong>Urutkan Data:</strong> Klik judul kolom untuk mengurutkan data berdasarkan kriteria seperti nama atau status.</li>
                            <li><strong>Edit Data:</strong> Klik tombol <em>Edit</em> di kolom "Aksi" untuk memperbarui informasi paket kursus.</li>
                            <li><strong>Tambah Paket Kursus Baru:</strong> Klik tombol <em>+</em> di pojok kanan bawah untuk menambahkan paket kursus baru.</li>
                        </ul>
                    </p>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Paket Kursus</th>
                                <th>Harga Fiktif</th>
                                <th>Harga</th>
                                <th class="data-medium">Link Pembayaran</th>
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
                            @foreach ($coursePackages as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="package-name" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">{{ $item->name }}</td>
                                    <td>{{ $item->fake_price ? 'Rp ' . number_format($item->fake_price, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $item->price ? 'Rp ' . number_format($item->price, 0, ',', '.') : '-' }}</td>
                                    <td id="payment_link" class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->payment_link) }}">
                                        {{ !empty($item->payment_link) ? \Str::limit(strip_tags($item->payment_link), 30) : '-' }}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->description) }}">
                                        {{ !empty($item->description) ? \Str::limit(strip_tags($item->description), 30) : '-' }}
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->created_id }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->updated_id }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="btn btn-success" style="pointer-events: none;">Active</span>
                                        @else
                                            <span class="btn btn-danger" style="pointer-events: none;">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditCoursePackage', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getCoursePackageBenefit', ['course_id' => $item->id, 'page_type' => 'LMS']) }}"
                                            class="btn btn-outline-primary rounded-end">Benefit List</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th>Nama Paket Kursus</th>
                                <th>Harga Fiktif</th>
                                <th>Harga</th>
                                <th>Link Pembayaran</th>
                                <th>Deskripsi</th>
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
        <a href="{{ route('getAddCoursePackage') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <!-- Add custom scripts here if needed -->
@endsection
