@extends('layout.master')

@section('title', 'Course Child Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <h2 class="ui center aligned header">
            {{ $courseParent->name }}
            <div class="sub header">Manage your course child settings.</div>
        </h2>
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddChildModule', ['id' => $courseParent->id, 'access' => 'course_module_child_create']) }}" role="button">Tambah Child Module +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Child Module Name</th>
                        <th>Child Module Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseChildModules as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->level }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('getEditChildModule', ['id' => $item->id, 'access' => 'course_module_child_update']) }}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection