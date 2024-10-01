@extends('layout.main-v3')

@section('title', 'Edit Blog')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getTransOrder') }}">Order</a></li>
                        <li class="breadcrumb-item active">Edit Order: {{ $data->order_number }}</li>
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

                    <h4 class="card-title">{{ $data->order_number }} <small>[ ID: {{ $data->id }} ]</small></h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditTransOrder', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Order Number</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" value="{{ $data->order_number }}"
                                    id="input-title" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-member" class="col-md-2 col-form-label">Member</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="member" value="{{ $data->users_name }}"
                                    id="input-member" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-course" class="col-md-2 col-form-label">Course</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="course" value="{{ $data->course_name }}"
                                    id="input-course" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-date" class="col-md-2 col-form-label">Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="date" value="{{ $data->date }}"
                                    id="input-date" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-price" class="col-md-2 col-form-label">Price</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="price" value="{{ $data->total }}"
                                    id="input-price" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-discount" class="col-md-2 col-form-label">Discount</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="discount" value="{{ $data->discount }}"
                                    id="input-discount" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-total" class="col-md-2 col-form-label">Total</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="total"
                                    value="{{ $data->total_after_discount }}" id="input-total" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-payment-status" class="col-md-2 col-form-label">Payment Status</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="payment_status" data-placeholder="Choose ...">
                                    <option value="0" @if ($data->payment_status == 0) selected @endif>
                                        Not Completed
                                    </option>
                                    <option value="1" @if ($data->payment_status == 1) selected @endif>
                                        Completed
                                    </option>
                                    <option value="2" @if ($data->payment_status == 2) selected @endif>
                                        Partial
                                    </option>
                                    <option value="3" @if ($data->payment_status == 3) selected @endif>
                                        Cancelled
                                    </option>
                                    <option value="4" @if ($data->payment_status == 4) selected @endif>
                                        Unknown Status
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-course" class="col-md-2 col-form-label">Course</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="course"
                                    value="{{ $data->course_name }}" id="input-course" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-class" class="col-md-2 col-form-label">Class</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="class_id" data-placeholder="Choose ...">
                                    <option value="">Choose...</option>
                                    @foreach ($class_list as $key => $item)
                                        <option value="{{ $item->id }}"
                                            @if ($data->course_class_id == $item->id) selected @endif>
                                            {{ $item->course_name }} Batch {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-promo" class="col-md-2 col-form-label">Promo</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="promo"
                                    value="{{ $data->promotion_name }}" id="input-promo" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-agent" class="col-md-2 col-form-label">Seller Agent</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="agent"
                                    value="{{ $data->agent_name }}" id="input-agent" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Description
                                <small>(Admin)</small></label>
                            <div class="col-md-10">
                                <textarea id="elm1" type="text" name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10" style="display: flex; align-items: center;">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ $data->status == 1 ? 'checked' : '' }} name="status"
                                    style="left: 0;">
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Submit</button>
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
        // autofill slug
        document.getElementById('input-title').addEventListener('input', function() {
            var name = this.value;
            var slug = name.toLowerCase().trim().replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-');
            document.getElementById('input-slug').value = slug;
        });

        // preview image
        document.getElementById('input-file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('frame').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
