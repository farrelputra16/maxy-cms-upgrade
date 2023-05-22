@extends('layout.master')

@section('title', 'Edit Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditCourse', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Course</label>
                    <input type="text" value="{{ $courses->id }}" disabled>
                </div>
                <div class="field">
                    <label for="">Course Name</label>
                    <input type="text" name="name" value="{{ $courses->name }}">
                </div>
                <div class="field">
                    <label for="">Course Slug</label>
                    <input type="text" name="slug" value="{{ $courses->slug }}">
                </div>
                <div class="field">
                    <label for="">Course Description</label>
                    <textarea name="description">{{ $courses->description }}</textarea>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Type</label>
                        <select name="type" class="ui dropdown">
                            @foreach ($currentData as $item)
                                <option selected value="{{ $item->id_course_type }}">{{ $item->course_type_name }}</option>
                            @endforeach
                            @foreach ($allCourseType as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Course Difficulty</label>
                        <select name="level" class="ui dropdown">
                            @foreach ($currentData as $item)
                                <option selected value="{{ $item->id_course_difficulty }}">{{ $item->course_difficulty }}</option>
                            @endforeach
                            @foreach ($allDifficultyType as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $courses->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourse") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection