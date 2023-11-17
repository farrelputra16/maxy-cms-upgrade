@extends('layout.master')

@section('title', 'Add Course Class Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Class Module</h2>    
        <form class="ui form" action="{{ route('postAddCourseClassModule') }}" method="post">
            @csrf
            <div class="five fields">
                <div class="field">
                    <label for="">Waktu Mulai</label>
                    <input type="date" id="date" name="start">
                    @if ($errors->has('start'))
                        @foreach ($errors->get('start') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Waktu Berakhir</label>
                    <input type="date" id="date" name="end">
                    @if ($errors->has('end'))
                        @foreach ($errors->get('end') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Prioritas</label>
                    <input type="number" name="priority">
                    @if ($errors->has('priority'))
                        @foreach ($errors->get('priority') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Level</label>
                    <input type="number" name="level">
                    @if ($errors->has('level'))
                        @foreach ($errors->get('level') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Course Module</label>
                    <select name="coursemoduleid" class="ui dropdown">
                        @foreach ($allModules as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('coursemoduleid'))
                        @foreach ($errors->get('coursemoduleid') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Course Class (Batch) - Course</label>
                    <select name="courseclassid" class="ui dropdown">
                        @foreach ($allClass as $item)
                            <option value="{{ $item->course_class_id }}">{{ $item->batch}} - {{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('courseclassid'))
                        @foreach ($errors->get('courseclassid') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>    
            </div>
            <div class="field">
                <label for="">Course Class Module Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status" >
                    <label>Aktif</label>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Course Class Module</button>
        </form>
        <a href="{{ route('getCourseClassModule') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection