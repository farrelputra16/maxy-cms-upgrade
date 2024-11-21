@extends('layout.main-v3')

@section('title', 'Jenis Mata Kuliah')

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
                        <li class="breadcrumb-item active">Jenis Mata Kuliah</li>
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
                    <h4 class="card-title">Jenis Mata Kuliah</h4>
                    <div class="card-title-desc">
                        <p>
                            Halaman ini memberikan tampilan menyeluruh tentang jenis-jenis mata kuliah yang tersedia di
                            sistem. Setiap jenis mata kuliah dicantumkan bersama informasi detail seperti nama, slug,
                            deskripsi, dan status aktif/non-aktif.
                            <br><br>
                            <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li><strong>Cari Jenis Mata Kuliah:</strong> Gunakan kolom pencarian untuk menemukan jenis mata
                                kuliah tertentu berdasarkan nama atau slug untuk navigasi yang cepat.</li>
                            <li><strong>Pengurutan Data:</strong> Klik pada judul kolom seperti "Nama Jenis Mata Kuliah"
                                atau "Status" untuk mengurutkan data, misalnya berdasarkan nama atau status aktif/non-aktif.
                            </li>
                            <li><strong>Ubah Informasi:</strong> Tekan tombol <em>Ubah</em> pada kolom Aksi untuk
                                memperbarui informasi jenis mata kuliah, termasuk nama, deskripsi, dan status.</li>
                            <li><strong>Tambah Jenis Mata Kuliah Baru:</strong> Klik tombol <em>+</em> di pojok kanan bawah
                                halaman untuk menambahkan jenis mata kuliah baru ke dalam daftar.</li>
                        </ul>
                        </p>
                    </div>

                </div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th class="data-medium">Nama Jenis Mata Kuliah</th>
                            <th>Slug</th>
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
                        @foreach ($mCourseType as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td class="data-long" data-toggle="tooltip" data-placement="top"
                                    title="{{ strip_tags($item->description) }}">
                                    {{ !empty($item->description) ? \Str::limit(strip_tags($item->description), 30) : '-' }}
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
                                    <div class="btn-group">
                                        <a href="{{ route('getEditCourseType', ['id' => $item->id, 'access' => 'm_course_type_update']) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <!-- <a href="{{ route('getCourseClassChildModule', ['id' => $item->id]) }}" class="btnModul">Sertifikat Template</a> -->
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Id</th>
                            <th class="data-medium">Nama Jenis Mata Kuliah</th>
                            <th>Slug</th>
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
    <!-- end content -->

    <!-- FAB add starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddCourseType', ['access' => 'm_course_type_create']) }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB add ends -->
@endsection

@section('script')


@endsection
