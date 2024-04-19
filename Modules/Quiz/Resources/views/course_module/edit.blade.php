@extends('layout.master')

@section('title', 'Add Course Module')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
<div style="padding: 12px 12px 50px 12px;">
    <h2>Edit Question: {{ $quiz->name }}</h2>
    <hr><br>
    <form class="ui form" action="{{ route('postEditCMQuiz') }}" method="post">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
        <input type="hidden" name="parent_id" value="{{ $parent_id }}">
        <div class="field">
            <div class="field">
                <label for="">Question No. </label>
                <small>* will be randomized later</small>
                <input type="number" name="priority" value="{{ $quiz->priority }}">
            </div>
            <div class="field">
                <label for="">Question</label>
                <input type="text" name="name" placeholder="Masukkan Pertanyaan" value="{{ $quiz->name }}">
            </div>
            @php 
            $options = explode(';;', $quiz->content);
            @endphp
            <div class="field">
                <label for="">Option 1 (correct answer)</label>
                <textarea name="option1">{{ $options[0] }}</textarea>
            </div>
            <div class="field">
                <label for="">Option 2</label>
                <textarea name="option2">{{ $options[1] }}</textarea>
            </div>
            <div class="field">
                <label for="">Option 3</label>
                <textarea name="option3">{{ $options[2] }}</textarea>
            </div>
            <div class="field">
                <label for="">Option 4</label>
                <textarea name="option4">{{ $options[3] }}</textarea>
            </div>

            <div class="field">
                <label for="">Description</label>
                <textarea name="description">{{ $quiz->description }}</textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" {{ $quiz->status == 1 ? 'checked' : '' }} name="status">
                    <label>Aktif</label>
                </div>
            </div>
        </div>
        <button class="right floated ui button primary">Save</button>
    </form>
    <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
</div>
@endsection