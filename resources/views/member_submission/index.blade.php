@extends('layout.master')

@section('title', 'Member Submission')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddCourse') }}" role="button">Tambah Course +</a>
            </div>
        </nav>
        <table class="ui tablet unstackable table">
            <thead>
                <tr>
                    <th>Nama Member</th>
                    <th>ID Member</th>
                    <th>ID Course Class Module</th>
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
                                <a class="btn btn-success" style="pointer-events: none;">Aktif</a>
                            @else
                                <a class="btn btn-danger" style="pointer-events: none;">Non Aktif</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('getEditCourse', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                            <!-- <a href="{{ route('getDeleteCourse', ['id' => $item->id]) }}" style="text-decoration: none; color:red;">Hapus</a> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
