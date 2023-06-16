@extends('layout.master')

@section('title', 'Course Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddCourseModule', ['access' => 'course_module_create']) }}" role="button">Tambah Course Module +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Module Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseModules as $item)
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
                                <a href="{{ route('getEditCourseModule', ['id' => $item->id, 'access' => 'course_module_update']) }}" style="text-decoration: none; color:blue;">Edit</a>
                                <a href="{{ route('getCourseChildModule', ['id' => $item->id, 'access' => 'course_module_child_manage']) }}" style="text-decoration: none; color:teal;">Child</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection