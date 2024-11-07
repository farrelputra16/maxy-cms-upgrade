@extends('layout.main-v3')

@section('title', 'Edit General Data')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a>Settings</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getGeneral') }}">General</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
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

                    <h4 class="card-title">Edit Data: {{ $generals->name }} </h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditGeneral', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $generals->name }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if ($generals->name == 'logo' || $generals->name == 'icon')
                            <div class="mb-3 row">
                                <label for="input-value" class="col-md-2 col-form-label">Current
                                    {{ $generals->name }}</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="value" id="value"
                                        value="{{ $generals->value }}">
                                    @if ($errors->has('value'))
                                        @foreach ($errors->get('value') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                    <img class="mt-2 img-fluid w-25" src="{{ asset('uploads/' . $generals->value) }}"
                                        alt="logo">
                                </div>
                            </div>
                        @else
                            <div class="mb-3 row">
                                <label for="input-value" class="col-md-2 col-form-label">Value</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="value" id="value"
                                        value="{{ $generals->value }}">
                                    @if ($errors->has('value'))
                                        @foreach ($errors->get('value') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Input untuk Gambar -->
                        @if ($generals->name == 'logo' || $generals->name == 'icon')
                            <div class="mb-3 row">
                                <label for="input-image" class="col-md-2 col-form-label">Image</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="image" id="image">
                                    @if ($errors->has('image'))
                                        @foreach ($errors->get('image') as $error)
                                            <span style="color: red;">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @else
                            <input type="text" name="image" hidden value="{{ $generals->image }}">
                        @endif


                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" id="description">{{ $generals->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" value="1" {{ $generals->status == 1 ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Save & Update
                                    General</button>
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
