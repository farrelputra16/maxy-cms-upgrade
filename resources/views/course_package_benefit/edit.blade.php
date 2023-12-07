@extends('layout.master')

@section('title', 'Edit Course Package Benefit')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Edit Course Package Benefit</h2>
        <form class="ui form" action="{{ route('postEditCoursePackageBenefit', ['id' => request()->query('id')]) }}" method="post">
            @csrf
            @isset($idCPB)
                <div class="field">
                    <input type="text" name="idCPB" value="{{ $idCPB }}" hidden>
                </div>
            @endisset
            <div class="field">
                <div class="three fields">
                    <div class="field">
                        <label for="">ID</label>
                        <input type="text" value="{{ $currentData->id }}" disabled>
                    </div>
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ $currentData->name }}">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                                <span style="color: red;">{{$error}}</span>
                            @endforeach
                        @endif
                    </div>
                    <div class="field">
                        <label for="">ID Course Package</label>
                        <select name="course_package_id" class="ui dropdown">
                            @if ($currentData != NULL)
                                <option selected value="{{ $currentData->course_package_id }}">{{ $currentData->course_package_name }}</option>
                            @endif
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
                </div>
                <div class="field">
                    <label for="">Description</label>
                    <textarea name="description">{{ $currentData->description }}</textarea>
                </div>
                <div class="field">
                    <div class="ui checkbox">
                        <input class="form-check-input" type="checkbox" value="1" {{ $currentData->status == 1 ? 'checked' : '' }} name="status" >
                        <label>Aktif</label>
                    </div>
                </div>
            </div>
            <button class="right floated ui button primary">Save & Update</button>
        </form>
        <a href="{{ route('getCoursePackageBenefit') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection