@extends('layout.master')

@section('title', 'Add Child Module')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<div style="padding: 12px 12px 0px 12px;">
    <h2>Add New Child Module</h2>
    <hr><br>
    <form class="ui form"
        action="{{ route('postAddChildModule', ['parentId' => $parent->id, 'page_type' => $page_type]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="field">
            <div class="field">
                <label for="">Parent Module</label>
                <input type="text" value="{{ $parent->name }}" disabled>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="field">
                    <label for="">Priority</label>
                    <input type="number" name="priority" required>
                </div>
            </div>
            <!-- cek tipe course -->
            @if($course_type->slug == 'rapid-onboarding')
            <div class="field">
                <label for="">HTML</label>
                <textarea class="texteditor" name="html"></textarea>
            </div>
            <div class="field">
                <label for="">JS</label>
                <textarea class="texteditor" name="js"></textarea>
            </div>
            <div class="field">
                <label for="">Content</label>
                <textarea class="texteditor" name="content"></textarea>
            </div>
            <input type="hidden" name="rapid" value="1">
            @else
            <!-- TO DO -->
            <div class="two fields">
                <div class="field">
                    <label for="">Module Type</label>
                    <select name="type" class="ui dropdown" id="type_selector" required>
                        <option selected value="">-- Pilih Tipe Modul --</option>
                        <option value="materi_pembelajaran">materi_pembelajaran</option>
                        <option value="video_pembelajaran">video_pembelajaran</option>
                        <option value="assignment">Assignment</option>
                        @if(Route::has('getCMQuiz'))
                        <option value="quiz">Quiz</option>
                        @endif
                    </select>
                </div>
                <div class="field" id="material"></div>
            </div>
            <div class="field" id="duration"></div>
            @endif
            <!-- end materi -->
            <div class="field">
                <label for="">Description</label>
                <textarea class="texteditor" name="description"></textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status">
                    <label>Aktif</label>
                </div>
            </div>
        </div>
        <button class="right floated ui button primary">Tambah Child Module</button>
    </form>
    <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('content');
</script>

@if($course_type->slug != 'rapid-onboarding')
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
                <input class="form-control" type="file" id="formFile" name="material">
            `;
            duration.innerHTML = `<input type="hidden" name="duration" value="">`;
        } else if (typeSelector.value === 'video_pembelajaran') {
            material.innerHTML = `
                <label for="">Link Video</label>
                <input type="text" name="material">
            `;
            duration.innerHTML = `
                <label for="">Durasi</label>
                <input type="number" name="duration">
            `;
        } else {
            material.innerHTML = `
                <label for="" class="form-label">File Assignment</label>
                <input class="form-control" type="file" id="formFile" name="material">
            `;
            duration.innerHTML = `<input type="hidden" name="duration" value="">`;
        }
    });
</script>
@endif

@endsection