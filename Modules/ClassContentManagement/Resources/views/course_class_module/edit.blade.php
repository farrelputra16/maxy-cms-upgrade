@extends('layout.master')

@section('title', 'Edit Course Class Module')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Edit Module: @if ($course_class_module->course_module_type != '')
                [{{ $course_class_module->course_module_type }}]
            @else
                [Parent Module Day {{ $course_class_module->priority }}]
            @endif{{ $course_class_module->course_module_name }}</h2>
        <hr>
        <!-- <h2 style="padding-bottom:3%">Edit Class Module</h2> -->
        <form class="ui form" action="{{ route('postEditCourseClassModule', ['id' => request()->query('id')]) }}"
            method="post">
            @csrf
            <div class="field">
                <input type="hidden" name="course_class_id" value="{{ $classDetail->course_class_id }}">

                <div class="four fields">
                    <div class="field">
                        <label for="">Waktu Mulai</label>
                        <input type="date" name="start"
                            value="{{ \Carbon\Carbon::parse($course_class_module->start_date)->format('Y-m-d') }}">
                    </div>
                    <div class="field">
                        <label for="">Waktu Berakhir</label>
                        <input type="date" name="end"
                            value="{{ \Carbon\Carbon::parse($course_class_module->end_date)->format('Y-m-d') }}">
                    </div>
                    <div class="field">
                        <label for="">Level</label>
                        <input type="number" name="level" value="{{ $course_class_module->level }}">
                    </div>
                    <div class="field">
                        <label for="">Prioritas</label>
                        <input type="number" name="priority" value="{{ $course_class_module->priority }}">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="">Course Module</label>
                        <select name="coursemodulesid" class="ui dropdown">
                            <!-- <option selected value="{{ $course_class_module->id }}">{{ $course_class_module->course_module_name }}</option> -->
                            @foreach ($allModules as $item)
                                @if ($item->type == '')
                                    <option value="{{ $item->id }}" @if ($item->id == $course_class_module->course_module_id) selected @endif>
                                        Day {{ $item->day }}: {{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}" @if ($item->id == $course_class_module->course_module_id) selected @endif>
                                        [{{ $item->type }}]{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="">Course Class (Batch) - Course</label>
                        <select name="courseclassid" class="ui dropdown" disabled>
                            <option value="{{ $classDetail->course_class_id }}">Batch {{ $classDetail->batch }} -
                                {{ $classDetail->course_name }}</option>
                        </select>
                        @if ($errors->has('courseclassid'))
                            @foreach ($errors->get('courseclassid') as $error)
                                <span style="color: red;">{{ $error }}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Course Module Content</label>
                    <textarea name="content">{{ $course_class_module->courseModule->content }}</textarea>
                </div>
                <div class="field">
                    <label for="">Course Module Description</label>
                    <textarea name="description">{{ $course_class_module->courseModule->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1"
                            {{ $course_class_module->status == 1 ? 'checked' : '' }} name="status">
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route('getCourseClassModule', ['id' => $course_class_id]) }}"><button
                class=" right floated ui red button">Batal</button></a>
    </div>
    <script>
        CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
@endsection
