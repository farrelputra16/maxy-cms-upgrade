@extends('layout.main-v3')

@section('title', 'Edit Event Type')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Class</a></li>

                        @php
                            // Mencari nama kursus berdasarkan course_id
                            $course_name =
                                $course_list->firstWhere('id', $course_class_detail->course_id)->name ??
                                'Unknown Course';
                        @endphp

                        <li class="breadcrumb-item active">Edit Class: {{ $course_name }} {{ $course_class_detail->batch }}
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

                    <h4 class="card-title">{{ $course_name }} <small>[ Batch: {{ $course_class_detail->batch }} ]</small>
                    </h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditCourseClass', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="course_class_id" value="{{ $course_class_detail->id }}">

                        <div class="mb-3 row">
                            <label for="batch" class="col-md-2 col-form-label">Batch</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch"
                                    value="{{ old('batch', $course_class_detail->batch) }}" id="batch">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Slug</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="slug" id="slug"
                                    value="{{ old('slug', $course_class_detail->slug) }}">
                                @if ($errors->has('slug'))
                                    @foreach ($errors->get('slug') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="quota" class="col-md-2 col-form-label">Quota</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="quota"
                                    value="{{ old('quota', $course_class_detail->quota) }}" id="quota">
                                @if ($errors->has('quota'))
                                    @foreach ($errors->get('quota') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="start" class="col-md-2 col-form-label">Start Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start"
                                    value="{{ old('start', $course_class_detail->start_date) }}" id="start">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="end" class="col-md-2 col-form-label">End Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="end"
                                    value="{{ old('end', $course_class_detail->end_date) }}" id="end">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="course_id" class="col-md-2 col-form-label">Course</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_id" data-placeholder="Choose ..."
                                    id="course_id">
                                    @foreach ($course_list as $items)
                                        <option value="{{ $items->id }}" {{ old('course_id') == $items->id ? 'selected' : '' }}
                                            @if ($items->id == $course_class_detail->course_id) selected @endif>
                                            {{ $items->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="credits" class="col-md-2 col-form-label">Credits</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits"
                                    value="{{ old('credits', $course_class_detail->credits) }}" id="credits">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="duration" class="col-md-2 col-form-label">Durations</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="duration"
                                    value="{{ old('duration', $course_class_detail->duration) }}" id="duration">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="announcement" class="col-md-2 col-form-label">Announcement</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="announcement" class="form-control">{{ old('announcement', $course_class_detail->announcement) }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content" class="form-control">{{ old('content', $course_class_detail->content) }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description" class="form-control">{{ old('description', $course_class_detail->description) }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ongoing" class="col-md-2 col-form-label">Ongoing</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="ongoing" data-placeholder="Choose ..."
                                    id="ongoing">
                                    <option value="0" {{ old('ongoing') == 0 ? 'selected' : '' }}@if ($course_class_detail->status_ongoing == 0) selected @endif>Not Started
                                    </option>
                                    <option value="1" {{ old('ongoing') == 1 ? 'selected' : '' }} @if ($course_class_detail->status_ongoing == 1) selected @endif>Ongoing
                                    </option>
                                    <option value="2" {{ old('ongoing') == 2 ? 'selected' : '' }} @if ($course_class_detail->status_ongoing == 2) selected @endif>Completed
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="statusSwitch">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <!-- Hidden input untuk mengirim nilai 0 jika checkbox tidak dicentang -->
                                <input type="hidden" name="status" value="0">
                                
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($course_class_detail) ? $course_class_detail->status : false) ? 'checked' : '' }}>
                                <label for="statusSwitch" class="m-0">Aktif</label>
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
    <!-- Tambahkan skrip tambahan di sini jika diperlukan -->
@endsection
