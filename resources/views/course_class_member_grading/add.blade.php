@extends('layout.master')

@section('title', 'add User')

@section('content')
    <div class="container" style="max-width: 1000px;">
        <h2 class="mb-3">Add CCMH Grading</h2>
        <div class="card shadow shadow-sm">
            <div class="card-body">
                <form class="row g-3" action="{{ route('postAddCCMH') }}" method="POST">
                    @csrf
                    <div class="col-md-6">
                        <label for="idUser" class="form-label fw-bold">ID User</label>
                        <input type="text" class="form-control" id="idUser" value="{{ $user_id }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="moduleId" class="form-label fw-bold">ID Module</label>
                        <input type="text" class="form-control" id="moduleId" value="{{ $module }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="studentName" class="form-label fw-bold">Student Name</label>
                        <input type="text" class="form-control" id="studentName" value="{{ $user_name }}">
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
