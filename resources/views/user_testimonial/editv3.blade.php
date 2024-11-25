@extends('layout.main-v3')

@section('title', 'Ubah Member Testimonial')

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
                        <li class="breadcrumb-item active">Ubah Testimonial</li>
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

                    <h4 class="card-title">Ubah Testimonial: {{ $currentData->membername }}</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditTestimonial', ['id' => request()->query('id')]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Rating (in stars)</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" min="1" max="5" name="stars"
                                    id="stars" value="{{ old('stars', $testimonials->stars) }}">
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
                                    value="{{ old('role', $testimonials->role) }}">
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
                                <select class="form-control select2" name="user_id" id="type_selector">
                                    @if ($currentData != null)
                                        <option selected value="{{ $currentData->user_id }}"> {{ $currentData->membername }}
                                        </option>
                                    @endif
                                    @foreach ($allmember as $item)
                                        <option value="{{ $item->id }}" {{ old('user_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course Class Batch</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_class_id" id="type_selector">
                                    @if ($currentData != null)
                                        <option selected value="{{ $currentData->course_class_id }}">
                                            {{ $currentData->coursebatch }}
                                        </option>
                                    @endif
                                    @foreach ($allcourseclass as $item)
                                        <option value="{{ $item->id }}" {{ old('course_class_id') == $item->id ? 'selected' : '' }}>{{ $item->batch }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content" id="content">{{ old('content', $testimonials->content) }}</textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm2" name="description" id="description" class="form-control">{{ old('description', $testimonials->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($testimonials) ? $testimonials->status : false) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Highlight</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status_highlight" value="0">

                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status_highlight" value="1" {{ old('status', isset($testimonials) ? $testimonials->status_highlight : false) ? 'checked' : '' }}>
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

@endsection
