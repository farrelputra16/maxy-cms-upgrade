@extends('layout.master')

@section('title', 'Add Course Package Benefit')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postAddCoursePackageBenefit') }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">ID Course Package</label>
                    <select name="course_package_id" class="ui dropdown">
                        @foreach ($allCoursePackages as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('course_package_id'))
                        @foreach ($errors->get('course_package_id') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">Course Package Benefit Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Tambah Course Package Benefit</button>
        </form>
        <a href="{{ route('getCoursePackageBenefit') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection