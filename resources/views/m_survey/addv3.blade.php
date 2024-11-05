@extends('layout.main-v3')

@section('title', 'Add Survey')

@section('style')
    <!-- survey builder -->
    {{-- <script src="https://unpkg.com/knockout/build/output/knockout-latest.js"></script>
<script src="https://unpkg.com/survey-core@1.10.5/survey.core.min.js"></script>
<script src="https://unpkg.com/survey-core@1.10.5/survey.i18n.min.js"></script>
<script src="https://unpkg.com/survey-core@1.10.5/themes/index.min.js"></script>
<script src="https://unpkg.com/survey-knockout-ui@1.10.5/survey-knockout-ui.min.js"></script>
<script src="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.min.js"></script>
<script src="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.i18n.min.js"></script>
<script src="https://unpkg.com/survey-creator-knockout@1.10.5/survey-creator-knockout.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/survey-core@1.10.5/defaultV2.css" />
<link rel="stylesheet" href="https://unpkg.com/survey-creator-core@1.10.5/survey-creator-core.css" /> --}}

    <script src="{{ asset('assets/cms-v3/libs/knockout/build/output/knockout-latest.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/survey-core/survey.core.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/survey-core/survey.i18n.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/survey-core/themes/index.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/survey-knockout-ui/survey-knockout-ui.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/survey-creator-core/survey-creator-core.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/survey-creator-core/survey-creator-core.i18n.min.js') }}"></script>
    <script src="{{ asset('assets/cms-v3/libs/survey-creator-knockout/survey-creator-knockout.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/cms-v3/libs/survey-core/defaultV2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/cms-v3/libs/survey-creator-core/survey-creator-core.css') }}" />
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add New Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getSurvey') }}">Survey</a></li>
                        <li class="breadcrumb-item active">Add Survey</li>
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

                    <h4 class="card-title">Add New Survey</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form id="addSurvey" action="{{ route('postAddSurvey') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Name</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    placeholder="Masukkan Nama Survey" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Date Expired</label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" id="expired_date" name="expired_date" value="{{ old('expired_date') }}">
                                @if ($errors->has('expired_date'))
                                    @foreach ($errors->get('expired_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Type</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" data-placeholder="Choose ..."
                                    id="type_selector">
                                    <option value="0" {{ old('type') == 0 ? 'selected' : '' }}>Evaluasi</option>
                                    <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>Quiz</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Description</label>
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
                        <br>
                        <div class="mb-3 row">
                            <h4>Survey</h4>
                            <input type="hidden" name='survey' id='survey'>
                            <div id="surveyCreatorContainer" style="position: relative; height: 100%; width: 100%">
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-start">
                                Tekan tombol <b>Setting</b> untuk masuk ke bagian pengaturan <br>
                                Tombol <b>Setting</b> dapat ditemukan di pojok kanan atas dari survey <br>
                                Tombol <b>Setting</b> juga dapat ditemukan di pojok kanan bawah dari setiap pertanyaan yg ada <br>
                                Untuk mengisi pertanyaan harap tuliskan di bagian <b>Question Name</b> <br>
                                Untuk mengisi jawaban harap isi kolom <b>Value</b> pada bagian <b>Choice Options</b> <br>
                                Jika ingin mengatur jawaban yg benar silahkan mengatur pada bagian <b>Data</b> lalu tekan <b>Set Correct Answer</b><br>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center custom-btn-submit" form="addSurvey">Add Survey</button>
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
        // const options = {
        //     showLogicTab: true
        // };
        const creator = new SurveyCreator.SurveyCreator(options);
        //Automatically save survey definition on changing. Hide "Save" button
        creator.isAutoSave = true;
        //Show state button here
        creator.showState = true;

        var localStorageName = "SaveLoadSurveyCreatorExample";
        //Setting this callback will make visible the "Save" button
        creator.saveSurveyFunc = (saveNo, callback) => {
            $('#survey').val(JSON.stringify(creator.JSON));
            console.log(JSON.stringify(creator.JSON));
        };

        var defaultJSON = {
            pages: [{
                name: 'page1',
                elements: [{
                    type: 'text',
                    name: "q1"
                }]
            }]
        };
        creator.text = window.localStorage.getItem(localStorageName) || JSON.stringify(defaultJSON);
        //If you get JSON from your database then you can use creator.JSON property
        // creator.JSON = "sss";
        creator.render("surveyCreatorContainer");
    </script>
@endsection
