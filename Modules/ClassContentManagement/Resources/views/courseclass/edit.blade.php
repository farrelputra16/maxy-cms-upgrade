@extends('layout.master')

@section('title', 'Edit Course Class')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Edit Class: {{ $course_class_detail->course_name }} Batch {{ $course_class_detail->batch }} </h2>
        <hr>
        <form class="ui form" action="{{ route('postEditCourseClass', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <input type="hidden" name="course_class_id" value="{{ $course_class_detail->id }}">
                <div class="two fields">
                    <div class="field">
                        <label for="">Batch</label>
                        <input type="text" name="batch" value="{{ $course_class_detail->batch }}">
                    </div>
                    <div class="field">
                        <label for="">Quota</label>
                        <input type="number" name="quota" value="{{ $course_class_detail->quota }}">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Start Date</label>
                        <input type="date" name="start" value="{{ $course_class_detail->start_date }}">
                    </div>
                    <div class="field">
                        <label for="">End Date</label>
                        <input type="date" name="end" value="{{ $course_class_detail->end_date }}">
                    </div>
                    
                </div>
                <div class="field">
                    <label for="">Course</label>
                    <select name="course_id" class="ui dropdown">
                        @foreach ($course_list as $items)
                            <option value="{{ $items->id }}" @if($items->id == $course_class_detail->course_id) selected @endif>{{ $items->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label for="">Announcement</label>
                    <textarea name="announcement">{{ $course_class_detail->announcement }}</textarea>
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content">{{ $course_class_detail->content }}</textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $course_class_detail->description }}</textarea>
                </div>
               
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $course_class_detail->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route('getAddCourseClassModule', ['id' => $course_class_detail->id]) }}"><button class=" right floated ui button primary">Tambah Course Module</button></a>
        <a href="{{ route('getCourseClass') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection