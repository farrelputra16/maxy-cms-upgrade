@extends('layout.main-v3')

@section('title', 'Add Course Class Member')

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
                        <li class="breadcrumb-item"><a
                                href="{{ route('getCourseClassMember', ['id' => $course_class_detail->id]) }}">Class
                                Member</a></li>
                        <li class="breadcrumb-item active">Add New Member</li>
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

                    <h4 class="card-title">Add Member for Class: {{ $course_class_detail->course_name }}
                        Batch {{ $course_class_detail->batch }}</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="addCCMember" action="{{ route('postAddCourseClassMember') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Pilih User: </label>
                            <div class="col-md-10">
                                <select class="form-control select2 multiple" multiple="multiple" name="users[]"
                                    data-placeholder="Pilih User">
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('users') && in_array($item->id, old('users')) ? 'selected' : '' }}>
                                            {{ $item->email }} - {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Mentor Fields -->
                        <div id="mentor-fields-container">
                            @foreach (old('mentor', ['']) as $index => $oldMentor)
                                <div class="mb-3 row mentor-field-group">
                                    <label for="mentor" class="col-md-2 col-form-label">Pilih Mentor: </label>
                                    <div class="col-md-4">
                                        <select class="form-control select2 mentor-select" name="mentor[]"
                                            data-placeholder="Pilih Mentor">
                                            <option value="">Pilih Mentor</option>
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}"
                                                    {{ $oldMentor == $mentor->id ? 'selected' : '' }}>
                                                    {{ $mentor->email }} - {{ $mentor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="jobdesc" class="col-md-2 col-form-label">Job Description</label>
                                    <div class="col-md-4">
                                        <select name="jobdesc[]" class="form-control select2 jobdesc-select"
                                            data-placeholder="Pilih Job Description">
                                            <option value="">Pilih Job Description</option>
                                            @foreach ($jobdescriptions as $jobdesc)
                                                <option value="{{ $jobdesc->id }}"
                                                    {{ old('jobdesc.' . $index) == $jobdesc->id ? 'selected' : '' }}>
                                                    {{ $jobdesc->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-10 offset-md-2">
                                <button type="button" class="btn btn-secondary" id="add-mentor-button">Add Mentor</button>
                                <button type="button" class="btn btn-danger" id="remove-mentor-button">Kurangi
                                    Mentor</button>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="course_class" value="{{ $course_class_detail->id }}">
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Course Class Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="description">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit"
                                    form="addCCMember">Add Member</button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <h4>Add Multiple Members by uploading CSV File</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <div class="">
                                    <div class="mb-5">
                                        <form action="{{ route('course-class-member.import-csv') }}"
                                            enctype="multipart/form-data" class="dropzone text-center" id="csv-upload">
                                            <div class="row justify-content-center align-items-center"
                                                style="height: 100%;">
                                                <div class="col-6">
                                                    <div class="fallback">
                                                        <input name="csv_file" type="file" id="csv_file" accept=".csv">
                                                        @error('csv_file')
                                                            <span style="color: red;">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                        </div>

                                                        <h4>Drop files here or click to upload.</h4>
                                                        <br>
                                                        <small>sample: <i class="fa fa-file" aria-hidden="true"></i> <a
                                                                href="{{ asset('csv/addccmember.csv') }}" download>csv
                                                                example
                                                                (click me to download)</a></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </form><!-- end form -->
                                    </div>

                                    <div class="mb-3 row justify-content-end">
                                        <div class="text-end">
                                            <button type="submit"
                                                class="btn btn-primary w-md text-center custom-btn-submit"
                                                form="addCCMember">Add Multiple Members</button>
                                        </div>
                                    </div>

                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div> <!-- end col -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>List Mentor</h4>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id</th>
                                            <th class="data-medium">Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mentors as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->id }}</td>
                                                <td class="batch" scope="row">{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('style')

    <style>
        #csv-upload {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 30%;
        }

        .dz-message {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #csv-upload .dz-message h4 {
            font-size: 18px;
            font-weight: bold;
            white-space: nowrap;
        }

        #csv-upload .dz-message small {
            font-size: 14px;
            color: #666;
            white-space: nowrap;
        }
    </style>

@endsection

@section('script')

    <script src="{{ URL::asset('assets/cms-v3/libs/dropzone/dropzone.min.js') }}"></script>
    <script>
        // Add event listener for the button to add a new mentor field
        document.getElementById('add-mentor-button').addEventListener('click', function() {
            const mentorFieldsContainer = document.getElementById('mentor-fields-container');
            const newMentorFieldGroup = document.createElement('div');
            newMentorFieldGroup.className = 'mb-3 row mentor-field-group';

            newMentorFieldGroup.innerHTML = `
                <label for="mentor" class="col-md-2 col-form-label">Pilih Mentor: </label>
                <div class="col-md-4">
                    <select class="form-control select2 mentor-select" name="mentor[]" data-placeholder="Pilih Mentor">
                        <option value="">Pilih Mentor</option>
                        @foreach ($mentors as $mentor)
                            <option value="{{ $mentor->id }}" data-jobdesc="{{ $jobdescriptions[$mentor->id] ?? '' }}">
                                {{ $mentor->email }} - {{ $mentor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <label for="jobdesc" class="col-md-2 col-form-label">Job Description</label>
                <div class="col-md-4">
                    <select name="jobdesc[]" class="form-control select2 jobdesc-select" data-placeholder="Pilih Job Description">
                        @foreach ($jobdescriptions as $jobdesc)
                            <option value="{{ $jobdesc->id ?? '' }}">{{ $jobdesc->name ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
            `;

            mentorFieldsContainer.appendChild(newMentorFieldGroup);
        });

        // Event listener untuk tombol "Kurangi Mentor"
        document.getElementById('remove-mentor-button').addEventListener('click', function() {
            const mentorFieldsContainer = document.getElementById('mentor-fields-container');
            const mentorFieldGroups = mentorFieldsContainer.getElementsByClassName('mentor-field-group');

            // Hanya hapus jika ada lebih dari satu field mentor
            if (mentorFieldGroups.length > 1) {
                mentorFieldsContainer.removeChild(mentorFieldGroups[mentorFieldGroups.length - 1]);
            } else {
                alert("Minimal satu mentor harus tersedia.");
            }
        });
    </script>

@endsection
