@extends('layout.master')

@section('title', 'Course')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddCourse', ['access' => 'course_create']) }}" role="button">Tambah Course +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui unstackable table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td id="description">{{ $item->description }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('getEditCourse', ['id' => $item->id, 'access' => 'course_update']) }}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection