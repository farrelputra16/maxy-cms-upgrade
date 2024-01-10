@extends('layout.master')

@section('title', 'Course Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
        <!DOCTYPE html>
        <html>

        <head>
            <title>Course Module</title>
            <!-- Include CSS libraries for styling the table -->
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
            <link rel="stylesheet" type="text/css"
                href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

        </head>

        <body>
            <h2>Course Module</h2>
            <hr>
            <div id="example_wrapper">
                <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                    <div class="navbar-nav">
                        @if ($course_id != null)
                            <a href="{{ route('getAddCourseModule', ['id' => $course_id]) }}"><button
                                    class=" right floated ui button primary">Tambah Course Module +</button></a>
                        @else
                            <a class="btn btn-primary" href="{{ route('getAddCourseModule') }}" role="button">Tambah Course
                                Module +</a>
                        @endif

                    </div>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Module Name</th>
                            <th>ID Course</th>
                            <th>Content</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Created Id</th>
                            <th>Updated At</th>
                            <th>Updated Id</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courseModules as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->course_id }}</td>
                                <td>{!! \Str::limit($item->content, 50) !!}</td>
                                <td id="description">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-' !!}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->created_id }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>{{ $item->updated_id }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <a class="ui tiny green label" style="text-decoration: none;">Aktif</a>
                                    @else
                                        <a class="ui tiny red label" style="text-decoration: none;">Non Aktif</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('getEditCourseModule', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('getCourseChildModule', ['id' => $item->id]) }}"
                                            class="btn btn-info">Content</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Include JS libraries for DataTable initialization -->
            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
                    var table = $('#example').DataTable({
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
