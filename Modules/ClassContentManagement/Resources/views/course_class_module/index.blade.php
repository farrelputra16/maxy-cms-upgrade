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

    <h2>Parent Modules: Batch {{ $course_detail->batch }} - {{ $course_detail->name }}</h2>
    <hr>
    <div class="ui breadcrumb pt-2 pb-4">
        <a class="section" href="{{ route('welcome') }}">Dashboard</a>
        <i class="right angle icon divider"></i>
        <a class="section" href="{{ route('getCourseClass') }}">Class</a>
        <i class="right angle icon divider"></i>
        <div class="active section">Batch {{ $course_detail->batch }} - {{ $course_detail->name }}</div>
    </div>

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
                    <th>Day</th>
                    <th scope="col">Course Module</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Created Id</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Updated Id</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    <!-- More buat tempat button edit -->
                </tr>
            </thead>
            <tbody>
                @foreach ($courseclassmodules as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td>{{ $item->priority }}</td>
                    <td>{{ $item->course_module_name }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td id="description">{{ $item->description }}</td>
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
                        <a href="{{ route('getEditCourseClassModule', ['id' => $item->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('getCourseClassChildModule', ['id' => $item->id]) }}" class="btn btn-info">Content</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th><input type="text" class="form-control search-0" placeholder="Search Id" /></th>
                    <th><input type="text" class="form-control search-1" placeholder="Search Day" /></th>
                    <th><input type="text" class="form-control search-2" placeholder="Search Name" /></th>
                    <th><input type="text" class="form-control search-3" placeholder="Search Start Date" /></th>
                    <th><input type="text" class="form-control search-4" placeholder="Search End Date" /></th>
                    <th><input type="text" class="form-control search-5" placeholder="Search Description" /></th>
                    <th><input type="text" class="form-control search-6" placeholder="Search Created At" /></th>
                    <th><input type="text" class="form-control search-7" placeholder="Search Created Id" /></th>
                    <th><input type="text" class="form-control search-8" placeholder="Search Updated At" /></th>
                    <th><input type="text" class="form-control search-9" placeholder="Search Updated Id" /></th>
                    <th><input type="text" class="form-control search-10" placeholder="Search Status" /></th>
                    <th></th>
                </tr>
            </tfoot> -->
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
        $(document).ready(function () {
            let table = $('#example').DataTable({
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                buttons: ['copy', 'excel', 'pdf', 'colvis'],
                searching: true,
                order: [[1, "asc"]],
            });

            // Add individual column search inputs and titles
            $('#example thead th').each(function () {
                let title = $(this).text();
                $(this).html('<div class="text-center">' + title +
            '</div><div class="mt-2"><input class="form-control" type="text" placeholder="Search ' + title +
            '" /></div>');
            });

            // Apply individual column search
            table.columns().every(function () {
                let that = this;
                $('input', this.header()).on('keyup change', function () {
                    if (that.search() !== this.value) {
                        that.search(this.value).draw();
                    }
                });
            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>
</html>

    </div>
@endsection