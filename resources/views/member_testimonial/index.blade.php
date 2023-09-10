@extends ('layout.master')

@section ('title', 'Member Testimonials')
@section ('content')
    <div style="padding: 0px 12px 0px 12px;">
        <hr style = "margin-bottom: 0px;">
            <nav class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="navbar-nav" >
                    <a class="btn btn-primary" href="{{ route('getAddTestimonial')}}" role="button">Tambah Testimoni +</a>
                </div>
            </nav>
            <div id="table_content">
                <table class="ui tablet unstackable table">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Stars</th>
                        <th>Role</th>
                        <th>Status Highlight</th>
                        <th>Member</th>
                        <th>Course</th>
                        <th>Course Class</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $item)
                        <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->stars }}</td>
                        <td>{{ $item->role }}</td>
                        <td>{{ $item->status_highlight }}</td>
                        <td>{{ $item->user_id}} - {{ $item->membername}}</td>
                        <td>{{ $item->course_id}} - {{ $item->coursename}}</td>
                        <td>{{ $item->course_class_id}} - Batch {{ $item->coursebatch}}</td>

                        <td>{{ $item->description }}</td>
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
                            <a href="{{ route('getEditTestimonial', ['id' => $item->id]) }}" style="text-decoration: none; color:blue;">Edit</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection