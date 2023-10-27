@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Class Member</h2>
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
                <div class="three wide field">
                    <label for="course_class">ID Course Class (Batch)</label>
                    <select class="ui dropdown" name="course_class" id="course_class">
                        <option value="">-- Silakan Pilih Batch --</option>
                        @foreach ($courseClasses as $item)
                            <option value="{{ $item->course_class_id }}">{{ $item->course_class_batch }} - {{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @error('course_class')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
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
        <a href="{{ route('getCourseClassMember') }}"><button class="right floated ui red button" style="margin-right:26%;margin-top:-2.8%">Batal</button></a>
    </div>
@endsection
