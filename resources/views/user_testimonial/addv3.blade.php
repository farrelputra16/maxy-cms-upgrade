@extends('layout.main-v3')

@section('title', 'Add Member Testimonial')

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
                        <li class="breadcrumb-item"><a href="{{ route('getTestimonial') }}">Testimonials</a></li>
                        <li class="breadcrumb-item active">Add Testimonial</li>
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

                    <h4 class="card-title">Add New Member Testimonial</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="addTestimonial" action="{{ route('postAddTestimonial') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Rating (in stars)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" min="1" max="5" name="stars"
                                    id="stars" value="{{ old('stars') }}">
                                @if ($errors->has('stars'))
                                    @foreach ($errors->get('stars') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Role</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="role" id="role"
                                    placeholder="Ex : Alumni Bootcamp Rapid UI/UX Batch 3" value="{{ old('role') }}">
                                @if ($errors->has('role'))
                                    @foreach ($errors->get('role') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">User</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="user_id" id="type_selector_user">
                                    <option selected value="">-- Pilih User --</option>
                                    @foreach ($allmember as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('user_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                    @foreach ($errors->get('user_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Class Batch</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_class_id" id="type_selector">
                                    <option selected value="">-- Pilih Batch Course Class --</option>
                                    @foreach ($allcourseclass as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('course_class_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->slug }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_class_id'))
                                    @foreach ($errors->get('course_class_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content" id="content">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content_en" class="col-md-2 col-form-label">Content (Inggris)</label>
                            <div class="col-md-10">
                                <textarea id="elm2" name="content_en" id="content_en">{{ old('content_en') }}</textarea>
                                @if ($errors->has('content_en'))
                                    @foreach ($errors->get('content_en') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="content" rows="7" name="description" class="form-control">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    @foreach ($errors->get('description') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Highlight</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status_highlight" value="1"
                                    {{ old('status_highlight') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addTestimonial">Add Testimonial</button>
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
