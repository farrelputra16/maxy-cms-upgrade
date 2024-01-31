@extends('layout.master')

@section('title', 'Edit User')

@section('content')
    <div class="container" style="max-width: 1000px;">
        <h2 class="mb-3">Edit CCMH Grading</h2>
        <div class="card shadow shadow-sm">
            <div class="card-body">
                <form class="row g-3" action="" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="idUser" class="form-label fw-bold">ID User</label>
                        <input type="text" class="form-control" id="idUser"
                            value="{{ $courseClassMemberGrading->user->id }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="studentName" class="form-label fw-bold">Student Name</label>
                        <input type="text" class="form-control" id="studentName"
                            value="{{ $courseClassMemberGrading->user->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="submittedFile" class="form-label fw-bold">Submitted File</label>
                        <div>
                            <a
                                href="{{ asset(
                                    'uploads/course_class_member_grading/' .
                                        \Str::snake(\Str::lower($courseClassMemberGrading->courseClassModule->courseModule->course->name)) .
                                        '/' .
                                        \Str::snake(\Str::lower($courseClassMemberGrading->user->name)) .
                                        '/' .
                                        \Str::snake(\Str::lower($courseClassMemberGrading->courseClassModule->courseModule->name)) .
                                        '/' .
                                        $courseClassMemberGrading->submitted_file,
                                ) }}">{{ $courseClassMemberGrading->submitted_file }}</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="studentComment" class="form-label fw-bold">Student Comment</label>
                        <input type="text" class="form-control"
                            value="{{ strip_tags($courseClassMemberGrading->comment) }}">

                    </div>

                    <div class="col-md-12">
                        <label for="grade" class="form-label fw-bold">Grade (min: 0, max: 100)</label>
                        <input type="number" class="form-control" id="grade" name="grade"
                            value="{{ $courseClassMemberGrading->grade }}" min="0" max="100">
                    </div>

                    <div class="col-12">
                        <label for="tutorComment" class="form-label fw-bold">Tutor Comment</label>
                        <textarea class="form-control" id="tutorComment" name="tutor_comment">{!! $courseClassMemberGrading->tutor_comment !!}</textarea>
                    </div>

                    <div class="col-12 text-end">
                        <a href="{{ route('getGradeCCMH') }}" class="btn btn-danger">Batal</a>
                        <button class="btn btn-primary">Save & Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
