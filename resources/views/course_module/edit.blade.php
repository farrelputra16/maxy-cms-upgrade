@extends('layout.master')

@section('title', 'Edit Module Course')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Edit Module: {{ $module_detail->name }}</h2>
        <hr><br>
        <form class="ui form" action="{{ route('postEditCourseModule', ['id' => $module_detail->id, 'page_type' => $page_type, 'course_id' => $module_detail->course_id]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $module_detail->name }}">
                    </div>
                    <div class="field">
                        <label for="">Day / Priority</label>
                        <input type="number" name="priority" value="{{ $module_detail->priority }}">
                    </div>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $module_detail->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $module_detail->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ url()->previous() }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection