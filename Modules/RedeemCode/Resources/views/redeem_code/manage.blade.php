@extends('layout.main-v3')

@section('title', isset($data) ? 'Edit Course' : 'Add New Course')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ isset($data) ? 'Edit Redeem Code' : 'Add New Redeem Code' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('redeemCode.index') }}">Redeem Codes</a></li>
                        <li class="breadcrumb-item active">
                            {{ isset($data) ? 'Edit Redeem Code' : 'Add New Redeem Code' }}
                        </li>
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
                    <h4 class="card-title">
                        @if (isset($data))
                            {{ $data->name }} <small>[ #{{ $data->id }} ]</small>
                        @else
                            Add New Redeem Code
                        @endif
                    </h4>
                    <p class="card-title-desc">
                        This page is used to manage redeem code data. Create a new one or edit an existing redeem code.
                    </p>

                    <form
                        action="{{ isset($data) ? route('redeemCode.postEdit', ['id' => $data->id]) : route('redeemCode.postAdd') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <hr>
                        <strong class="text-secondary">GENERAL DATA</strong>

                        <!-- start name -->
                        <div class="my-3 row">
                            <label for="name" class="col-md-2 col-form-label">
                                Name <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name', isset($data) ? $data->name : '') }}"
                                    placeholder="Enter the name of the course..." required>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end name -->

                        <!-- start code -->
                        <div class="mb-3 row">
                            <label for="code" class="col-md-2 col-form-label">
                                Redeem Code <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="code" id="code"
                                    value="{{ old('code', isset($data) ? $data->code : '') }}"
                                    placeholder="Enter the code for this redeem code..." required>
                                @if ($errors->has('code'))
                                    @foreach ($errors->get('code') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end code -->

                        <!-- start quota -->
                        <div class="mb-3 row">
                            <label for="quota" class="col-md-2 col-form-label">
                                Quota <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="quota" id="quota"
                                    value="{{ old('quota', isset($data) ? $data->quota : '') }}"
                                    placeholder="Enter the maximum amout of claim..." required>
                                @if ($errors->has('quota'))
                                    @foreach ($errors->get('quota') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end quota -->

                        <!-- start expiration date -->
                        <div class="mb-3 row">
                            <label for="expired_date" class="col-md-2 col-form-label">
                                Expiration Date
                            </label>
                            <div class="col-md-10">
                                <input id="expired_date" class="form-control" type="datetime-local" name="expired_date"
                                    value="{{ old('expired_date', isset($data) ? $data->expired_date : '') }}">
                                @if ($errors->has('expired_date'))
                                    @foreach ($errors->get('expired_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end expiration date -->

                        <hr>
                        <strong class="text-secondary">FOOTER DATA</strong>

                        <!-- start description (admin notes) -->
                        <div class="my-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Admin Notes</label>
                            <div class="col-md-10">
                                <input type="text" id="input-description" name="description" class="form-control"
                                    placeholder="This note won't be shown to the students. Only admins or mentors can see it"
                                    value="{{ old('description', isset($data) ? $data->description : '') }}">
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- end admin notes -->

                        <!-- start status -->
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" value="1"
                                    {{ old('status', isset($data) ? $data->status : false) ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to archive the data instead of publishing it"></i>
                                </span>
                            </div>
                        </div>
                        <!-- end status -->

                        <!-- start submit button -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit"
                                    class="btn maxy-btn-secondary w-md text-center">{{ isset($data) ? 'Save' : 'Create' }}</button>
                            </div>
                        </div>
                        <!-- end submit button -->

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        // Function to restrict special characters
        function restrictSpecialChars(event) {
            const regex = /^[a-zA-Z0-9\s]*$/; // Allows letters, numbers, and spaces only
            const input = event.target;
            const value = input.value;

            if (!regex.test(value)) {
                input.value = value.replace(/[^a-zA-Z0-9\s]/g, ''); // Remove invalid characters
            }
        }

        // Attach event listeners to input fields
        document.getElementById('name').addEventListener('input', restrictSpecialChars);
    </script>
@endsection
