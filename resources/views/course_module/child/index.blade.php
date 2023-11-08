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
                <a class="btn btn-primary" href="{{ route('getAddChildModule', ['id' => $courseParent->id]) }}" role="button">Tambah Child Module +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead  style="text-align: center; vertical-align: middle;">
                    <tr>
                        <th>ID</th>
                        <th>Child Module Name</th>
                        <th>Child Module Priority</th>
                        <th>Child Module Level</th>
                        <th>Content</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Created Id</th>
                        <th>Updated At</th>
                        <th>Updated Id</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center; vertical-align: middle;">
                    @foreach ($courseChildModules as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->priority }}</td>
                            <td>{{ $item->level }}</td>
                            <td>{{ $item->content }}</td>
                            <td id="description">{{ $item->description }}</td>
                            <td >{{ $item->created_at }}</td>
                            <td>{{ $item->created_id }}</td>
                            <td >{{ $item->updated_at }}</td>
                            <td>{{ $item->updated_id }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('getEditChildModule', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection