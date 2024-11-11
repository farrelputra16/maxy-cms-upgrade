@extends('layout.main-v3')

@section('title', 'Tambah Grup Akses')

@section('content')
    <!-- Mulai Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengguna & Akses</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getAccessGroup') }}">Grup Akses</a></li>
                        <li class="breadcrumb-item active">Tambah Grup Akses</li>
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

                    <h4 class="card-title">Tambah Grup Akses Baru</h4>
                    <p class="card-title-desc">Gunakan halaman ini untuk menambahkan informasi grup akses baru. Pastikan
                        data yang dimasukkan sudah benar agar dapat digunakan dengan optimal oleh pengguna.</p>

                    <form id="addAccessGroup" action="{{ route('postAddAccessGroup') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Grup Akses</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama Grup Akses" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Pilih Hak Akses</label>
                            <div class="col-md-10">
                                <select class="form-control select2 select2-multiple" multiple="multiple"
                                    name="access_master[]" id="access_master" data-placeholder="Pilih Hak Akses">
                                    @foreach ($accessMasters as $item)
                                        <option value="{{ $item->id }}"
                                            {{ in_array($item->id, old('access_master', [])) ? 'selected' : '' }}>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addAccessGroup">Simpan Grup Akses</button>
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
