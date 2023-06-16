@extends('layout.master')

@section('title', 'Hapus')

@section('content')
    <div style="width: 18rem; top:50%; left:50%; position: absolute; transform: translate(-50%, -50%);">
        <div class="ui cards">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <div class="left floated">Hapus Child Module</div>
                        <div><a href="{{ route('getCourseModule') }}"><i class="right floated window close red icon"></i></a></div> 
                    </div>
                    <div class="description">
                        {{ $courseModules->name }}
                    </div>
                </div>
                <div class="extra content">
                    <form action="{{ route('postDeleteCourseModule', ['id' => $courseModules->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="ui basic red button fluid">Yakin bat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection