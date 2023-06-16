@extends('layout.master')

@section('title', 'Add Course Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddCourseModule') }}" method="post">
            @csrf
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Module Name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="field">
                        <label for="">Course Module Priority</label>
                        <input type="number" name="priority">
                    </div>
                </div>
                <div class="field">
                    <label for="">Course Module Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <label for="">Course</label>
                    <select name="course" class="ui dropdown">
                        @foreach ($courses as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Tambah Course Module</button>
        </form>
        <a href="{{ route("getCourseModule") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection