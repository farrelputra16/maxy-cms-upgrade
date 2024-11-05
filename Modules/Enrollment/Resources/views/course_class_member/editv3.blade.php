@extends('layout.main-v3')

@section('title', 'Edit Class Member')

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
                        <li class="breadcrumb-item"><a href="">Member List</a></li>
                        <li class="breadcrumb-item active">Edit Class Member</li>
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

                    <h4 class="card-title">Edit Class Member: {{ $courseClassMember->id }} -
                        {{ $courseClassMember->user->name }} On Class: {{ $courseClassMember->courseClass->course->name }}
                        Batch {{ $courseClassMember->courseClass->batch }}</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form action="{{ route('postEditCourseClassMember', $courseClassMember->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $courseClassMember->id }}">
                        <input type="hidden" name="cc_id" value="{{ $courseClassMember->course_class_id }}">
                        <input type="hidden" name="member_id" value="{{ $users }}">

                        <div class="mb-3 row">
                            <label for="dailyScore" class="col-md-2 col-form-label">Daily Score</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="daily_score"
                                    placeholder="Masukkan nilai harian" value="{{ old('daily_score', $courseClassMember->daily_score) }}"
                                    id="dailyScore">
                                @error('daily_score')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="absenceScore" class="col-md-2 col-form-label">Absence Score</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="absence_score"
                                    placeholder="Masukkan nilai absensi" value="{{ old('absence_score', $courseClassMember->absence_score) }}"
                                    id="absenceScore">
                                @error('absence_score')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="hackathon1Score" class="col-md-2 col-form-label">Hackathon 1 Score</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="hackathon_1_score"
                                    placeholder="Masukkan nilai hackathon ke-1"
                                    value="{{ old('hackathon_1_score', $courseClassMember->hackathon_1_score) }}" id="hackathon1Score">
                                @error('hackathon_1_score')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="hackathon2Score" class="col-md-2 col-form-label">Hackathon 2 Score</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="hackathon_2_score"
                                    placeholder="Masukkan nilai hackathon ke-2"
                                    value="{{ old('hackathon_2_score', $courseClassMember->hackathon_2_score) }}" id="hackathon2Score">
                                @error('hackathon_2_score')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="internshipScore" class="col-md-2 col-form-label">Internship Score</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="internship_score"
                                    placeholder="Masukkan nilai internship"
                                    value="{{ old('internship_score', $courseClassMember->internship_score) }}" id="internshipScore">
                                @error('internship_score')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="finalScore" class="col-md-2 col-form-label">Final Score</label>
                            <div class="col-md-10">
                                <input class="form-control" type="number" name="final_score"
                                    value="{{ old('final_score', $courseClassMember->final_score) }}" id="finalScore" readonly>
                                @error('final_score')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mentor Fields -->
                        <div id="mentor-fields-container">
                            @foreach ($currentMentors as $index => $currentMentor)
                                <div class="mb-3 row mentor-field-group">
                                    <label for="mentor_{{ $index }}" class="col-md-2 col-form-label">Pilih Mentor: </label>
                                    <div class="col-md-4">
                                        <select class="form-control select2 mentor-select" name="mentor[]">
                                            <option value="">Pilih Mentor</option>
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}" 
                                                    {{ old('mentor.' . $index, $currentMentor->mentor_id) == $mentor->id ? 'selected' : '' }}>
                                                    {{ $mentor->email }} - {{ $mentor->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="jobdesc_{{ $index }}" class="col-md-2 col-form-label">Job Description</label>
                                    <div class="col-md-4">
                                        <select name="jobdesc[]" class="form-control select2 jobdesc-select">
                                            <option value="">Pilih Job Description</option>
                                            @foreach ($jobdescriptions as $jobdesc)
                                                <option value="{{ $jobdesc->id }}" 
                                                    {{ old('jobdesc.' . $index, $currentMentor->jobdesc_id) == $jobdesc->id ? 'selected' : '' }}>
                                                    {{ $jobdesc->jobdesc }}
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
                                <button type="button" class="btn btn-danger" id="remove-mentor-button">Kurangi Mentor</button>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
                            <div class="col-md-10">
                                <textarea id="elm1" name="content">{{ old('content', $courseClassMember->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" {{ old('status', $courseClassMember->status) == 1 ? 'checked' : '' }} name="status">
                                <label>Aktif</label>
                            </div>
                        </div>
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
<script>
    let dailyScoreEl = $("input[name='daily_score']");
    let absenceScoreEl = $("input[name='absence_score']");
    let hackathon1ScoreEl = $("input[name='hackathon_1_score']");
    let hackathon2ScoreEl = $("input[name='hackathon_2_score']");
    let internshipScoreEl = $("input[name='internship_score']");
    let finalScoreEl = $("input[name='final_score']");

    function calculateFinalScore() {
        let dailyScore = dailyScoreEl.val() || 0;
        let absenceScore = absenceScoreEl.val() || 0;
        let hackathon1Score = hackathon1ScoreEl.val() || 0;
        let hackathon2Score = hackathon2ScoreEl.val() || 0;
        let internshipScore = internshipScoreEl.val() || 0;

        let finalScore = (dailyScore * 0.15) + (absenceScore * 0.05) + (hackathon1Score * 0.25) + (hackathon2Score * 0.25) + (internshipScore * 0.30);
        finalScoreEl.val(finalScore);
    }

    dailyScoreEl.on('input', function() {
        calculateFinalScore();
    });

    absenceScoreEl.on('input', function() {
        calculateFinalScore();
    });

    hackathon1ScoreEl.on('input', function() {
        calculateFinalScore();
    });

    hackathon2ScoreEl.on('input', function() {
        calculateFinalScore();
    });

    internshipScoreEl.on('input', function() {
        calculateFinalScore();
    });
</script>
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
                        <option value="{{ $jobdesc->id ?? '' }}">{{ $jobdesc->jobdesc ?? '' }}</option>
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
