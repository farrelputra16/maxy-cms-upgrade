@extends('layout.main-v3')

@section('title', 'Ubah Survei')

@section('style')
    <!-- Survey Builder -->
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
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Ubah Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getSurvey') }}">Survei</a></li>
                        <li class="breadcrumb-item active">Ubah Survei</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Ubah: {{ $currentData->name }}</h4>
                    <p class="card-title-desc">
                        Halaman ini memungkinkan Anda memperbarui informasi survei. Pastikan semua informasi yang Anda
                        masukkan akurat untuk memberikan pengalaman terbaik bagi peserta.
                    </p>

                    <form action="{{ route('postEditSurvey', ['id' => request()->query('id')]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Nama <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name"
                                    value="{{ old('name', $currentData->name) }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Tanggal Kedaluwarsa <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></label>
                            <div class="col-md-10">
                                <input class="form-control" type="datetime-local" id="expired_date" name="expired_date"
                                    value="{{ old('expired_date', $currentData->expired_date) }}">
                                @if ($errors->has('expired_date'))
                                    @foreach ($errors->get('expired_date') as $error)
                                        <span style="color: red;">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-tag" class="col-md-2 col-form-label">Tipe</label>
                            <div class="col-md-10">
                                <select class="form-control select2" name="type" data-placeholder="Pilih Tipe ..."
                                    id="type_selector">
                                    <option value="0" {{ old('type', $currentData->type) == 0 ? 'selected' : '' }}>
                                        Evaluasi</option>
                                    <option value="1" {{ old('type', $currentData->type) == 1 ? 'selected' : '' }}>
                                        Kuis</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Catatan Admin</label>
                            <div class="col-md-10">
                                <textarea id="content" class="form-control" name="description">{{ old('description', $currentData->description) }}</textarea>
                            </div>
                        </div>
                        <div class="row form-switch form-switch-md mb-3 p-0" dir="ltr">
                            <label class="col-md-2 col-form-label" for="SwitchCheckSizemd">Status</label>
                            <div class="col-md-10 d-flex align-items-center">
                                <input type="hidden" name="status" value="0">
                                <input class="form-check-input p-0 m-0" type="checkbox" id="SwitchCheckSizemd"
                                    value="1" name="status"
                                    {{ old('status', isset($currentData) ? $currentData->status : false) ? 'checked' : '' }}>
                                <label class="m-0">Aktif</label>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3 row">
                            <h4>Survei <span class="text-danger"
                                data-bs-toggle="tooltip" title="Wajib diisi">*</span></h4>
                            <input type="hidden" name='survey' id='survey'>
                            <div id="surveyCreatorContainer" style="position: relative; height: 100%; width: 100%">
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-end">
                            <div class="text-start">
                                Petunjuk penggunaan: <br>
                                - Gunakan tombol <b>Setting</b> di pojok kanan atas untuk pengaturan survei. <br>
                                - Isi <b>Question Name</b> untuk teks pertanyaan. <br>
                                - Atur opsi jawaban di kolom <b>Value</b> pada <b>Choice Options</b>. <br>
                                - Untuk menetapkan jawaban yang benar, buka tab <b>Data</b> dan pilih <b>Set Correct
                                    Answer</b>.
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary w-md text-center">Simpan & Perbarui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- akhir kolom -->
    </div> <!-- akhir baris -->
@endsection

@section('script')
    <script>
        const creator = new SurveyCreator.SurveyCreator({
            showLogicTab: true,
            isAutoSave: true,
            showState: true,
        });

        const localStorageName = "userSurveyData";

        function saveSurveyData() {
            let surveyData = creator.JSON && creator.JSON.pages && creator.JSON.pages.length === 0 ?
                "{}" : JSON.stringify(creator.JSON);

            localStorage.setItem(localStorageName, surveyData);
            document.getElementById('survey').value = surveyData;
        }

        creator.saveSurveyFunc = (saveNo, callback) => {
            if (creator.JSON && creator.JSON.title && !creator.JSON.pages) {
                console.log("Title terdeteksi tanpa pages. Menghapus title.");
                creator.JSON = {};
                saveSurveyData();
            } else if (creator.JSON && Array.isArray(creator.JSON.pages)) {
                $('#survey').val(JSON.stringify(creator.JSON));
            } else {
                $('#survey').val('');
            }
        };

        creator.onModified.add(saveSurveyData);

        const savedSurveyData = localStorage.getItem(localStorageName);
        creator.JSON = savedSurveyData ? JSON.parse(savedSurveyData) : {
            pages: [{
                name: 'page1',
                elements: [{
                    type: 'text',
                    name: "q1"
                }]
            }]
        };

        creator.text = @json($currentData->survey);
        document.getElementById('survey').value = @json($currentData->survey);

        const isSubmitFailed = {{ $errors->any() ? 'true' : 'false' }};
        if (isSubmitFailed) {
            creator.text = savedSurveyData;
            document.getElementById('survey').value = creator.text;
        } else {
            creator.text = @json($currentData->survey);
            document.getElementById('survey').value = @json($currentData->survey);
        }

        creator.render("surveyCreatorContainer");
    </script>
@endsection
