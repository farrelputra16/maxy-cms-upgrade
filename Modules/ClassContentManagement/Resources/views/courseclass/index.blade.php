@extends('layout.master')

@section('title', 'Course Class')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    
@endpush

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Course Class Module</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

        </head>

        <body>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <h2>Course Class</h2>
        <hr>
        <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ url('/') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Course Class</div>
        </div>
        <nav class="navbar bg-body-tertiary py-3">
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('getAddCourseClass') }}" role="button">Add Class +</a>
                </div>
                <div class="col">
                    <a class="btn btn-primary" href="{{ route('getDuplicateCourseClass') }}" role="button"
                        style="width: 150px;">Duplicate Class +</a>
                </div>
            </div>
        </nav>

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Batch</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Quota</th>
                    <th scope="col">Announcement</th>
                    <th scope="col">Content</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course_list as $item)
                    <tr>
                        <td scope="row">{{ $item->course->name }} Batch {{ $item->batch }}</td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->quota }}</td>
                        <td>{{ $item->announcement ?? '-' }}</td>
                        <td>{!! !empty($item->content) ? \Str::limit($item->content, 30) : '-' !!}</td>
                        <td id="description">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}</td>
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
                            <div class="btn-group">
                                <a href="{{ route('getEditCourseClass', ['id' => $item->id]) }}"
                                    class="btn btn-primary">Edit</a>
                                <a href="{{ route('getCourseClassModule', ['id' => $item->id]) }}"
                                    class="btn btn-info">Module
                                    List</a>
                                <a href="{{ route('getCourseClassMember', ['id' => $item->id]) }}"
                                    class="btn btn-info">Member
                                    List</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#example').DataTable({
                lengthChange: true, // Aktifkan opsi perubahan jumlah entri
                lengthMenu: [10, 25, 50, 100], // Menentukan pilihan jumlah entri yang dapat ditampilkan
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
        </body>

        </html>

    </div>
@endsection
