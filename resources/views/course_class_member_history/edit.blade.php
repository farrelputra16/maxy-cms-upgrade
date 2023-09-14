@extends('layout.master')

@section('title', 'Edit User')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditCCMH', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Users</label>
                    <input type="text" name="id" value="{{ request()->query('id') }}" disabled>
                </div>
                <div class="field">
                    <label for="">Course Module Name</label>
                    <input type="text" name="course_module_name" value="{{ $currentData->course_module_name }}" disabled>
                </div>
                <div class="field">
                    <label for="">User Name</label>
                    <input type="text" name="user_name" value="{{ $currentData->user_name }}" disabled>
                </div>
                <div class="field">
                    <label for="">Submitted File</label>
                    <input type="text" name="submitted_file" value="{{ $currentData->submitted_file }}" disabled>
                </div>
                <div class="field">
                    <label for="">Comment</label>
                    <input type="text" name="comment" value="{{ $currentData->comment }}" disabled>
                </div>
                <div class="field">
                    <label for="grade">Grade (min 0 ,max 100)</label>
                    <input type="number" name="grade" id="grade" value="{{ $currentData->grade }}" min="0" max="100">   
                </div>
                
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCCMH") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection