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
    <form class="ui form" action="{{ route('postEditChildModule', ['id' => $childModule->id]) }}" method="post" enctype="multipart/form-data">
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
            <!-- TO DO -->
            <div class="two fields">
                <div class="field">
                    <label for="">Module Type</label>
                    <select name="type" class="ui dropdown" id="type_selector">
                        <option value="materi pembelajaran" @if($childModule->type == 'materi pembelajaran') selected
                            @endif>Materi Pembelajaran</option>
                        <option value="video pembelajaran" @if($childModule->type == 'video pembelajaran') selected
                            @endif>Video Pembelajaran</option>
                        <option value="assignment" @if($childModule->type == 'assignment') selected @endif>Assignment
                        </option>
                        @if(Route::has('getCMQuiz'))
                        <option value="quiz" @if($childModule->type == 'quiz') selected @endif>Quiz</option>
                        @endif
                    </select>
                </div>
                <div class="field" id="material">
                    @if ($childModule->type === 'materi pembelajaran')
                    <label for="" class="form-label">File Materi Pembelajaran</label>
                    <input class="form-control" type="file" id="formFile" name="material">
                    <p class="pt-2">{{ $childModule->material }}</p>
                    <input type="hidden" name="duration" value="">
                    @elseif ($childModule->type === 'video pembelajaran')
                    <label for="">Link Video</label>
                    <input type="text" name="material" @if($childModule->type == 'video pembelajaran') value="{{
                    $childModule->material }}" @endif>
                    <label for="">Durasi</label>
                    <input type="number" name="duration" @if($childModule->type == 'video pembelajaran') value="{{
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
            <!-- end materi -->
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
    // CKEDITOR.replace('html');
    // CKEDITOR.replace('js');
    CKEDITOR.replace('content');
</script>

@if($course_type->slug == 'rapid-onboarding')
<script>
    var typeSelector = document.getElementById('type_selector');
    var material = document.getElementById('material');
    var duration = document.getElementById('duration');

    // Menambahkan event listener untuk perubahan pada elemen select
    typeSelector.addEventListener('change', function () {
        // Memeriksa apakah opsi yang dipilih adalah "assignment"
        if (typeSelector.value === 'materi pembelajaran') {
            material.innerHTML = `
                <label for="" class="form-label">File Materi Pembelajaran</label>
                <input class="form-control" type="file" id="formFile" name="material" @if($childModule->type == 'materi pembelajaran') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `<input type="hidden" name="duration" value="">`;
        } else if (typeSelector.value === 'video pembelajaran') {
            material.innerHTML = `
                <label for="">Link Video</label>
                <input type="text" name="material" @if($childModule->type == 'video pembelajaran') value="{{ $childModule->material }}" @endif>
            `;
            duration.innerHTML = `
                <label for="">Durasi</label>
                <input type="number" name="duration" @if($childModule->type == 'video pembelajaran') value="{{ $childModule->duration }}" @endif>
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
@endif

@endsection