@extends('layout.master')

@section('title', 'Course Class Child Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <h2 class="ui center aligned header">
            {{ $courseParent->courseModule->name }}
            <div class="sub header">Manage your course child settings.</div>
        </h2>
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddCourseClassChildModule', ['id' => $courseParent->id]) }}"
                    role="button">Tambah Child Module +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead style="text-align: center; vertical-align: middle;">
                    <tr>
                        <th>ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Module Name</th>
                        <th>Module Priority</th>
                        <th>Module Level</th>
                        <th>Content</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Created By</th>
                        <th>Updated At</th>
                        <th>Updated By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center; vertical-align: middle;">
                    @foreach ($courseClassChildModule as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->start_date }}</td>
                            <td>{{ $item->end_date }}</td>
                            <td>{{ $item->courseModule->name }}</td>
                            <td>{{ $item->courseModule->priority }}</td>
                            <td>{{ $item->courseModule->level }}</td>
                            <td>{{ $item->courseModule->content ?? '-' }}</td>
                            <td id="description">{!! !empty($item->courseModule->description) ? \Str::limit($item->courseModule->description, 30) : '-' !!}</td>
                            <td>{{ $item->courseModule->created_at }}</td>
                            <td>{{ $item->userCreated->name }}</td>
                            <td>{{ $item->courseModule->updated_at }}</td>
                            <td>{{ $item->userUpdated->name }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                @else
                                    <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('getEditCourseClassChildModule', ['id' => $item->id, 'parent_id' => $courseParent->id]) }}"
                                    style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
