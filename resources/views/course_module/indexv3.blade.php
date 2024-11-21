@extends('layout.main-v3')

@section('title', 'Modul Mata Kuliah')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ikhtisar Data</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        @if ($bcMBKM == true)
                            <li class="breadcrumb-item"><a href="{{ route('getCourseMBKM') }}">MBKM</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Mata Kuliah</a></li>
                        @endif
                        <li class="breadcrumb-item active">Daftar Modul: {{ $course_detail->name }}</li>
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
                    <h4 class="card-title">Modul Utama untuk Mata Kuliah: {{ $course_detail->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini menampilkan daftar modul utama dari mata kuliah yang telah dipilih, termasuk informasi
                        detail seperti nama modul, hari pelaksanaan, konten, deskripsi, dan status aktif. Anda dapat
                        mengelola modul dengan mudah melalui fitur tabel interaktif yang menyediakan <b>pencarian,
                            pengurutan, dan visibilitas kolom</b>.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                    <ul>
                        <li>Klik ikon <b>+</b> di pojok kanan bawah untuk menambahkan modul baru ke dalam mata kuliah ini.
                        </li>
                        <li>Tekan tombol <b>Ubah</b> pada kolom Tindakan untuk memperbarui informasi modul seperti nama atau
                            deskripsi.</li>
                        <li>Pilih tombol <b>Konten</b> untuk mengelola sub-modul atau materi yang ada dalam modul tersebut.
                        </li>
                        <li>Gunakan kolom <b>Status</b> untuk mengetahui apakah modul sedang aktif atau non-aktif, yang
                            memengaruhi visibilitas modul bagi peserta.</li>
                        <li>Manfaatkan fitur <b>Pencarian</b>, <b>Pengurutan</b>, dan <b>Visibilitas Kolom</b> untuk
                            mempermudah navigasi dan akses ke modul tertentu sesuai kebutuhan.</li>
                    </ul>
                    </p>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari</th>
                                <th>Konten</th>
                                <th class="data-long">Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diubah Pada</th>
                                <th>ID Pengubah</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($parent_modules as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td>{{ $item->priority }}</td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{{ strip_tags($item->content) }}">
                                        {{ !empty($item->content) ? \Str::limit(strip_tags($item->content), 30) : '-' }}
                                    </td>
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
                                        <a href="{{ route('getEditCourseModule', ['id' => $item->id, 'page_type' => $page_type]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        @if ($page_type == 'LMS')
                                            <a href="{{ route('getCourseSubModule', ['course_id' => $course_detail->id, 'module_id' => $item->id, 'page_type' => 'LMS_child']) }}"
                                                class="btn btn-outline-primary rounded-end">Konten</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Modul</th>
                                <th>Hari</th>
                                <th>Konten</th>
                                <th>Deskripsi</th>
                                <th>Dibuat Pada</th>
                                <th>ID Pembuat</th>
                                <th>Diubah Pada</th>
                                <th>ID Pengubah</th>
                                <th>Status</th>
                                <th>Tindakan</th>
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
        <a href="{{ route('getAddCourseModule', ['id' => $course_detail->id, 'page_type' => $page_type]) }}"
            target="_blank" data-toggle="tooltip" title="Tambah Modul Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    @if (session('parent_module_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Informasi!',
                    html: "<strong>{{ session('parent_module_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                });
            });
        </script>
    @endif
@endsection
