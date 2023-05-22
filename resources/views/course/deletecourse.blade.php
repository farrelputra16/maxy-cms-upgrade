@extends('layout.master')

@section('title', 'Hapus')

@section('content')
    <div style="width: 18rem; top:50%; left:50%; position: absolute; transform: translate(-50%, -50%);">
        <div class="ui cards">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <div class="left floated">Hapus Course</div>
                        <div><a href="{{ route('getCourse') }}"><i class="right floated window close black icon"></i></a></div> 
                    </div>
                    <div class="description">
                        {{ $courses->name }}
                    </div>
                </div>
                <div class="extra content">
                    <form action="{{ route('postDeleteCourse', ['id' => $courses->id])}}" method="post">
                        @csrf
                        <button type="submit" class="ui basic red button fluid">Yakin bat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection