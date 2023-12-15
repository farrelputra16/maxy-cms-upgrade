@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Edit Class Member: {{ $currentData[0]->ccm_member_id }} - {{ $currentData[0]->user_name }} ON Class: {{ $currentData[0]->course_name }} Batch {{ $currentData[0]->course_class_batch }}</h2>
        <hr>
        <form class="ui form" action="{{ route('postEditCourseClassMember', ['id' => request()->query('id') ])}}" method="post">
            @csrf
            <div class="three fields">
                <input type="hidden" value="{{ request()->query('id') }}" disabled>
                <input type="hidden" name="user_id" value="{{ $currentData[0]->ccm_member_id }}">
                <input type="hidden" name="course_class" value="{{ $currentData[0]->ccm_course_class_id }}">
                
            </div>
            <div class="field">
                <label for="">Description</label>
                @if ($currentData->isNotEmpty())
                    <textarea name="description">{{ $currentData[0]->ccm_description }}</textarea>
                @endif


            </div>
            <div class="field">
                <div class="ui checkbox">
                @if ($currentData->isNotEmpty())
                    <input class="form-check-input" type="checkbox" value="1" {{ $currentData[0]->ccm_status == 1 ? 'checked' : '' }} name="status">
                @endif

                    <label>Aktif</label>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourseClassMember") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection