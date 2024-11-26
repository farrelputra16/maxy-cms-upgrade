@extends('layout.main-v3')

@section('title', 'Ubah Voucher')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getVoucher') }}">Voucher</a></li>
                        <li class="breadcrumb-item active">Ubah Voucher</li>
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

                    <h4 class="card-title">Ubah Voucher: {{ $currentData->name }}</h4>
                    <p class="card-title-desc">Gunakan halaman ini untuk memperbarui informasi voucher. Pastikan semua data
                        yang Anda masukkan akurat agar sesuai dengan kebutuhan pengguna.</p>

                    <form action="{{ route('postEditVoucher', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $currentData->name) }}" id="name">
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
                                <input class="form-control" type="text" name="code"
                                    value="{{ old('code', $currentData->code) }}" id="code">
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
                                <input class="form-control" type="datetime-local" name="start_date" id="start_date"
                                    value="{{ old('start_date', $currentData->start_date) }}">
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
                                <input class="form-control" type="datetime-local" name="end_date" id="end_date"
                                    value="{{ old('end_date', $currentData->end_date) }}">
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
                                    <option value="PERCENTAGE"
                                        {{ old('discount_type', $currentData->discount_type) == 'PERCENTAGE' ? 'selected' : '' }}>
                                        PERSENTASE</option>
                                    <option value="FIXED"
                                        {{ old('discount_type', $currentData->discount_type) == 'FIXED' ? 'selected' : '' }}>
                                        TETAP</option>
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
                                <input class="form-control" type="number" name="discount"
                                    value="{{ old('discount', $currentData->discount) }}" id="discount">
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
                                <input class="form-control" type="number" name="max_discount"
                                    value="{{ old('max_discount', $currentData->max_discount) }}" id="max_discount">
                                @if ($errors->has('max_discount'))
                                    @foreach ($errors->get('max_discount') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="elm2" class="form-control" name="description" id="description" placeholder="Masukkan Deskripsi">{{ old('description', $currentData->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($currentData) ? $currentData->status : false) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
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
        </div> <!-- Akhir Kolom -->
    </div> <!-- Akhir Baris -->
@endsection

@section('script')

@endsection
