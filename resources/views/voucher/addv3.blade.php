@extends('layout.main-v3')

@section('title', 'Tambah Voucher')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Data Baru</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getVoucher') }}">Voucher</a></li>
                        <li class="breadcrumb-item active">Tambah Voucher</li>
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

                    <h4 class="card-title">Tambah Voucher Baru</h4>
                    <p class="card-title-desc">Gunakan halaman ini untuk menambahkan informasi voucher baru. Pastikan semua
                        data yang Anda masukkan akurat untuk memaksimalkan pengalaman pengguna.</p>

                    <form id="addVoucher" action="{{ route('postAddVoucher') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ old('name') }}" name="name"
                                    id="name" placeholder="Masukkan Nama Voucher">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-code" class="col-md-2 col-form-label">Kode</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ old('code') }}" name="code"
                                    id="code" placeholder="Masukkan Kode Voucher">
                                @if ($errors->has('code'))
                                    @foreach ($errors->get('code') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-start-date" class="col-md-2 col-form-label">Waktu Mulai</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" value="{{ old('start_date') }}"
                                    name="start_date" id="start_date">
                                @if ($errors->has('start_date'))
                                    @foreach ($errors->get('start_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-end-date" class="col-md-2 col-form-label">Waktu Berakhir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" value="{{ old('end_date') }}"
                                    name="end_date" id="end_date">
                                @if ($errors->has('end_date'))
                                    @foreach ($errors->get('end_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-discount-type" class="col-md-2 col-form-label">Jenis Diskon</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="discount_type" id="type_selector">
                                    <option value="">-- Pilih Jenis Diskon --</option>
                                    <option value="PERCENTAGE"
                                        {{ old('discount_type') == 'PERCENTAGE' ? 'selected' : '' }}>PERSENTASE</option>
                                    <option value="FIXED" {{ old('discount_type') == 'FIXED' ? 'selected' : '' }}>TETAP
                                    </option>
                                </select>
                                @if ($errors->has('discount_type'))
                                    @foreach ($errors->get('discount_type') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-discount" class="col-md-2 col-form-label">Diskon</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" value="{{ old('discount') }}" name="discount"
                                    id="discount" placeholder="Masukkan Nilai Diskon">
                                @if ($errors->has('discount'))
                                    @foreach ($errors->get('discount') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-max-discount" class="col-md-2 col-form-label">Maks Diskon</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" value="{{ old('maxdiscount') }}"
                                    name="maxdiscount" id="maxdiscount" placeholder="Contoh: 5">
                                @if ($errors->has('maxdiscount'))
                                    @foreach ($errors->get('maxdiscount') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" id="description" placeholder="Masukkan Deskripsi">{{ old('description') }}</textarea>
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
                                    form="addVoucher">Tambah Voucher</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- Akhir Kolom -->
    </div> <!-- Akhir Baris -->
@endsection

@section('script')

@endsection
