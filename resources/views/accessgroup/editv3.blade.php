@extends('layout.main-v3')

@section('title', 'Edit Grup Akses')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengguna & Akses</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getAccessGroup') }}">Grup Akses</a></li>
                        <li class="breadcrumb-item active">Edit Grup Akses</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Judul Halaman Selesai -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Grup Akses: {{ $accessgroups->name }}</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda untuk memperbarui informasi grup akses yang
                        sudah ada. Pastikan semua data yang Anda masukkan sudah benar untuk memudahkan pengguna dalam
                        mengakses fitur sesuai hak akses yang diberikan.</p>

                    <form action="{{ route('postEditAccessGroup', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-id" class="col-md-2 col-form-label">ID</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="id" value="{{ $accessgroups->id }}"
                                    id="id" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Grup Akses (Peran) <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $accessgroups->name) }}" id="name">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-current-access" class="col-md-2 col-form-label">Hak Akses Saat Ini</label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-multiple" multiple="multiple"
                                    name="access_master_old[]" id="access_master_old">
                                    @php
                                        // Cek error di session untuk menentukan apakah submit gagal atau load awal
                                        $selectedValues = $errors->any()
                                            ? old('access_master_old', [])
                                            : ($currentData
                                                ? array_keys($currentData)
                                                : []);
                                    @endphp
                                    @foreach ($currentData as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ in_array($key, $selectedValues) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-available-access" class="col-md-2 col-form-label">Hak Akses Tersedia</label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-multiple" multiple="multiple"
                                    name="access_master_available[]" id="access_master_available">
                                    @foreach ($allAccessMaster as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ in_array($key, old('access_master_available', [])) ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description', $accessgroups->description) }}</textarea>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ $accessgroups->status == 1 ? 'checked' : '' }} name="status">
                                <label>Aktif</label>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan Perubahan</button>
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
