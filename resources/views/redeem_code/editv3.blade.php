@extends('layout.main-v3')

@section('title', 'Ubah Redeem Code')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Members</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getRedeemCode') }}">Redeem Codes</a></li>
                        <li class="breadcrumb-item active">Ubah Redeem Code</li>
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

                    <h4 class="card-title">Ubah Redeem Code: {{ $currentData->name }}</h4>
                    <p class="card-title-desc">Halaman ini digunakan untuk memperbarui informasi redeem code.</p>

                    <form action="{{ route('postEditRedeemCode') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id" value="{{ $currentData->id }}" style="display: none;">

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Nama</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name', $currentData->name) }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Kode</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="code" id="code"
                                    value="{{ old('code', $currentData->code) }}">
                                @if ($errors->has('code'))
                                    @foreach ($errors->get('code') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Kuota</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="quota" id="quota"
                                    value="{{ old('quota', $currentData->quota) }}">
                                @if ($errors->has('quota'))
                                    @foreach ($errors->get('quota') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Tipe</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="type" value="{{ old('type', $currentData->type) }}">
                                @if ($errors->has('type'))
                                    @foreach ($errors->get('type') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Waktu Kadaluarsa</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="expired_date"
                                    value="{{ old('expired_date', $currentData->expired_date) }}">
                                @if ($errors->has('expired_date'))
                                    @foreach ($errors->get('expired_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{-- <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Access Master saat ini</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="access_master_old[]" id="type_selector">
                                    @foreach ($current_course_class_redeem_code as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} -
                                            Batch{{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                                <small>Pilih untuk hapus Access Master</small>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Access Master tersedia</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="access_master_available[]" id="type_selector">
                                    @foreach ($allcourse_class_redeem_code as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }} -
                                            Batch{{ $item->batch }}</option>
                                    @endforeach
                                </select>
                                <small>Pilih untuk tambah Access Master</small>
                            </div>
                        </div> --}}
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Deskripsi</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" id="description">{{ old('description', $currentData->description) }}</textarea>
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
                                <button type="submit" class="btn btn-primary w-md text-center">Save & Update</button>
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
        $('#hapus, #tambah').multiselect({
            maxHeight: 300,
            includeSelectAllOption: true,
            enableFiltering: true,
        });
    </script>

@endsection
