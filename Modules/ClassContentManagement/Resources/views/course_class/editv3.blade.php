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
                        <li class="breadcrumb-item active">Edit Class: {{ $course_class_detail->course_id }}
                            {{ $course_class_detail->batch }}</li>
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

                    <h4 class="card-title">{{ $course_class_detail->course_id }} <small>[ Batch:
                            {{ $course_class_detail->batch }} ]</small></h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditCourseClass', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-md-10">
                                <input type="hidden" name="course_class_id" value="{{ $course_class_detail->id }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-batch" class="col-md-2 col-form-label">Batch</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch"
                                    value="{{ $course_class_detail->batch }}" id="batch">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-batch" class="col-md-2 col-form-label">Quota</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="quota"
                                    value="{{ $course_class_detail->quota }}" id="batch">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-batch" class="col-md-2 col-form-label">Start Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start"
                                    value="{{ $course_class_detail->start_date }}" id="batch">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-batch" class="col-md-2 col-form-label">End Date</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="date" name="end"
                                        value="{{ $course_class_detail->end_date }}" id="batch">
                                </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_id" data-placeholder="Choose ..."
                                    id="type_selector">
                                    @foreach ($course_list as $items)
                                        <option value="{{ $items->id }}"
                                            @if ($items->id == $course_class_detail->course_id) selected @endif>
                                            {{ $items->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Announcement</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="announcement">{{ $course_class_detail->announcement }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ $course_class_detail->content }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ $course_class_detail->description }}</textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Ongoing</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="ongoing" data-placeholder="Choose ..."
                                    id="type_selector">
                                        <option value="0" @if ($course_class_detail->status_ongoing == 0) selected @endif> Not
                                            Started </option>
                                        <option value="1" @if ($course_class_detail->status_ongoing == 1) selected @endif> Ongoing
                                        </option>
                                        <option value="2" @if ($course_class_detail->status_ongoing == 2) selected @endif> Completed
                                        </option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ $course_class_detail->status == 1 ? 'checked' : '' }} name="status">
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
