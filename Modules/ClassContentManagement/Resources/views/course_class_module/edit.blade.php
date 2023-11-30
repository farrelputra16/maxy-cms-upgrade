@extends('layout.master')

@section('title', 'Edit Course Class Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Class Module</h2>
        <form class="ui form" action="{{ route('postEditCourseClassModule', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Course Class Module</label>
                    <input type="text" value="{{ $courseclassmodules->id }}" disabled>
                </div>
                <div class="four fields">
                    <div class="field">
                        <label for="">Waktu Mulai</label>
                        <input type="date" name="start" value="{{ \Carbon\Carbon::parse($courseclassmodules->start_date)->format('Y-m-d') }}">
                    </div>
                    <div class="field">
                        <label for="">Waktu Berakhir</label>
                        <input type="date" name="end" value="{{ \Carbon\Carbon::parse($courseclassmodules->end_date)->format('Y-m-d') }}">
                    </div>
                    <div class="field">
                        <label for="">Level</label>
                        <input type="number" name="level" value="{{ $courseclassmodules->level }}">
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
                            @if ($currentData != NULL)
                                <option selected value="{{ $currentData->course_module_id }}">{{ $currentData->module_name }}</option>
                            @endif
                            @foreach ($allModules as $items)
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Course Class (Batch)</label>
                        <select name="courseclassid" class="ui dropdown">
                            @if ($currentData != NULL)
                                <option selected value="{{ $currentData->course_class_id }}">{{ $currentData->class_batch }} - {{ $currentData->course_name }}</option>
                            @endif
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