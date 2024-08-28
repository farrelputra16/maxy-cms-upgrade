@extends('layout.main-v3')

@section('title', 'Edit Blog')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Grade Submission</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getGrade') }}">Submission List</a></li>
                        <li class="breadcrumb-item active">Grade Submission</li>
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

                    <h4 class="card-title">Grade Submission <small>[ ID: {{ $data->id }} ]</small></h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditGrade', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $data->class_id }}">

                        <div class="mb-3 row">
                            <label for="input-module-name" class="col-md-2 col-form-label">Module Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="module_name"
                                    value="{{ $data->module_name }}" id="input-module-name" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-student-name" class="col-md-2 col-form-label">Student Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="student_name"
                                    value="{{ $data->user_name }}" id="input-student-name" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-slug" class="col-md-2 col-form-label">Submission</label>
                            <div class="col-md-10">
                                <a href="{{ asset($data->submission_url) }}" target="_blank"
                                    download="{{ $data->submitted_file }}">{{ $data->submitted_file }}</a>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-comment" class="col-md-2 col-form-label">Student's Comment</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="comment">{{ $data->comment }}</textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-grade" class="col-md-2 col-form-label">Grade</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="grade" value="{{ $data->grade }}"
                                    id="input-grade">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="input-tutor-comment" class="col-md-2 col-form-label">Tutor's Comment</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="tutor_comment">{{ $data->tutor_comment }}</textarea>
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

@endsection
