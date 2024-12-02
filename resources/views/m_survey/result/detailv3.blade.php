@extends('layout.main-v3')

@section('title', 'Detail Hasil Survei')

@section('content')
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Data</h4>

                <!-- Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getSurvey') }}">Survei</a></li>
                        <li class="breadcrumb-item active">Detail Hasil Survei</li>
                    </ol>
                </div>
                <!-- Akhir Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- Akhir Judul Halaman -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Detail Hasil Survei: {{ $currentData->MSurvey->name }}</h4>
                    <p class="card-title-desc">Halaman ini memungkinkan Anda melihat informasi detail dari hasil survei yang
                        dipilih. Pastikan semua informasi yang tercantum akurat untuk memberikan gambaran terbaik mengenai
                        pengalaman peserta survei.</p>

                    <form>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Survei</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->MSurvey->name }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Responden</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->User->name }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Skor</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->score }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Dibuat Pada</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->created_at }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Konten</label>
                            <div class="col-md-10">
                                @php
                                    $surveyData = json_decode($survey->survey, true); // Decode JSON data untuk survey
                                    $contentData = json_decode($currentData->content, true); // Decode JSON data untuk jawaban pengguna
                                @endphp

                                @if ($surveyData)
                                    @foreach ($surveyData['pages'] as $page)
                                        @foreach ($page['elements'] as $element)
                                            <div class="mb-3 p-3 border rounded bg-light">
                                                <p class="font-weight-bold mb-1">
                                                    Q:
                                                    {{ $element['title'] }}{{ substr($element['title'], -1) == '?' ? '' : '?' }}
                                                </p>

                                                @php
                                                    // Menyimpan jawaban yang benar dari survey
                                                    $correctAnswer = $element['correctAnswer'];
                                                    $correctChoice = collect($element['choices'])->firstWhere(
                                                        'value',
                                                        $correctAnswer,
                                                    );
                                                    $correctText = $correctChoice['text'] ?? 'N/A';

                                                    // Menyimpan jawaban pengguna dari contentData
                                                    $userAnswer = $contentData[$element['name']] ?? 'Belum dijawab'; // Mengambil jawaban pengguna
                                                    $userChoice = collect($element['choices'])->firstWhere(
                                                        'value',
                                                        $userAnswer,
                                                    );
                                                    $userAnswerText = $userChoice['text'] ?? $userAnswer;
                                                @endphp

                                                <p class="mb-0">
                                                    <strong>Jawaban Anda:</strong> {{ $userAnswerText }}<br>
                                                    <strong>Jawaban yang Benar:</strong> {{ $correctText }}
                                                </p>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @else
                                    <div class="alert alert-secondary" role="alert">Tidak ada data.</div>
                                @endif
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
