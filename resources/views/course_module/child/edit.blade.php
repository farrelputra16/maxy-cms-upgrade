@extends('layout.master')

@section('title', 'Edit Child Module')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<div style="padding: 12px 12px 0px 12px;">
    <h2>Edit Child Module For: {{ $parentModule->name }}</h2>
    <hr><br>
    <form class="ui form" action="{{ route('postEditChildModule', ['id' => $childModule->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="field">
            <div class="field">
                <label for="">Parent Module</label>
                <input type="text" value="{{ $parentModule->name }}" disabled>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="">Priority</label>
                    <input type="number" name="priority" value="{{ $childModule->priority }}">
                </div>
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $childModule->name }}">
                </div>
            </div>
            <!-- cek tipe course -->
            @if($course_type->slug == 'rapid-onboarding')
            <div class="field">
                <label for="">HTML</label>
                <textarea name="html">{{ $childModule->html }}</textarea>
            </div>
            <div class="field">
                <label for="">JS</label>
                <textarea name="js">{{ $childModule->js }}</textarea>
            </div>
            <div class="field">
                <label for="">Content</label>
                <textarea class="texteditor" name="content">{{ $childModule->content }}</textarea>
            </div>
            <input type="hidden" name="rapid" value="1">
            @else
            <hr>
            <div class="card m-5 p-5">
                <h3>Current:</h3>
                @if($childModule->type == 'materi_pembelajaran')
                Materi Pembelajaran
                <a href="{{ asset('fe/public/files/'.$childModule->material) }}" download>{{$childModule->material}}</a>
                @elseif($childModule->type == 'video_pembelajaran')
                Video Pembelajaran
                <a href="{{ $childModule->material }}">{{$childModule->material}}</a>
                @elseif($childModule->type == 'assignment')
                <a href="{{ asset('fe/public/files/'.$childModule->material) }}" download>{{$childModule->material}}</a>
                Assignment
                @endif

                <h3>Change To:</h3>
                <!-- TO DO -->
                <div class="two fields">
                    <div class="field">
                        <label for="">Module Type</label>
                        <select name="type" class="ui dropdown" id="type_selector">
                            <option value="materi_pembelajaran" @if($childModule->type == 'materi_pembelajaran')
                                selected
                                @endif>materi_pembelajaran</option>
                            <option value="video_pembelajaran" @if($childModule->type == 'video_pembelajaran') selected
                                @endif>video_pembelajaran</option>
                            <option value="assignment" @if($childModule->type == 'assignment') selected
                                @endif>Assignment
                            </option>
                            @if(Route::has('getCMQuiz'))
                            <option value="quiz" @if($childModule->type == 'quiz') selected @endif>Quiz</option>
                            @endif
                        </select>
                    </div>
                    <div class="field" id="material">
                        @if ($childModule->type === 'materi_pembelajaran')
                        <label for="" class="form-label">File materi_pembelajaran</label>
                        <input class="form-control" type="file" id="formFile" name="material">
                        <p class="pt-2">{{ $childModule->material }}</p>
                        <input type="hidden" name="duration" value="">
                        @elseif ($childModule->type === 'video_pembelajaran')
                        <label for="">Link Video</label>
                        <input type="text" name="material" @if($childModule->type == 'video_pembelajaran') value="{{
                        $childModule->material }}" @endif>
                        <label for="">Durasi</label>
                        <input type="number" name="duration" @if($childModule->type == 'video_pembelajaran') value="{{
                        $childModule->duration }}" @endif>
                        @else
                        <label for="" class="form-label">File Assignment</label>
                        <input class="form-control" type="file" id="formFile" name="material">
                        <input type="hidden" name="duration" value="">
                        @endif
                    </div>
                </div>
                <div class="field" id="duration"></div>
                @endif
            </div>
            <!-- end materi -->


            <div class="field">
                <label for="">Content</label>
                <textarea name="content">{{ $childModule->content }}</textarea>
            </div>
            <div class="field">
                <label for="">Description</label>
                <textarea name="description">{{ $childModule->description }}</textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" {{ $childModule->status == 1 ? 'checked' :
                    ''}} name="status" >
                    <label>Aktif</label>
                </div>
            </div>
        </div>
        <button class="right floated ui button primary">Save & Update</button>
    </form>
    <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('content');
</script>

<script>
    var typeSelector = document.getElementById('type_selector');
    var material = document.getElementById('material');
    var duration = document.getElementById('duration');

    // Menambahkan event listener untuk perubahan pada elemen select
    typeSelector.addEventListener('change', function () {
        // Memeriksa apakah opsi yang dipilih adalah "assignment"
        if (typeSelector.value === 'materi_pembelajaran') {
            material.innerHTML = `
                <label for="" class="form-label">File materi_pembelajaran</label>
                <input class="form-control" type="file" id="formFile" name="material" @if($childModule->type == 'materi_pembelajaran') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `<input type="hidden" name="duration" value="">`;
        } else if (typeSelector.value === 'video_pembelajaran') {
            material.innerHTML = `
                <label for="">Link Video</label>
                <input type="text" name="material" @if($childModule->type == 'video_pembelajaran') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `
                <label for="">Durasi</label>
                <input type="number" name="duration" @if($childModule->type == 'video_pembelajaran') value="{{ $childModule->duration }}" @endif>
            `;
        } else {
            material.innerHTML = `
                <label for="" class="form-label">File Assignment</label>
                <input class="form-control" type="file" id="formFile" name="material" @if($childModule->type == 'asignment') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `<input type="hidden" name="duration" value="">`;
        }
    });
</script>

@endsection