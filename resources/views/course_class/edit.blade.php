@extends('layout.master')

@section('title', 'Edit Course Class')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditCourseClass', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Course Class (Batch)</label>
                    <input type="text" value="{{ $courseclasses->id }}" disabled>
                </div>
                <div class="field">
                    <label for="">Batch</label>
                    <input type="text" name="batch" value="{{ $courseclasses->batch }}">
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Waktu Mulai</label>
                        <input type="date" name="start" value="{{ $courseclasses->start_date }}">
                    </div>
                    <div class="field">
                        <label for="">Waktu Berakhir</label>
                        <input type="date" name="end" value="{{ $courseclasses->end_date }}">
                    </div>
                    <div class="field">
                        <label for="">Kuota</label>
                        <input type="text" name="quota" value="{{ $courseclasses->quota }}">
                    </div>
                </div>
                <div class="field">
                    <label for="">ID Course</label>
                    <select name="courseid" class="ui dropdown">
                        @foreach ($currentData as $item)
                            <option selected value="{{ $item->course_id }}">{{ $item->course_name }}</option>
                        @endforeach
                        @foreach ($allCourses as $items)
                            <option value="{{ $items->id }}">{{ $items->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label for="">Course Description</label>
                    <textarea name="description">{{ $courseclasses->description }}</textarea>
                </div>
               
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $courseclasses->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourseClass") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection