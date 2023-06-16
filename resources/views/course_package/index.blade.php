@extends('layout.master')

@section('title', 'Course Package')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style="margin-bottom: 0px;">
        <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                <a class="btn btn-primary" href="{{ route('getAddCoursePackage', ['access' => 'course_package_create']) }}" role="button">Tambah Course Package +</a>
            </div>
        </nav>
        <div id="table_content">
            <table class="ui tablet unstackable table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Fake Price</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">More</th>
                        <!-- More buat tempat edit / delete -->
                    </tr>
                </thead>
                <tbody>
                @foreach ($coursePackages as $item)
                    <tr>
                        <td scope="row">{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td id="fake_price">Rp. {{ number_format($item->fake_price, 2,',','.') }}</td>
                        <td id="price">Rp. {{ number_format($item->price, 2,',','.') }}</td>
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
                            <a href="{{ route('getEditCoursePackage', ['id' => $item->id, 'access' => 'course_package_update']) }}" style="text-decoration: none; color:blue;">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection