@extends('layout.main-v3')

@section('title', 'Tambah Manfaat Paket Kursus')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCoursePackage') }}">Course Package</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCoursePackageBenefit') }}">Manfaat Paket
                                Kursus</a></li>
                        <li class="breadcrumb-item active">Tambah Manfaat Paket Kursus</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Tambah Manfaat Kursus</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk menambahkan manfaat baru ke dalam Paket Kursus. 
                        Isikan informasi berikut untuk menggambarkan manfaat yang akan didapatkan peserta dari paket kursus yang Anda buat.
                    </p>

                    <form id="addCoursePackageBenefit" action="{{ route('postAddCoursePackageBenefit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @isset($idCPB)
                            <div class="mb-3 row">
                                <label for="input-name" class="col-md-2 col-form-label">idCPB</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="idCPB" hidden>
                                </div>
                            </div>
                        @endisset

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Manfaat Paket Kursus</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    placeholder="Masukkan Package Benefit">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">ID Paket Kursus</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_package_id" data-placeholder="Choose ...">
                                    @foreach ($allCoursePackages as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_package_id'))
                                    @foreach ($errors->get('course_package_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status">
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit" form="addCoursePackageBenefit">Tambah Manfaat Paket Kursus</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

@endsection
