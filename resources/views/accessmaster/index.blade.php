@extends('layout.master')

@section('title', 'Access Master')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddAccessMaster', ['access' => 'access_master_create']) }}" role="button">Tambah Access Master +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Access Master Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accessmasters as $item)
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
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ route('getEditAccessMaster', ['id' => $item->id, 'access' => 'access_master_update']) }}" style="text-decoration: none; color:blue;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection