@extends('layout.master')

@section('title', 'Tambah Nilai Akhir')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <style>
        .ck-editor__editable_inline:not(.ck-comment__input *) {
            height: 250px;
            overflow-y: auto;
        }
    </style>
@endsection

@section('content')
    <div class="px-3 pb-3">
        <h2>Edit Nilai Akhir Untuk {{ $courseClassMember->user->name }}</h2>
        <hr>
        <form id="templateForm" class="ui form" action="{{ route('postAddFinalScore', $courseClassMember->id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            <div class="two fields">
                <div class="field">
                    <label for="dailyScore" class="form-label">Daily Score</label>
                    <input type="number" name="daily_score" id="dailyScore" class="form-control" placeholder="Masukkan nilai harian">
                    @error("daily_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="absenceScore" class="form-label">Absence Score</label>
                    <input type="number" name="absence_score" id="absenceScore" class="form-control" placeholder="Masukkan nilai absensi">
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
                    <input type="number" name="hackathon_1_score" id="hackathon1Score" class="form-control" placeholder="Masukkan nilai harian">
                    @error("hackathon_1_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="field">
                    <label for="hackathon2Score" class="form-label">Hackathon 2 Score</label>
                    <input type="number" name="hackathon_2_score" id="hackathon2Score" class="form-control" placeholder="Masukkan nilai absensi">
                    @error("hackathon_2_score")
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="field">
                <label for="internshipScore" class="form-label">Internhsip Score</label>
                <input type="number" name="internship_score" id="internshipScore" class="form-control" placeholder="Masukkan nilai magang">
                @error("internship_score")
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

{{--            <div class="field">--}}
{{--                <label for="description" class="form-label">Description</label>--}}
{{--                <textarea id="description" name="description"--}}
{{--                          placeholder="Masukkan deskripsi"></textarea>--}}
{{--                @error("description")--}}
{{--                <div class="text-danger">--}}
{{--                    {{ $message }}--}}
{{--                </div>--}}
{{--                @enderror--}}
{{--            </div>--}}

            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ url()->previous() }}" class="ui red button">
                    Batal
                </a>
                <button class="ui button primary" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/markerjs2/markerjs2.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        $("#courseType").dropdown();

        $(function () {
            let editors = {};

            if ($("#description").length) {
                ClassicEditor
                    .create(document.querySelector("#description"))
                    .then(editor => {
                        editors["description"] = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }

            if ($("#templateContent").length) {
                ClassicEditor
                    .create(document.querySelector("#templateContent"))
                    .then(editor => {
                        editors["description"] = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        })
    </script>
@endsection
