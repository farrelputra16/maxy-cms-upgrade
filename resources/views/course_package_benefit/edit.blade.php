@extends('layout.master')

@section('title', 'Edit Course Package Benefit')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <form class="ui form" action="{{ route('postEditCoursePackageBenefit', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            <div class="field">
                <div class="field">
                    <label for="">ID Course Package Benefit</label>
                    <input type="text" value="{{ $currentData->value('id') }}" disabled>
                </div>
                <div class="field">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $currentData->value('name') }}">
                    @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                            <span style="color: red;">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="field">
                    <label for="">ID Course Package</label>
                    <select name="course_package_id" class="ui dropdown">
                        @foreach ($currentData as $item)
                            <option selected value="{{ $item->course_package_id }}">{{ $item->course_package_name }}</option>
                        @endforeach
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
                    <textarea name="description">{{ $currentData->value('description') }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->value('status') == 1 ? 'checked' : '' }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route('getCoursePackageBenefit') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection