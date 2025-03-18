@extends('layout.main-v3')

@section('title', 'Add Class')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add Class</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('redeemCode.index') }}">Redeem Codes</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('redeemCode.index') }}">
                                Class List: {{ $data->name }}
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Add Class</li>
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
                        Manage
                    </h4>
                    <p class="card-title-desc">
                        This page is used to add classes to a redeem code to manage what class you can claim using a redeem
                        code.
                    </p>

                    <form action="{{ route('redeemCode.class.postAdd', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <hr>

                        <!-- Start Class Picker -->
                        <div class="mb-3 row">
                            <label for="class" class="col-md-2 col-form-label">Choose a Class</label>
                            <div class="col-md-10">
                                <select id="class" class="form-control select2 multiple" name="class[]"
                                    data-placeholder="Select the class you can claim using current redeem code" multiple="multiple">
                                    @foreach ($classList as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('class') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }} Batch {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- End Class Picker -->

                        <!-- Start Submit Button -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn maxy-btn-secondary w-md text-center">Add</button>
                            </div>
                        </div>
                        <!-- End Submit Button -->

                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

@endsection
