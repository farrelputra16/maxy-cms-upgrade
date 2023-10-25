@extends('layout.master')

@section('title', 'Course Class Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddCourseClassModule') }}" role="button">Tambah Course Class Module +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Waktu Mulai</th>
                        <th scope="col">Waktu Berakhir</th>
                        <th scope="col">Prioritas</th>
                        <th scope="col">ID Course Module</th>
                        <th scope="col">Batch - Course</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                        <!-- More buat tempat button edit -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseclassmodules as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->priority }}</td>
                        <td>{{ $item->course_module_name }}</td>
                        <td>Batch {{ $item->course_class_batch }} - {{ $item->course_name }}</td>
                        <td id="description">{{ $item->description }}</td>
                        <td>
                            @if ($item->status == 1)
                                <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                            @else
                                <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ route('getEditCourseClassModule', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection