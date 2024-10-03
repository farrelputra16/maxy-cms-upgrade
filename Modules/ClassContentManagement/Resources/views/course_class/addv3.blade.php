@extends('layout.main-v3')

@section('title', 'Add New Course Class')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Class</a></li>
                        <li class="breadcrumb-item active">Add New Course Class</li>
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

                    <h4 class="card-title">Add New Course Class</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postAddCourseClass') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="text" name="img_keep" value="{{ $blog->cover_img }}" hidden> --}}

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Course</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_id"
                                data-placeholder="Choose ..." id="type_selector">
                                    @foreach ($allCourses as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseid'))
                                    @foreach ($errors->get('courseid') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Batch</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="batch" id="batch"
                                    placeholder="Masukkan Batch">
                                @if ($errors->has('batch'))
                                    @foreach ($errors->get('batch') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Start Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="start" id="date">
                                @if ($errors->has('start'))
                                    @foreach ($errors->get('start') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">End Date</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="end" id="date">
                                @if ($errors->has('end'))
                                    @foreach ($errors->get('end') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-name" class="col-md-2 col-form-label">Quota</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="quota" min=0>
                                @if ($errors->has('quota'))
                                    @foreach ($errors->get('quota') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="credits" class="col-md-2 col-form-label">Credits</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="credits" id="credits">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="duration" class="col-md-2 col-form-label">Durations</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="duration" id="duration">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Announcement</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="announcement"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description"></textarea>
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
                                <button type="submit" class="btn btn-primary w-md text-center">Add Course</button>
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
