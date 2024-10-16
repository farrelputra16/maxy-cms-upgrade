@extends('layout.main-v3')

@section('title', 'Duplicate Class')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Partner's Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Class</a></li>
                        <li class="breadcrumb-item active">Duplicate Class</li>
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

                    <h4 class="card-title">Duplicate Class</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postDuplicateCourseClass') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <br>
                        <h4><b>Choose Class</b></h4>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Class</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_class_id" data-placeholder="Choose ..."
                                    id="type_selector">
                                    @foreach ($class_list as $item)
                                        <option value="{{ $item->id }}">{{ $item->course_name }} Batch
                                            {{ $item->batch }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseid'))
                                    @foreach ($errors->get('courseid') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <br>
                        <h4><b>New Class</b></h4>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_id" data-placeholder="Choose ..."
                                    id="type_selector">
                                    @foreach ($course_list as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_id'))
                                    @foreach ($errors->get('course_id') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Batch</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch"
                                    placeholder="Masukkan Batch">
                                @if ($errors->has('batch'))
                                    @foreach ($errors->get('batch') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status">
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Duplicate Course Module</button>
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
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
