@extends('layout.main-v3')

@section('title', 'Add New Grade')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getScore') }}">Grade</a></li>
                        <li class="breadcrumb-item active">Add New Grade</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- start content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add New Grade</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="addScore" action="{{ route('postAddScore') }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Grade Level</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="input-title" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Range Start</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="range_start" id="input-title"
                                inputmode="numeric" pattern="[0-9]*" 
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{ old('range_start') }}">
                                @if ($errors->has('range_start'))
                                    @foreach ($errors->get('range_start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Range End</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="range_end" id="input-title"
                                inputmode="numeric" pattern="[0-9]*" 
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{ old('range_end') }}">
                                @if ($errors->has('range_end'))
                                    @foreach ($errors->get('range_end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Description
                                <small>(Admin)</small></label>
                            <div class="col-md-10">
                                <textarea type="text" name="description" id="elm1">{{ old('description')}}</textarea>
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
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit" form="addScore">Submit</button>
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
