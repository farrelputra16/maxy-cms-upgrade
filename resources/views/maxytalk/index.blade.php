@extends ('layout.master')

@section ('title', 'Maxy Talk!')
@section ('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style = "margin-bottom: 0px;">
            <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="navbar-nav" >
                    <a class="btn btn-primary" href="{{ route('getAddMaxyTalk')}}" role="button">Tambah Data +</a>
                </div>
            </nav>
            <div id="table_content">
                <table class="ui tablet unstackable table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Maxy Talk Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Registration Link</th>
                        <th>User ID</th>
                        <th>Maxy Talk Parents ID</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maxytalk as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="/img/maxytalk/{{ $item->img }}" alt="Image" style="max-width: 200px; max-height: 150px;"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->register_link }}</td>
                        <td>{{ $item->users_id }}</td>
                        <td>{{ $item->maxy_talk_parent_id }}</td>
                        <td style="max-width: 400px;">{{ $item->description }}</td>
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
                            <a href="{{ route('getEditMaxyTalk', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection