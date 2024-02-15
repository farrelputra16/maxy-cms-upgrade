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

        @if($page_type == 'LMS')
        <h2>Parent Modules For Course: {{ $course_detail->name }}</h2>
        @elseif($page_type == 'CP')
        <h2>Company Profile Modules For Course: {{ $course_detail->name }}</h2>
        @endif
        <hr>
        <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ url('/') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <a class="section" href="{{ url('/course') }}">Course</a>
            <i class="right angle icon divider"></i>
            <div class="active section">{{ $course_detail->name }}</div>
        </div>

        <div id="example_wrapper">
            <div class="navbar bg-body-tertiary" style="padding: 12px 0px 12px 0px;">
                <div class="navbar-nav">
                    <a
                        href="{{ route('getAddCourseModule', ['id' => $course_detail->id, 'page_type' => $page_type]) }}"><button
                            class=" right floated ui button primary">Tambah Module +</button></a>
                </div>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Day</th>
                        <th>Module Name</th>
                        <!-- <th>Content</th> -->
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
                    @foreach ($parent_modules as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->priority }}</td>
                        <td>{{ $item->name }}</td>
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
                            <div class="btn-group">
                                <a href="{{ route('getEditCourseModule', ['id' => $item->id, 'page_type' => $page_type]) }}"
                                    class="btn btn-primary">Edit</a>
                                @if ($page_type == 'LMS')
                                <a href="{{ route('getCourseSubModule', ['course_id' => $course_detail->id, 'module_id' => $item->id, 'page_type' => 'LMS_child']) }}"
                                    class="btn btn-info">Content</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <!-- <tfoot>
                    <tr>
                        <th><input type="text" class="form-control search-0" placeholder="Search Id" /></th>
                        <th><input type="text" class="form-control search-1" placeholder="Search Day" /></th>
                        <th><input type="text" class="form-control search-2" placeholder="Search Name" /></th>
                        <th><input type="text" class="form-control search-3" placeholder="Search Description" /></th>
                        <th><input type="text" class="form-control search-4" placeholder="Search Created At" /></th>
                        <th><input type="text" class="form-control search-5" placeholder="Search Created Id" /></th>
                        <th><input type="text" class="form-control search-6" placeholder="Search Updated At" /></th>
                        <th><input type="text" class="form-control search-7" placeholder="Search Updated Id" /></th>
                        <th><input type="text" class="form-control search-8" placeholder="Search Status" /></th>
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