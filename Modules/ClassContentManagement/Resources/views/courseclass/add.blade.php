@extends('layout.master')

@section('title', 'Add Course Class')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 24px 12px 0px 12px;">
        <h2 style="">Add Class</h2>
        <hr><br>
        <form class="ui form" action="{{ route('postAddCourseClass') }}" method="post">
            @csrf
            <div class="field">
                <div class="five fields">
                    <div class="field">
                        <label for="">Course</label>
                        <select name="course_id" class="ui dropdown">
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
                        <label for="">Start Date</label>
                        <input type="date" id="date" name="start">
                        @if ($errors->has('start'))
                            @foreach ($errors->get('start') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">End Date</label>
                        <input type="date" id="date" name="end">
                        @if ($errors->has('end'))
                            @foreach ($errors->get('end') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">Quota</label>
                        <input type="number" name="quota" min=0>
                        @if ($errors->has('quota'))
                            @foreach ($errors->get('quota') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="field">
                    <label for="">Announcement</label>
                    <textarea name="announcement"></textarea>
                </div>
                <div class="field">
                    <label for="">Content</label>
                    <textarea name="content"></textarea>
                </div>
                <div class="field">
                    <label for="">Description</label>
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
        <a href="{{ route('getCourseClass') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection