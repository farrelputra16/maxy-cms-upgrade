@extends('layout.main-v3')

@section('title', 'Add Voucher')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Transaction</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getVoucher') }}">Voucher</a></li>
                        <li class="breadcrumb-item active">Add Voucher</li>
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

                    <h4 class="card-title">Add New Voucher</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="addVoucher" action="{{ route('postAddVoucher') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
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
                            <label for="input-name" class="col-md-2 col-form-label">Code</label>
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
                            <label for="input-name" class="col-md-2 col-form-label">Waktu Mulai</label>
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
                            <label for="input-name" class="col-md-2 col-form-label">Waktu Berakhir</label>
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
                            <label for="input-tag" class="col-md-2 col-form-label">Discount Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="discount_type" id="type_selector">
                                    <option value="">-- Pilih Discount Type --</option>
                                    <option value="PERCENTAGE"
                                        {{ old('discount_type') == 'PERCENTAGE' ? 'selected' : '' }}>PERCENTAGE
                                    </option>
                                    <option value="FIXED" {{ old('discount_type') == 'FIXED' ? 'selected' : '' }}>FIXED
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
                            <label for="input-name" class="col-md-2 col-form-label">Discount</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" value="{{ old('discount') }}" name="discount"
                                    id="discount">
                                @if ($errors->has('discount'))
                                    @foreach ($errors->get('discount') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Max Discount</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" value="{{ old('maxdiscount') }}"
                                    name="maxdiscount" id="maxdiscount" placeholder="e.g. 5">
                                @if ($errors->has('maxdiscount'))
                                    @foreach ($errors->get('maxdiscount') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" id="description" placeholder="Enter Description">{{ old('description') }}</textarea>
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
                                    form="addVoucher">Add Voucher</button>
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
