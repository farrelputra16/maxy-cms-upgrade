@extends('layout.main-v3')

@section('title', 'Duplicate Class')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Class</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getCourseClass') }}">Class List</a></li>
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
                    <h4 class="card-title">Duplicate Course</h4>
                    <p class="card-title-desc">
                        This page allows you to duplicate an existing class. Please select the class you want to duplicate,
                        then enter the new class information.
                    </p>

                    <form action="{{ route('postDuplicateCourseClass') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <hr>
                        <strong class="text-secondary">Choose an Existing Class</strong>

                        <div class="my-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Kelas</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="course_class_id"
                                    data-placeholder="--- Choose a class as the source to duplicate ---" id="type_selector">
                                    @foreach ($class_list as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->course_name }} Batch {{ $item->batch }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseid'))
                                    @foreach ($errors->get('courseid') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <hr>
                        <strong class="text-secondary">New Class Information</strong>

                        <div class="my-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Batch</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="batch"
                                    placeholder="Enter the batch of the new class here...">
                                @if ($errors->has('batch'))
                                    @foreach ($errors->get('batch') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="class_type_id" class="col-md-2 col-form-label">Class Type <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select id="class_type_id" class="form-control select2" name="class_type_id"
                                    data-placeholder="--- Choose a class type ---">
                                    @foreach ($allClassType as $ctype)
                                        <option value="{{ $ctype->id }}"
                                            {{ old('class_type_id') == $ctype->id ? 'selected' : '' }}>
                                            {{ $ctype->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('class_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ongoing" class="col-md-2 col-form-label">Ongoing Status <span class="text-danger"
                                    data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="ongoing" id="ongoing"
                                    data-placeholder="Pilih Status Kelas">
                                    <option value="" disabled selected>Pilih Status...</option>
                                    <option value="0" {{ old('ongoing') == '0' ? 'selected' : '' }}>Belum Dimulai
                                    </option>
                                    <option value="1" {{ old('ongoing') == '1' ? 'selected' : '' }}>Sedang Berjalan
                                    </option>
                                    <option value="2" {{ old('ongoing') == '2' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                @error('ongoing')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status">
                                <span>
                                    <i class="far fa-question-circle" data-bs-toggle="tooltip"
                                        title="Turn this OFF to archive the data instead of publishing it"></i>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">
                                    Duplicate Class
                                </button>
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
