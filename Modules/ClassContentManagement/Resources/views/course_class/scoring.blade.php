@extends('layout.main-v3')

@section('title', 'Edit Scoring')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Class</a></li>
                        <li class="breadcrumb-item active">Edit Scoring: {{ $id }}</li>
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

                    <h4 class="card-title">{{ $classes[0]->CourseClass->slug }} <small>[ ID: {{ $id }} ]</small></h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p><br>

                    <form action="{{ route('postCourseClassScoring', ['id' => $id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Attendance</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="attendance" value="{{ $classes[0]->CourseClass->percentage }}" id="input-title">
                            </div>
                        </div>

                        @foreach($classes as $item)
                        <div class="mb-3 row">
                            <label for="input-member" class="col-md-2 col-form-label">{{ $item->CourseModule->name }}</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="{{ $item->id }}" value="{{ $item->percentage }}" id="input-member">
                            </div>
                        </div>
                        @endforeach

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
        
    </script>
@endsection
