@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <div style="padding: 12px 12px 0px 12px;">
        <h2 style="">Add Member for Class: {{ $course_class_detail->course_name }} Batch {{ $course_class_detail->batch }}</h2>
        <hr>
        <form class="ui form" action="{{ route('postAddCourseClassMember') }}" method="post">
            @csrf
            <div class="two fields">
                <div class="three wide field">
                    <label for="users">ID</label>
                    <select class="ui dropdown" name="users" id="users">
                        <option value="">-- Silakan Pilih Member --</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('users')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <input type="hidden" name="course_class" value="{{ $course_class_detail->id }}">
            </div>
            <div class="field">
                <label for="">Course Class Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field">
                <div class="ui checkbox">
                    <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                    <label for="status">Aktif</label>
                </div>
            </div>
            <button type="submit" class="right floated ui button primary">Tambah Course Class Member</button>
        </form>
        <a href="{{ route('getCourseClassMember') }}"><button class="right floated ui red button" style="margin-right:2%;">Batal</button></a>
        <br><br>
        <hr>
        <h2>Bulk Upload</h2>
        <hr>
        <form method="post" action="{{ route('course-class-member.import-csv') }}" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label for="csv_file">Upload File CSV:</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv">
                @error('csv_file')
                    <span style="color: red;">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="right floated ui button primary" style="margin-top:-1.8%;margin-right:0.4%">Upload CSV</button>
        </form>
        
    </div>
@endsection
