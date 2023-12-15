@extends('layout.master')

@section('title', 'Course Class Module')

@section('content')
    <div style="padding: 0px 12px 0px 12px;">
    <!DOCTYPE html>
<html>
<head>
    <title>Course Class Module</title>
    <!-- Include CSS libraries for styling the table -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h2>Class Module: Batch {{ $course_detail->batch }} - {{ $course_detail->name }}</h2>
    <hr>
    <div id="example_wrapper">
        <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
            <div class="navbar-nav">
                    <a href="{{ route('getAddCourseClassModule', ['id' => $course_class_id]) }}"><button class=" right floated ui button primary">Add Class Module +</button></a>
            </div>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Day/Owner</th>
                    <th scope="col">Order</th>
                    <th scope="col">ID Course Module</th>
                    <th scope="col">Batch - Course</th>
                    <th scope="col">Content</th>
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

                    @if($item->level == 1)
                    <td>Day {{ $item->priority }}</td>
                    @else
                    <td>Owned: {{ $item->parent_name }}</td>
                    @endif

                    <td>{{ $item->level }}</td>
                    <td>{{ $item->course_module_name }}</td>
                    <td>Batch {{ $item->course_class_batch }} - {{ $item->course_name }}</td>
                    <td id="description">{{ $item->content }}</td>
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