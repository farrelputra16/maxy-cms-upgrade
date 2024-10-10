@extends('layout.main-v3')

@section('title', 'Survey Result Detail')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Data</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('getSurvey') }}">Survey</a></li>
                        <li class="breadcrumb-item active">Survey Result Detail</li>
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

                    <h4 class="card-title">Survey Result Detail: {{ $currentData->MSurvey->name }}</h4>
                    <p class="card-title-desc">This page allows you to update a data's information by modifying the data
                        listed below. Ensure that all the information you enter is accurate to provide the best learning
                        experience for the course participants.</p>

                    <form>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Survey</label>
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
                            <label for="input-title" class="col-md-2 col-form-label">Score</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->score }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-title" class="col-md-2 col-form-label">Created At</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ $currentData->created_at }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="input-content" class="col-md-2 col-form-label">Content</label>
                            <div class="col-md-10">
                                @php
                                    $contentData = json_decode($currentData->content, true); // Decode JSON data
                                @endphp

                                @if ($contentData)
                                    @foreach ($contentData as $key => $value)
                                        @if ($key != 'id' && $key != 'score')
                                            @php
                                                $formattedKey = str_replace('_', ' ', $key);
                                            @endphp
                                            <div class="mb-3 row">
                                                <div class="col-md-10">
                                                    <textarea id="elm1" readonly>
    Q: {{ $formattedKey }}{{ substr($formattedKey, -1) == '?' ? '' : '?' }}
    A: {{ $value }}
                    </textarea>
                                        @endif
                            </div>
                        </div>
                        @endforeach
                    @else
                        <textarea readonly>Tidak ada data.</textarea>
                        @endif
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')

@endsection
