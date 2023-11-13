@extends('layout.master')

@section('title', 'Add Course Class')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Duplicate Class</h2>
        <form class="ui form" action="{{ route('postDuplicateCourseClass') }}" method="post">
            @csrf
            <div class="field">
                <div class="header" style="display: flex; justify-content: center; margin-bottom: 20px; background: #e0e0e0; padding: 10px 0px 10px 0px;">
                    <h5><b>Choose Class</b></h5>
                </div>
                <div class="five fields">
                    <div class="field" style="width: 100%;">
                        <label for="">ID Course Class</label>
                        <select name="courseClassId" class="ui dropdown">
                            @foreach ($allCourseClasses as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} batch {{ $item->batch }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('courseid'))
                            @foreach ($errors->get('courseid') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
            

                <div class="header" style="display: flex; justify-content: center; margin-bottom: 20px; background: #e0e0e0; padding: 10px 0px 10px 0px; margin-top: 50px;">
                    <h5><b>New Class</b></h5>
                </div>
                <div class="five fields">
                    <div class="field" style="width: 50%;">
                        <label for="">Batch</label>
                        <input type="text" name="batch" placeholder="Masukkan Batch">
                        @if ($errors->has('batch'))
                            @foreach ($errors->get('batch') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field" style="width: 50%;">
                        <label for="">ID Course</label>
                        <select name="courseId" class="ui dropdown">
                            @foreach ($allCourses as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('courseid'))
                            @foreach ($errors->get('courseid') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Course Class</button>
        </form>
        <a href="{{ route("getCourseClass") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection