@extends('layout.main-v3')

@section('title', 'Edit Member Attendance')

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
                        <li class="breadcrumb-item"><a href="">Attendance</a></li>
                        <li class="breadcrumb-item active">Edit Member Attendance</li>
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

                    <h4 class="card-title"> Edit Member Attendance:{{ $attendance->user_name }}</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditMemberAttendance') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $class->id }}">
                        <input type="hidden" name="attendance_id" value="{{ $attendance->id }}">
                        <input type="hidden" name="class_attendance_id" value="{{ $class_attendance_id }}">

                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" placeholder="Masukkan Nama"
                                    value="{{ $attendance->user_name }}" id="name" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Status</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="status" data-placeholder="Choose ...">
                                    <option value="0" @if ($attendance->status == 0) selected @endif
                                        {{ old('status') == 0 ? 'selected' : '' }}>Tidak Hadir
                                    </option>
                                    <option value="1" @if ($attendance->status == 1) selected @endif
                                        {{ old('status') == 1 ? 'selected' : '' }}>Hadir</option>
                                    <option value="2" @if ($attendance->status == 2) selected @endif
                                        {{ old('status') == 2 ? 'selected' : '' }}>Izin</option>
                                </select>
                            </div>
                        </div>
                        @if ($attendance->feedback != null)
                            <div class="mb-3 row">
                                <label>Feedback</label>
                                <div class="card w-100 h-100">
                                    <ul class="list-group list-group-flush">
                                        @foreach (json_decode($attendance->feedback) as $item)
                                            <li class="list-group-item">
                                                <b>{{ $item->question }}</b>
                                                <p>{{ $item->answer }}</p>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="mb-3 row">
                                <label>Feedback</label>
                                <div class="card w-100 h-100">
                                    <ul class="list-group list-group-flush">
                                        No Feedback
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description', $class->description) }}</textarea>
                            </div>
                        </div>
                        {{-- <div class="mb-3 row">
                            <label for="input-description" class="col-md-2 col-form-label">Short Description</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="short_description"
                                    value="{{ $class->short_description }}" id="input-description">
                            </div>
                        </div> --}}
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
