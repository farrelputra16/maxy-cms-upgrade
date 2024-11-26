@extends('layout.main-v3')

@section('title', 'Tambah Mitra')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Mitra Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getPartner') }}">Mitra</a></li>
                        <li class="breadcrumb-item active">Tambah Mitra</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Tambah Mitra</h4>
                    <p class="card-title-desc">
                        Gunakan halaman ini untuk menambahkan informasi mitra baru secara rinci. Pastikan setiap data, mulai
                        dari nama, kontak, alamat, hingga deskripsi mitra, telah diisi dengan akurat. Setelah mengisi, klik
                        tombol "Tambah Mitra" untuk menyimpan data baru.
                    </p>


                    <form id="addPartner" action="{{ route('postAddPartner') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    placeholder="Contoh: Universitas XYZ, PT ABC, atau Dinas Pendidikan Kota"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tipe <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" data-placeholder="Pilih ..."
                                    id="type_selector">
                                    <option value="UNIVERSITY" {{ old('type') == 'UNIVERSITY' ? 'selected' : '' }}>
                                        UNIVERSITAS</option>
                                    <option value="COMPANY" {{ old('type') == 'COMPANY' ? 'selected' : '' }}>PERUSAHAAN
                                    </option>
                                    <option value="GOVERNMENT" {{ old('type') == 'GOVERNMENT' ? 'selected' : '' }}>
                                        PEMERINTAH</option>
                                    <option value="UPSKILLING" {{ old('type') == 'UPSKILLING' ? 'selected' : '' }}>
                                        UPSKILLING</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Email <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="email"
                                    placeholder="Contoh: kontak@mitra.com" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Telepon <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone" placeholder="Contoh: 081234567890"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">URL <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="url"
                                    placeholder="Contoh: https://www.mitra.com" value="{{ old('url') }}">
                                @if ($errors->has('url'))
                                    @foreach ($errors->get('url') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Kontak Person (Nama) <span
                                    class="text-danger" data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="contact_person"
                                    placeholder="Contoh: Ibu Siti, Bapak John, atau Direktur XYZ"
                                    value="{{ old('contact_person') }}">
                                @if ($errors->has('contact_person'))
                                    @foreach ($errors->get('contact_person') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Logo</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" id="formFile" name="logo"
                                    onchange="preview()">
                                <br>
                                <img id="frame" src="" class="img-fluid">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Alamat <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="address" placeholder="Contoh: Jl. Sudirman No. 45, Jakarta">{{ old('address') }}</textarea>
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm2" name="description" class="form-control" placeholder="Contoh: Mitra ini berfokus pada pelatihan keterampilan ekonomi dan manajemen.">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Sorot Status <span
                                    class="text-primary" data-bs-toggle="tooltip"
                                    title="Mitra akan ditampilkan di front-page">*</span></label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status_highlight" {{ old('status_highlight') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
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
                                    form="addPartner">Tambah Mitra</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
