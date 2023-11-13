@extends('layout.master')

@section('title', 'Add Course Class')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Class</h2>
        <form class="ui form" action="{{ route('postAddCourseClass') }}" method="post">
            @csrf
            <div class="field">
                
                <div class="five fields">
                    <div class="field">
                        <label for="">Batch</label>
                        <input type="text" name="batch" placeholder="Masukkan Batch">
                        @if ($errors->has('batch'))
                            @foreach ($errors->get('batch') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
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
                        <label for="">Kuota</label>
                        <input type="number" name="quota">
                        @if ($errors->has('quota'))
                            @foreach ($errors->get('quota') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">ID Course</label>
                        <select name="courseid" class="ui dropdown">
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
                    <label for="">Course Class Description</label>
                    <textarea name="description"></textarea>
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