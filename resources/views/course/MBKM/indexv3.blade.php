@extends('layout.main-v3')

@section('title', 'MBKM')

@section('content')
    {{-- <!-- Begin notification -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- End notification --> --}}
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ringkasan Data MBKM</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">MBKM</li>
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
                    <h4 class="card-title">MBKM</h4>
                    <p class="card-title-desc">
                        Halaman ini memberikan gambaran umum program MBKM yang tersedia. 
                        Anda dapat melihat informasi utama, seperti nama program, deskripsi, dan status aktif. 
                        Gunakan fitur pencarian dan pengurutan untuk mengakses data dengan mudah. 
                        Tabel ini juga menyediakan opsi untuk mengedit data atau melihat daftar modul yang terkait dengan program.
                    </p>                    

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">MBKM Program</th>
                                <th class="data-medium">Ringkasan Singkat</th>
                                <th class="data-long">Detail Ringkasan</th>
                                <th class="data-long">Konten Tambahan</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->name }}">
                                        {!! \Str::limit($item->name, 30) !!}
                                    </td>
                                    <td class="data-medium" data-toggle="tooltip" data-placement="top"
                                        title="{{ $item->short_description }}">
                                        {!! !empty($item->short_description) ? \Str::limit($item->short_description, 30) : '-' !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->description) !!}">
                                        {!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}
                                    </td>
                                    <td class="data-long" data-toggle="tooltip" data-placement="top"
                                        title="{!! strip_tags($item->content) !!}">
                                        {!! !empty($item->content) ? \Str::limit($item->content, 30) : '-' !!}
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
                                        <a href="{{ route('getEditMBKM', ['id' => $item->id]) }}"
                                            class="btn btn-primary rounded">Edit</a>
                                        <a href="{{ route('getCourseModule', ['course_id' => $item->id, 'page_type' => 'LMS']) }}"
                                            class="btn btn-outline-primary rounded">Modules List</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Id</th>
                                <th class="data-medium">MBKM Program</th>
                                <th class="data-medium">Ringkasan Singkat</th>
                                <th class="data-long">Detail Ringkasan</th>    
                                <th class="data-long">Konten Tambahan</th>
                                <th>Created At</th>
                                <th>Created Id</th>
                                <th>Updated At</th>
                                <th>Updated Id</th>
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
        <a href="{{ route('getAddMBKM') }}" target="_blank">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends -->
@endsection

@section('script')
    <!-- Add custom scripts here if needed -->
    @if(session('course_added'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                title: 'Information!',
                html: "<strong>{{ session('course_added') }}</strong>",
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
