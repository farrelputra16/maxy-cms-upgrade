@extends('layout.main-v3')

@section('title', isset($data) ? 'Edit Sponsored Student Record' : 'Add New Sponsored Student Record')

@section('content')
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ isset($data) ? 'Edit Sponsored Student Record' : 'Add New Sponsored Student Record' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Donation Tracker</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('donator.index') }}">Donor List</a></li>
                        <li class="breadcrumb-item active">
                            {{ isset($data) ? 'Edit Sponsored Student Record: ' . $data->user_name . ' [ #' . $data->id . ' ]'  : 'Add New Sponsored Student Record' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Row -->
    <div class="row">

        <!-- Start Col -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @if (isset($data))
                            {{ $data->user_name }} <small>[ #{{ $data->id }} ]</small>
                        @else
                            Add New Sponsored Student Record
                        @endif
                    </h4>
                    <p class="card-title-desc">
                        This page is used to manage a Sponsored Student Record. Adjust the data information accordingly.
                    </p>

                    <form
                        action="{{ isset($data) ? route('donator.sponsored-list.postEdit', ['id' => $data->id]) : route('donator.sponsored-list.postAdd', ['donator_id' => $id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <hr>
                        <strong class="text-secondary">GENERAL DATA</strong>

                        <!-- Start Student -->
                        <div class="mb-3 row">
                            <label for="studentId" class="col-md-2 col-form-label">
                                Student <span class="text-danger" data-bs-toggle="tooltip"
                                    title="Required">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="studentId" id="studentId"
                                    data-placeholder="Select a Student">
                                    @foreach ($studentList as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('studentId') == $item->id ? 'selected' : (isset($data) && $data->user_id == $item->id ? 'selected' : '') }}>
                                            {{ $item->name }} (#{{ $item->id }})
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('studentId'))
                                    @foreach ($errors->get('studentId') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Student -->

                        <!-- Start Donation -->
                        <div class="mb-3 row">
                            <label for="donationId" class="col-md-2 col-form-label">
                                Donation <span class="text-danger" data-bs-toggle="tooltip"
                                    title="Required">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="donationId" id="donationId"
                                    data-placeholder="Select a Donation">
                                    @foreach ($donationList as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('donationId') == $item->id ? 'selected' : (isset($data) && $data->donation_id == $item->id ? 'selected' : '') }}>
                                            {{ $item->name }} <small>(remaining funds: {{ 'IDR ' . number_format($item->remainingFunds ?? 0, 0, ',', '.') }})</small>
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('donationId'))
                                    @foreach ($errors->get('donationId') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Donation -->

                        <!-- Start Value -->
                        <div class="mb-3 row">
                            <label for="value" class="col-md-2 col-form-label">
                                Value <span class="text-danger" data-bs-toggle="tooltip" title="Required">*</span>
                            </label>

                            <div class="col-md-10">
                                <input class="form-control" type="number" name="value"
                                    value="{{ old('value', isset($data) ? $data->value : '') }}" id="value">
                                @if ($errors->has('value'))
                                    @foreach ($errors->get('value') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Value -->

                        <hr>
                        <strong class="text-secondary">FOOTER DATA</strong>

                        <!-- Start Admin Notes -->
                        <div class="my-3 row">
                            <label for="admin-note" class="col-md-2 col-form-label">Admin Notes</label>
                            <div class="col-md-10">
                                <input type="text" id="admin-note" name="description" class="form-control"
                                    placeholder="This note won't be shown to the students. Only admins or mentors can see it"
                                    value="{{ old('description', isset($data) ? $data->description : '') }}">
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- End Admin Notes -->


                        <!-- Start Status -->
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
                        <!-- End Status -->

                        <!-- Start Submit Button -->
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit"
                                    class="btn maxy-btn-secondary w-md text-center">{{ isset($data) ? 'Save' : 'Add' }}</button>
                            </div>
                        </div>
                        <!-- End Submit Button -->

                    </form>

                </div>
            </div>
        </div>
        <!-- End Col -->

    </div>
    <!-- End Row -->
@endsection
