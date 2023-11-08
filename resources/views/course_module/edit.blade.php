@extends('layout.master')

@section('title', 'Edit Module Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Course Module</h2>
        <form class="ui form" action="{{ route('postEditCourseModule', ['id' => $courseModule->id]) }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $courseModule->name }}">
                    </div>
                    <div class="field">
                        <label for="">Priority</label>
                        <input type="number" name="priority" value="{{ $courseModule->priority }}">
                    </div>
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content">{{ $courseModule->content }}</textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $courseModule->description }}</textarea>
                </div>
                <div class="field">
                    <label for="">Course</label>
                    <select name="course" class="ui dropdown">
                    @if ($courseName)
                        <option selected value="{{ $courseName['course_id'] }}">{{ $courseName['course_name'] }}</option>
                    @endif
                        @foreach ($allCourses as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $courseModule->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourseModule") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection