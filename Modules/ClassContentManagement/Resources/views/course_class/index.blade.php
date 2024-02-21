@extends('layout.master')

@section('title', 'Course Class')

@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
@endpush

@section('content')
<div style="padding: 0px 12px 0px 12px;">
    <!DOCTYPE html>
    <html>

    <head>
        <title>Course</title>
        <!-- Include CSS libraries for styling the table -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

    </head>

    <body>
        <h2>Course Class</h2>
        <hr>
        <div class="ui breadcrumb pt-2 pb-4">
            <a class="section" href="{{ route('getDashboard') }}">Dashboard</a>
            <i class="right angle icon divider"></i>
            <div class="active section">Course Class</div>
        </div>

        <div id="courseClassTable_wrapper">
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

            <table id="courseClassTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Batch</th>
                        <th scope="col">Type</th>
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
                        <td scope="row">{{ $item->course_name }} Batch {{ $item->batch }}</td>
                        <td>{{ $item->type }} </td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>{{ $item->quota }}</td>
                        <td>{{ $item->announcement ?? '-' }}</td>
                        <td>{!! !empty($item->content) ? \Str::limit($item->content, 30) : '-' !!}</td>
                        <td id="description">{!! !empty($item->description) ? \Str::limit($item->description, 30) : '-'
                            !!}</td>
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

        <!-- <script>
        $(document).ready(function () {
            let table = $('#courseClassTable').DataTable({
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            $("select[name='courseClassTable_length']").on('click', function () {
                $.ajax({
                    url: "",
                    type: 'GET',
                    data: {
                        per_page: $(this).val()
                    },
                    success: function (data) {
                        console.log(data);
                    }
                });
                console.log($(this).val());
            });

            table.buttons().container()
                .appendTo('#courseClassTable_wrapper .col-md-6:eq(0)');
        });
    </script> -->
        <script>
            $(document).ready(function () {
                let table = $('#courseClassTable').DataTable({
                    lengthChange: true,
                    lengthMenu: [10, 25, 50, 100],
                    buttons: ['copy', 'excel', 'pdf', 'colvis'],
                    searching: true,
                    columnDefs: [
                        { "visible": false, "targets": [2, 3, 4, 5, 9] }
                    ],
                });

                // Add individual column search inputs and titles
                $('#courseClassTable thead th').each(function () {
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

                table.buttons().container().appendTo('#courseClassTable_wrapper .col-md-6:eq(0)');
            });
        </script>
    </body>

    </html>

</div>
@endsection