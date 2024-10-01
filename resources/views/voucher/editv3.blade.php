@extends('layout.main-v3')

@section('title', 'Edit Voucher')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Transcation</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getVoucher') }}">Voucher</a></li>
                        <li class="breadcrumb-item active">Edit Voucher</li>
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

                    <h4 class="card-title">Edit User: {{ $currentData->name }}</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditVoucher', ['id' => request()->query('id')])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $currentData->name }}"
                                    id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Code</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="code"
                                    value="{{ $currentData->nickname }}" id="code">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Waktu Mulai</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="start_date" id="start_date" value="{{ $currentData->start_date }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Waktu Berakhir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" name="end_date" id="end_date" value="{{ $currentData->end_date }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Discount Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="discount_type" id="type_selector">
                                    @if ($currentData->discount_type == 'PERCENTAGE')
                                    <option value="PERCENTAGE">PERCENTAGE</option>
                                    <option value="FIXED">FIXED</option>
                                    @elseif ($currentData->discount_type == 'FIXED')
                                    <option value="PERCENTAGE">PERCENTAGE</option>
                                    <option value="FIXED">FIXED</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Discount</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $currentData->discount }}"
                                    id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Max Discount</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="maxdiscount" value="{{ $currentData->max_discount }}"
                                    id="name">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" id="description" placeholder="Enter Description">{{ $currentData->description }}</textarea>
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

@endsection
