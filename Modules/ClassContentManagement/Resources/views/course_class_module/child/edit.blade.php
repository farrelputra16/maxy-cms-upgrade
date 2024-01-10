@extends('layout.master')

@section('title', 'Edit Child Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form"
            action="{{ route('postEditCourseClassChildModule', ['id' => $courseChild->id, 'parent_id' => request()->parent_id]) }}"
            method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Child Module Name</label>
                        <input type="text" name="name" value="{{ $courseChild->courseModule->name }}">
                    </div>
                    <div class="field">
                        <label for="">Child Module Priority</label>
                        <input type="text" name="priority" value="{{ $courseChild->courseModule->priority }}">
                    </div>
                    <div class="field">
                        <label for="">Child Module Level</label>
                        <input type="text" name="level" value="{{ $courseChild->courseModule->level }}">
                    </div>
                </div>
                <div class="field">
                    <label for="">Child Module Content</label>
                    <textarea name="content" id="content">{{ $courseChild->courseModule->content }}</textarea>
                </div>
                <div class="field">
                    <label for="">Child Module Description</label>
                    <textarea name="description" id="description">{{ $courseChild->courseModule->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $courseChild->courseModule->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
    </div>

    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
@endsection
