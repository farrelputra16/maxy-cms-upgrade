@extends('layout.master')

@section('title', 'Edit Course Class Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditCourseClassModule', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Course Class Module</label>
                    <input type="text" value="{{ $courseclassmodules->id }}" disabled>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="">Waktu Mulai</label>
                        <input type="date" name="start" value="{{ $courseclassmodules->start_date }}">
                    </div>
                    <div class="field">
                        <label for="">Waktu Berakhir</label>
                        <input type="date" name="end" value="{{ $courseclassmodules->end_date }}">
                    </div>
                    <div class="field">
                        <label for="">Prioritas</label>
                        <input type="number" name="priority" value="{{ $courseclassmodules->priority }}">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Module</label>
                        <select name="coursemodulesid" class="ui dropdown">
                            @foreach ($currentData as $item)
                                <option selected value="{{ $item->course_module_id }}">{{ $item->module_name }}</option>
                            @endforeach
                            @foreach ($allModules as $items)
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Course Class (Batch)</label>
                        <select name="courseclassid" class="ui dropdown">
                            @foreach ($currentData as $item)
                                <option selected value="{{ $item->course_class_id }}">{{ $item->class_batch }} - {{ $item->course_name }}</option>
                            @endforeach
                            @foreach ($allClasses as $items)
                                <option value="{{ $items->course_class_id }}">{{ $items->batch }} - {{ $items->course_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="">Course Description</label>
                    <textarea name="description">{{ $courseclassmodules->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $courseclassmodules->status == 1 ? 'checked' : ''}} name="status" >
                        <label>Aktif</label>
                    </div>
                  </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route("getCourseClassModule") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection