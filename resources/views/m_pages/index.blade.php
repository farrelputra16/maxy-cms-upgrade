@extends('layout.main-v3')

@section('title', 'Pages Settings')

@section('content')
    <!-- Begin Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Begin Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Settings</a></li>
                        <li class="breadcrumb-item active">Pages</li>
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
                    <h4 class="card-title">Pengaturan Halaman</h4>
                    <p class="card-title-desc">
                        Halaman ini digunakan untuk melakukan pengaturan halaman yang ada di website frontpage Bina Karya.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Halaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- Page Name --}}
                                        <td>
                                            @if ($section->page_id == 1)
                                                Home
                                            @elseif ($section->page_id == 2)
                                                Browse Courses
                                            @elseif ($section->page_id == 3)
                                                Blog
                                            @else
                                                Unknown Page
                                            @endif
                                        </td>


                                        {{-- Edit Button --}}
                                        <td>
                                            <a href="{{ route('getEditPage', ['id' => $section->page_id]) }}" class="btn btn-primary rounded">Edit</a>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Halaman</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    {{-- <!-- FAB Add Starts -->
    <div id="floating-whatsapp-button">
        <a href="{{ route('getAddGeneral') }}" target="_blank" data-toggle="tooltip"
            title="Tambah Data">
            <i class="fas fa-plus"></i>
        </a>
    </div>
    <!-- FAB Add Ends --> --}}
@endsection

@section('script')

@endsection
