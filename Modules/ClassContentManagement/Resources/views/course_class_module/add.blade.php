@extends('layout.master')

@section('title', 'Add Course Class Module')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2>Add Class Module:</h2>
        <hr>
        <form class="ui form" action="{{ route('postAddCourseClassModule') }}" method="post">
            @csrf
            <input type="hidden" name="course_class_id" value="{{ $course_class_id }}">
            <div class="five fields">
                <div class="field">
                    <label for="">Waktu Mulai</label>
                    <input type="date" id="date" name="start">
                    @if ($errors->has('start'))
                        @foreach ($errors->get('start') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Waktu Berakhir</label>
                    <input type="date" id="date" name="end">
                    @if ($errors->has('end'))
                        @foreach ($errors->get('end') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Prioritas</label>
                    <input type="number" name="priority">
                    @if ($errors->has('priority'))
                        @foreach ($errors->get('priority') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Level</label>
                    <input type="number" name="level">
                    @if ($errors->has('level'))
                        @foreach ($errors->get('level') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Course Module</label>
                    <select name="coursemoduleid" class="ui dropdown">
                        @foreach ($allModules as $item)
                            <!-- <option value="{{ $item->id }}">Day {{ $item->day }}: {{ $item->name }}</option> -->
                            @if ($item->type == 'parent')
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                <!-- <option value="{{ $item->id }}">Day {{ $item->day }}: {{ $item->name }}</option> -->
                            {{-- @else
                                <option value="{{ $item->id }}">[{{ $item->type }}]{{ $item->name }}</option> --}}
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('coursemoduleid'))
                        @foreach ($errors->get('cours   emoduleid') as $error)
                            <span style="color: red;">{{ $error }}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Course Class (Batch) - Course</label>
                    <select name="course_class_id" class="ui dropdown" disabled>
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
            {{-- <div class="field">
                <label for="">Course Class Module Content</label>
                <textarea name="content"></textarea>
            </div> --}}
            <div class="field">
                <label for="">Course Class Module Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status">
                    <label>Aktif</label>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Course Class Module</button>
        </form>
        <a href="{{ route('getCourseClassModule') }}"><button class=" right floated ui red button">Batal</button></a>
        <a href="{{ route('getAddCourseModule') }}"><button class="left floated ui button primary">Add Course Module +</button></a>
    </div>
    <script>
        // CKEDITOR.replace('content');
        CKEDITOR.replace('description');
    </script>
@endsection
