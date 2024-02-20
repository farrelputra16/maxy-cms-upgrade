@extends('layout.master')

@section('title', 'Edit Class Member')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
@endsection

@section('content')
    <div class="px-3 pb-3">
        <h2>
            Edit Class Member: {{ $courseClassMember->id }} - {{ $courseClassMember->user->name }} On
            Class: {{ $courseClassMember->courseClass->course->name }}
            Batch {{ $courseClassMember->courseClass->batch }}</h2>
        <hr>

        <form class="ui form" action="{{ route('postEditCourseClassMember', $courseClassMember->id) }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $courseClassMember->id }}">
            <input type="hidden" name="cc_id" value="{{ $courseClassMember->course_class_id }}">

            <div class="two fields">
                <div class="field">
                    <label for="dailyScore" class="form-label">Daily Score</label>
                    <input type="number" name="daily_score" id="dailyScore" class="form-control"
                           placeholder="Masukkan nilai harian" value="{{ $courseClassMember->daily_score }}">
                    @error("daily_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="absenceScore" class="form-label">Absence Score</label>
                    <input type="number" name="absence_score" id="absenceScore" class="form-control"
                           placeholder="Masukkan nilai absensi" value="{{ $courseClassMember->absence_score }}">
                    @error("daily_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label for="hackathon1Score" class="form-label">Hackathon 1 Score</label>
                    <input type="number" name="hackathon_1_score" id="hackathon1Score" class="form-control"
                           placeholder="Masukkan nilai hackathon ke-1"
                           value="{{ $courseClassMember->hackathon_1_score }}">
                    @error("hackathon_1_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="hackathon2Score" class="form-label">Hackathon 2 Score</label>
                    <input type="number" name="hackathon_2_score" id="hackathon2Score" class="form-control"
                           placeholder="Masukkan nilai hackathon ke-2"
                           value="{{ $courseClassMember->hackathon_2_score }}">
                    @error("hackathon_2_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label for="internshipScore" class="form-label">Internhsip Score</label>
                    <input type="number" name="internship_score" id="internshipScore" class="form-control"
                           placeholder="Masukkan nilai magang" value="{{ $courseClassMember->internship_score }}">
                    @error("internship_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="finalScore" class="form-label">Final Score</label>
                    <input type="number" name="final_score" id="finalScore" class="form-control"
                           value="{{ $courseClassMember->final_score }}" readonly>
                    @error("final_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" style="width:100%">{{ $courseClassMember->description }}</textarea>
            </div>

            <div class="field">
                <div class="ui checkbox">
                    <input id="status" class="form-check-input" type="checkbox" value="1"
                           {{ $courseClassMember->status === 1 ? 'checked' : '' }} name="status">

                    <label for="status">Aktif</label>
                </div>
            </div>

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route("getCourseClassMember") }}" class="ui red button">
                    Batal
                </a>
                <button class="ui button primary">Save & Update</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
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

        dailyScoreEl.on('input', function () {
            calculateFinalScore();
        });

        absenceScoreEl.on('input', function () {
            calculateFinalScore();
        });

        hackathon1ScoreEl.on('input', function () {
            calculateFinalScore();
        });

        hackathon2ScoreEl.on('input', function () {
            calculateFinalScore();
        });

        internshipScoreEl.on('input', function () {
            calculateFinalScore();
        });
    </script>
@endsection
