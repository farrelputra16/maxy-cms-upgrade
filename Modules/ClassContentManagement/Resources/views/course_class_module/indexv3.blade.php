@extends('layout.main-v3')

@section('title', 'Course Class')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Manajemen Modul Kelas</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Course Class: {{ $class_detail->course_name }}</li>
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
                    <h4 class="card-title">Modul untuk Kelas Kursus: {{ $course_detail->name }} Angkatan {{ $batch_number }}
                    </h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk mengelola semua modul dalam kelas kursus yang dipilih. Setiap
                        baris menampilkan informasi penting tentang modul, termasuk nama modul, hari penjadwalan, tanggal
                        mulai dan selesai, serta deskripsi singkat. Gunakan fitur <b>pengaturan kolom, pengurutan, dan
                            pencarian</b> untuk menyesuaikan tampilan dan menemukan modul yang Anda butuhkan dengan cepat.
                        Misalnya, klik pada header kolom untuk mengurutkan data, atau arahkan kursor ke teks yang terpotong
                        untuk melihat deskripsi lengkap.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari Modul</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
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
                            @foreach ($courseclassmodules as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="batch" scope="row">{{ $item->course_module_name }}</td>
                                    <td>{{ $item->priority }} </td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
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
                                        {{-- <div class="btn-group"> --}}
                                        <a href="{{ route('getEditCourseClassModule', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Ubah</a>
                                        <a href="{{ route('getCourseClassChildModule', ['id' => $item->id]) }}"
                                            class="btn btn-outline-primary rounded">Atur Konten</a>
                                        {{-- </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">Nama Modul</th>
                                <th>Hari Modul</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
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
        <a href="{{ route('getAddCourseClassModule', ['id' => $course_class_id]) }}" target="_blank" data-toggle="tooltip"
            title="Tambah Modul Baru">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')

    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    });

    @if (session('class_module_added'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: 'Information!',
                    html: "<strong>{{ session('class_module_added') }}</strong>",
                    icon: 'info',
                    confirmButtonText: 'OK',
                    // Optional: You can also add a cancel button if you want
                    // showCancelButton: true,
                    // cancelButtonText: 'Close',
                });
            });
        </script>
    @endif


@endsection
