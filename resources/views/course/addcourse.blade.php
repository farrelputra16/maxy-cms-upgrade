@extends('layout.master')

@section('title', 'Add Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddCourse') }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Course Name</label>
                    <input type="text" name="name">
                </div>
                <div class="field">
                    <label for="">Course Slug</label>
                    <input type="text" name="slug">
                </div>
                <div class="field">
                    <label for="">Course Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Type</label>
                        <select name="type" class="ui dropdown">
                            @foreach ($allCourseTypes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Course Difficulty</label>
                        <select name="level" class="ui dropdown">
                            @foreach ($allCourseDifficulty as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Tambah Course</button>
        </form>
        <a href="{{ route("getCourse") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection