@extends('layout.master')

@section('title', 'Add Course Package Benefit')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2 style="padding-bottom:3%">Add Course Package Benefit</h2>
        <form class="ui form" action="{{ route('postAddCoursePackageBenefit') }}" method="post">
            @csrf
            @isset($idCPB)
                <div class="field">
                    <input type="text" name="idCPB" value="{{ $idCPB }}" hidden>
                </div>
            @endisset
            <div class="field">
                <div class="two fields">
                    <div class="field">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="Masukkan Package Benefit">
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
            <button class="right floated ui button primary">Tambah Course Package Benefit</button>
        </form>
        <a href="{{ route('getCoursePackageBenefit') }}"><button class=" right floated ui red button">Batal</button></a>
    </div>
@endsection