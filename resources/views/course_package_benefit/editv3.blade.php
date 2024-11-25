@extends('layout.main-v3')

@section('title', 'Ubah Manfaat Paket Mata Kuliah')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCoursePackage') }}">Paket Mata Kuliah</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCoursePackageBenefit') }}">Manfaat Paket
                                Mata Kuliah</a></li>
                        <li class="breadcrumb-item active">Ubah Manfaat Paket Mata Kuliah</li>
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

                    <h4 class="card-title">Ubah Manfaat Paket Mata Kuliah: {{ $currentData->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda untuk memperbarui informasi manfaat dari paket mata kuliah.
                        Pastikan semua detail yang dimasukkan akurat agar peserta mendapatkan pengalaman belajar terbaik.
                        <br><br>
                        <strong>Cara Penggunaan:</strong>
                        <ul>
                            <li>Isi kolom Nama Manfaat Paket Mata Kuliah, ID Paket Mata Kuliah, dan Deskripsi Manfaat sesuai kebutuhan.</li>
                            <li>Setelah semua detail terisi, gunakan tombol <strong>'Simpan & Perbarui'</strong> untuk menyimpan perubahan yang telah Anda buat.</li>
                        </ul>
                    </p>


                    <form action="{{ route('postEditCoursePackageBenefit', ['id' => request()->query('id')]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @isset($idCPB)
                            <div class="mb-3 row">
                                <label for="input-name" class="col-md-2 col-form-label">idCPB</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="idCPB" value="{{ $idCPB }}"
                                        hidden>
                                </div>
                            </div>
                        @endisset

                        <!-- Menambahkan hidden input untuk mempertahankan query string -->
                        <input type="hidden" name="course_id" value="{{ request()->query('course_id') }}">
                        <input type="hidden" name="page_type" value="{{ request()->query('page_type') }}">

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">ID</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->id }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Manfaat Paket Mata Kuliah</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $currentData->name }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">ID Paket Mata Kuliah</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_package_id">
                                    @if ($currentData != null)
                                        <option selected value="{{ $currentData->course_package_id }}">
                                            {{ $currentData->course_package_name }}</option>
                                    @endif
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
                                <textarea id="elm1" name="description">{{ $currentData->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ $currentData->status == 1 ? 'checked' : '' }} name="status">
                                <label>Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
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
