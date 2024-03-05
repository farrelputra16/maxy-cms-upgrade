@extends('layout.master')

@section('title', 'Edit User')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

<div style="padding: 12px 12px 0px 12px;">
    <h2 style="">Grading</h2>
    <hr><br>
    <form class="ui form" action="{{ route('postEditCCMH', ['id' => $currentData->id]) }}" method="post">
        @csrf
        <div class="field">
            <div class="field">
                <label for="">Member</label>
                <input type="text" name="user_name" value="{{ $currentData->user_name }}" disabled>
            </div>

            <div class="two fields">
                <div class="field">
                    <label for="">Submitted At</label>
                    <input type="text" name="user_name" value="{{ $currentData->submitted_at }}" disabled>
                </div>
                <div class="field">
                    <label for="">Updated At</label>
                    <input type="text" name="user_name" value="{{ $currentData->updated_at }}" disabled>
                </div>
            </div>

            <div class="field">
                <label for="">Submitted File</label>
                <a href="{{ asset($currentData->submission_url) }}" target="_blank"><h3>{{$currentData->submitted_file}}</h3></a>
                <!-- <input type="text" name="submitted_file" value="{{ $currentData->submitted_file }}" disabled> -->
            </div>
            <div class="field">
                <label for="">Student's Comment</label>
                <textarea name="comment" id="comment" disabled>{{ $currentData->comment }}</textarea>
            </div>
            <div class="field">
                <label for="grade">Grade (min 0 ,max 100)</label>
                <input type="number" name="grade" id="grade" value="{{ $currentData->grade }}" min="0" max="100">   
            </div>
            <div class="field">
                <label for="">Mentor's Comment</label>
                <textarea name="tutor_comment" id="tutor_comment">{{ $currentData->tutor_comment }}</textarea>
            </div>
        </div>
        <button class="right floated ui button primary">Save & Update</button>
    </form>
    <a href="{{ route("getCCMHGrade") }}"><button class=" right floated ui red button">Batal</button></a>
</div>
@endsection