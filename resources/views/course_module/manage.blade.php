@extends('layout.main-v3')

@section('title', isset($module_detail) ? 'Edit Parent Module' : 'Add New Parent Module')

@section('content')
    <!-- start page header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ isset($module_detail) ? 'Edit Parent Module' : 'Add New Parent Module' }}
                </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourse') }}">Course</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('getCourseModule', ['course_id' => $course_detail->id]) }}">Modules:
                                {{ $course_detail->name }}</a>
                        </li>
                        <li class="breadcrumb-item active">
                            {{ isset($module_detail) ? 'Edit Parent Module: ' . $module_detail->name : 'Add New Parent Module' }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page header -->

    <!-- start content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @if (isset($module_detail))
                            {{ $module_detail->name }} <small>[ ID: {{ $module_detail->id }} ]</small>
                        @else
                            Add New Parent Module for: {{ $course_detail->name }}
                        @endif
                    </h4>
                    <p class="card-title-desc">
                        This page is used to
                        {{ isset($module_detail) ? 'edit an existing parent module data' : 'create a new parent module' }}
                    </p>

                    <form
                        action="{{ isset($module_detail) ? route('postEditCourseModule', ['id' => $module_detail->id, 'course_id' => $module_detail->course_id]) : route('postAddCourseModule') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Course Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="course_name"
                                    value="{{ $course_detail->name }}" disabled>
                                <input type="hidden" name="course_id" value="{{ $course_detail->id }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Module Name <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Required">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', isset($module_detail) ? $module_detail->name : '') }}"
                                    id="name" placeholder="Enter the name of the module..." required>
                                @if ($errors->has('name'))
                                    @foreach ($errors->get('name') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Day <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Required">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="priority"
                                    value="{{ old('priority', isset($module_detail) ? $module_detail->priority : '') }}"
                                    placeholder="Enter the day number of the module..." min="1" required>
                                @if ($errors->has('priority'))
                                    @foreach ($errors->get('priority') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Admin Notes</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="description"
                                    placeholder="This note won't be shown to the students. Only admins or mentors can see it"
                                    value="{{ old('description', isset($module_detail) ? $module_detail->description : '') }}">
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="input-status">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="input-status" name="status"
                                    {{ old('status', isset($module_detail) ? $module_detail->status : false) ? 'checked' : '' }}>
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to archive the data instead of publishing it"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit"
                                    class="btn maxy-btn-secondary w-md text-center">{{ isset($module_detail) ? 'Save' : 'Add New Parent Module' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- akhir col -->
    </div> <!-- akhir row -->
@endsection

@section('script')

@endsection
