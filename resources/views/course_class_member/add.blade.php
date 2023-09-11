@extends('layout.master')

@section('title', 'Add Course Class Member')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="" method="post">
            @csrf
            <div class="two fields">
                <div class="three wide field">
                    <label for="">ID Member</label>
                    <select class="ui dropdown" name="users" id="">
                        <option value="">-- Silakan Pilih Member --</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('member'))
                        @foreach ($errors->get('member') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="three wide field">
                    <label for="">ID Course Class (Batch)</label>
                    <select class="ui dropdown" name="course_class" id="">
                        <option value="">-- Silakan Pilih Batch --</option>
                        @foreach ($courseClasses as $item)
                            <option value="{{ $item->course_class_id }}">{{ $item->course_class_batch}} - {{ $item->course_name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('course_class'))
                        @foreach ($errors->get('course_class') as $error)
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
            <button class="right floated ui button primary">Tambah Course Class Member</button>
        </form>
        <a href="{{ route("getCourseClassMember") }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection