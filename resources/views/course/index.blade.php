@extends('layout.master')

@section('title', 'Course')

@section('content')
    <div style="padding: 12px;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">More</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td id="description">{{ $item->description }}</td>
                    <td>
                        @if (($item->status) == 1)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-warnign">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td><a >Edit</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection