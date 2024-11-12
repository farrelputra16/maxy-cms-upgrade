@extends('layout.main-v3')

@section('title', 'Edit Hak Akses Utama')

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
                        <li class="breadcrumb-item"><a href="{{ route('getAccessMaster') }}">Hak Akses Utama</a></li>
                        <li class="breadcrumb-item active">Edit Hak Akses Utama</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Selesai Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Hak Akses Utama: {{ $accessmasters->name }}</h4>
                    <p class="card-title-desc">Gunakan halaman ini untuk memperbarui informasi hak akses utama. Pastikan
                        data yang dimasukkan sudah benar untuk mendukung kelancaran penggunaan sistem bagi pengguna yang
                        memiliki hak akses ini.</p>

                    <form action="{{ route('postEditAccessMaster', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-id" class="col-md-2 col-form-label">ID</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="id" value="{{ $accessmasters->id }}"
                                    id="id" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama Hak Akses</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $accessmasters->name) }}" id="name">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" placeholder="Tambahkan deskripsi untuk hak akses ini jika diperlukan">{{ old('description', $accessmasters->description) }}</textarea>
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
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($accessmasters) ? $accessmasters->status : false) ? 'checked' : '' }}>
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
