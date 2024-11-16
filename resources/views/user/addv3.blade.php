@extends('layout.main-v3')

@section('title', 'Tambah Pengguna Baru')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Pengguna Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Pengguna & Akses</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getUser') }}">Pengguna</a></li>
                        <li class="breadcrumb-item active">Tambah Pengguna Baru</li>
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

                    <h4 class="card-title">Tambah Pengguna Baru</h4>
                    <p class="card-title-desc">Isi formulir berikut untuk menambahkan data pengguna baru. Pastikan informasi
                        yang diisi sudah benar agar pengalaman belajar peserta tetap optimal.</p>

                    <form id="addUser" action="{{ route('postAddUser') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    placeholder="Masukkan Nama" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="birth" id="birth"
                                    placeholder="Masukkan Tanggal Lahir" value="{{ old('birth') }}">
                                @if ($errors->has('birth'))
                                    @foreach ($errors->get('birth') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Email <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="email" name="email" id="email"
                                    placeholder="Masukkan Email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    @foreach ($errors->get('email') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Peran <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="access_group" data-placeholder="Pilih Peran ..."
                                    id="type_selector">
                                    @foreach ($allAccessGroups as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('access_group') == $item->id ? 'selected' : '' }}>[{{ $item->id }}]
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('access_group'))
                                    @foreach ($errors->get('access_group') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nomor Telepon <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="phone" id="phone"
                                    placeholder="Masukkan Nomor Telepon"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    @foreach ($errors->get('phone') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Kata Sandi <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="Masukkan Kata Sandi" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    @foreach ($errors->get('password') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Alamat</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="address" id="address"
                                    placeholder="Masukkan Alamat" value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    @foreach ($errors->get('address') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Kode Pos</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="postal_code" id="postal_code"
                                    placeholder="Masukkan Kode Pos" value="{{ old('postal_code') }}">
                                @if ($errors->has('postal_code'))
                                    @foreach ($errors->get('postal_code') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi Pengguna
                                (Opsional)</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status', 1) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addUser">Simpan Pengguna</button>
                            </div>
                        </div>
                    </form>
                    <br>

                    @if (Route::has('user.import-csv'))
                        <form action="{{ route('user.import-csv') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf


                            <div class="mb-3">
                                <label for="csv_file" class="form-label">Upload CSV here</label>
                                <br>
                                <small>Sample: <i class="fa fa-file" aria-hidden="true"></i> <a
                                        href="{{ asset('csv/useraddexample.csv') }}" download>CSV
                                        Example (Click to Download)</a></small>
                                <input class="form-control" type="file" id="file" name="file">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Multiple Users</button>
                        </form>


                        {{-- <h4>Tambah Banyak Pengguna Melalui Unggah File CSV</h4>
                        <form action="{{ route('user.import-csv') }}" method="post" enctype="multipart/form-data"
                            class="dropzone text-center" id="csv-upload">
                            @csrf
                            <div class="row justify-content-center align-items-center" style="height: 100%;">
                                <div class="col-6">
                                    <div class="fallback">
                                        <input name="csv_file" type="file" id="csv_file" accept=".csv">
                                        @error('csv_file')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                        </div>
                                        <h4>Seret file ke sini atau klik untuk unggah.</h4>
                                        <br>
                                        <small>Contoh: <i class="fa fa-file" aria-hidden="true"></i> <a
                                                href="{{ asset('csv/useraddexample.csv') }}" download>contoh CSV (klik
                                                untuk unduh)</a></small>
                                    </div>
                                </div>
                            </div>
                        </form> --}}
                    @endif
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('style')
    <style>
        #csv-upload {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 30%;
        }

        .dz-message {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #csv-upload .dz-message h4 {
            font-size: 18px;
            font-weight: bold;
            white-space: nowrap;
        }

        #csv-upload .dz-message small {
            font-size: 14px;
            color: #666;
            white-space: nowrap;
        }
    </style>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/cms-v3/libs/dropzone/dropzone.min.js') }}"></script>
@endsection
