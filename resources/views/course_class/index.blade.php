@extends('layout.master')

@section('title', 'Course Class')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <h2>Class</h2>
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('getAddCourseClass') }}" role="button">Tambah Class +</a>
                </div>
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('getDuplicateCourseClass') }}" role="button" style="width: 130px;">Duplicate Class +</a> 
                </div>
            </div>    
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Batch</th>
                        <th scope="col">ID Course</th>
                        <th scope="col">Waktu Mulai</th>
                        <th scope="col">Waktu Berakhir</th>
                        <th scope="col">Kuota</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                        <!-- More buat tempat edit / delete -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseClasses as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td class="active">{{ $item->batch }}</td>
                        <td>{{ $item->course_name }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->quota }}</td>
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
                            <a href="{{ route('getEditCourseClass', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection